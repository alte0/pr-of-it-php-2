<?php

namespace App\Model;

class Article extends Model
{
    protected const TABLE = 'news';
    public string $title;
    public string $content;
    public int $author_id;

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

    /**
     * @param string $name
     * @return bool|object
     */
    public function __get(string $name): bool|object
    {
        if ($name === 'author' && $this->author_id > 0) {
            return Author::findById($this->author_id);
        }

        return false;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset(string $name): bool
    {
        if ($name === 'author' && $this->author_id > 0) {
            return isset($this->author);
        }
        
        return false;
    }
}
