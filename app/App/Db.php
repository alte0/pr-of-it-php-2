<?php

namespace App;

class Db
{
    protected \PDO $dbh;
    protected \PDOStatement $sth;

    public function __construct()
    {
        try {
            $this->dbh = new \PDO('mysql:host=mysql-service;dbname=php2', 'root', '');
        } catch (\PDOException $e) {
            if ($e->getMessage()) {
                \App\Logger::addLog(__CLASS__ . __METHOD__ . ' = ' . __FILE__);
                \App\Logger::addLog($e->getMessage());
                \App\Logger::recordLog();
                throw new \App\Exception\DbException('Ошибка базы данных');
            }
        }

    }

    public function query(string $sql, array $params = [], $class = \stdClass::class): false|array
    {
        return $this->execute($sql, $params) ? $this->sth->fetchAll(\PDO::FETCH_CLASS, $class) : [];
    }

    public function execute(string $query, array $params = []): bool
    {
        try {
            $this->sth = $this->dbh->prepare($query);
            $this->sth->execute($params);

            return (bool)$this->sth->rowCount();
        } catch (\PDOException $e) {
            if ($e->getMessage()) {
                \App\Logger::addLog(__CLASS__ . __METHOD__);
                \App\Logger::addLog($e->getMessage());
                \App\Logger::recordLog();
                throw new \App\Exception\DbException('Ошибка запроса к базе данных');
            }
        }
    }

    public function getInsertId(): false|string
    {
        return $this->dbh->lastInsertId();
    }
}