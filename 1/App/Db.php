<?php

namespace App;

class Db
{
    protected \PDO $dbh;
    protected \PDOStatement $sth;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=mysql-service;dbname=php2', 'root', '');
    }

    public function query(string $sql, array $params = [], $class = \stdClass::class): false|array
    {
        return $this->execute($sql, $params) ? $this->sth->fetchAll(\PDO::FETCH_CLASS, $class) : [];
    }

    public function execute(string $query, array $params = []): bool
    {
        $this->sth = $this->dbh->prepare($query);
        $this->sth->execute($params);

        return (bool)$this->sth->rowCount();
    }
}