<?php

namespace App\Model;

class Article extends Model
{
    protected const TABLE = 'news';
    public string $title;
    public string $content;

    /** Три последние новости
     * @return false|array
     */
    public static function findLastThree(): false|array
    {
        $db = new \App\Db();

        return $db->query(
            'SELECT * FROM ' . self::TABLE . ' ORDER BY id desc LIMIT 3',
            [],
            self::class
        );
    }
}