<?php

namespace App\Model;

abstract class Model
{
    public int $id;
    protected static string $table = '';

    public static function findAll(): false|array
    {
        $db = new \App\Db();

        return $db->query(
            'SELECT * FROM ' . static::$table,
            [],
            static::class
        );
    }

    public static function findById($id): object|false
    {
        $db = new \App\Db();

        $resDb = $db->query(
            'SELECT * FROM ' . static::$table . ' WHERE id=:id LIMIT 1',
            [':id' => $id],
            static::class
        );

        if (empty($resDb)) {
            return false;
        }

        return $resDb[0];
    }
}