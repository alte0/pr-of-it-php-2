<?php

namespace App\Model;

abstract class Model
{
    /** id данных
     * @var int
     */
    public int $id = 0;

    /**
     * Имя таблицы
     */
    protected const TABLE = '';

    /** Ищет все элементы
     * @return false|array
     */
    public static function findAll(): false|array
    {
        $db = new \App\Db();

        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            [],
            static::class
        );
    }

    /** Получение данных по id
     * @param $id
     * @return object|false
     */
    public static function findById($id): object|false
    {
        $db = new \App\Db();

        $resDb = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id LIMIT 1',
            [':id' => $id],
            static::class
        );

        if (empty($resDb)) {
            return false;
        }

        return $resDb[0];
    }

    /**
     * Сохранение данных
     * @return void
     */
    protected function insert(): void
    {
        $data = $this->getObjectVars(['id']);

        $arrKeys = array_keys($data);
        $concatDoubleDot = function ($key): string {
            return ':' . $key;
        };
        $arrKeysDoubleDot = array_map($concatDoubleDot, $arrKeys);

        $sql = 'INSERT INTO ' . static::TABLE .
            ' (' . implode(', ', $arrKeys) . ') VALUES (' . implode(', ', $arrKeysDoubleDot) . ')';

        $db = new \App\Db();
        $db->execute($sql, $data);

        $this->id = $db->getInsertId();
    }

    /**
     * Обновление данных по id
     * @return void
     */
    protected function update(): void
    {
        $data = $this->getObjectVars();
        $columnsPrepare = [];

        foreach ($data as $key => $datum) {
            if ('id' === $key) {
                continue;
            }

            $columnsPrepare[] = $key . ' = :' . $key;
        }


        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $columnsPrepare) . ' WHERE id = :id';

        $db = new \App\Db();
        $db->execute($sql, $data);
    }

    /**
     * Обновление / сохранение данных
     * @return void
     */
    public function save(): void
    {
        if ($this->id > 0) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    /**
     * Удаление данных по id
     * @return void
     */
    public function delete(): void
    {
        if ($this->id > 0) {
            $data = $this->getObjectVars();
            $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';

            $db = new \App\Db();
            $db->execute($sql, $data);
        }
    }

    /** Получение переменных объекта.
     * @param array $arrExcludeVars Массив ключей для получения определённых
     * @return array
     */
    protected function getObjectVars(array $arrExcludeVars = []): array
    {
        $varsObject = get_object_vars($this);
        var_dump($varsObject);
        if (empty($arrExcludeVars)) {
            return $varsObject;
        }

        $data = [];

        foreach ($varsObject as $prop => $value) {
            if (count($arrExcludeVars) > 0 && in_array($prop, $arrExcludeVars)) {
                continue;
            }

            $data[$prop] = $value;
        }

        return $data;
    }
}