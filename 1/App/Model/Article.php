<?php

namespace App\Model;

class Article extends Model
{
    protected static string $table = 'news';
    public string $title;
    public string $content;

    /** Три последние новости
     * @return false|array
     */
    public static function findLastThree(): false|array
    {
        $db = new \App\Db();

        return $db->query(
            'SELECT * FROM ' . static::$table . ' ORDER BY id desc LIMIT 3',
            [],
            static::class
        );
    }
}