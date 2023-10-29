<?php

namespace App\Model;

abstract class Model
{
    public int $id = 0;
    protected const TABLE = '';

    public static function findAll(): false|array
    {
        $db = new \App\Db();

        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            [],
            static::class
        );
    }

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

    public function save(): void
    {
        if ($this->id > 0) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    public function delete(): void
    {
        if ($this->id > 0) {
            $data = $this->getObjectVars();
            $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';

            $db = new \App\Db();
            $db->execute($sql, $data);
        }
    }

    protected function getObjectVars(array $arrExcludeVars = []): array
    {
        if (empty($arrExcludeVars)) {
            return get_object_vars($this);
        }

        $data = [];

        foreach (get_object_vars($this) as $prop => $value) {
            if (count($arrExcludeVars) > 0 && in_array($prop, $arrExcludeVars)) {
                continue;
            }

            $data[$prop] = $value;
        }

        return $data;
    }
}