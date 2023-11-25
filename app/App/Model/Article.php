<?php

namespace App\Model;

class Article extends Model
{
    protected const TABLE = 'news';
    public string $title;
    public string $content;
    public int $author_id;

    public static function getValidateFields(string $typeValidate): array
    {
        $validateFields = [
            'delete' => [
                'id' => [
                    'name' => 'Id новости',
                    'type' => 'integer',
                    'errorText' => 'Не передан id новости',
                ],
            ],
            'new' => [
                'title' => [
                    'name' => 'Заголовок новости',
                    'type' => 'string',
                    'errorText' => 'Не заполнено',
                ],
                'content' => [
                    'name' => 'Текст новости',
                    'type' => 'string',
                    'errorText' => 'Не заполнено',
                ],
                'author_id' => [
                    'name' => 'Автор новости',
                    'type' => 'integer',
                    'errorText' => 'Не выбран автор',
                ],
            ],
            'edit' => [
                'title' => [
                    'name' => 'Заголовок новости',
                    'type' => 'string',
                    'errorText' => 'Не заполнено',
                ],
                'content' => [
                    'name' => 'Текст новости',
                    'type' => 'string',
                    'errorText' => 'Не заполнено',
                ],
                'author_id' => [
                    'name' => 'Автор новости',
                    'type' => 'integer',
                    'errorText' => 'Не выбран автор',
                ],
            ],
        ];

        if (!empty($typeValidate) && isset($validateFields[$typeValidate])) {
            return $validateFields[$typeValidate];
        }

        throw new App\Exception\NotFoundException('Нет правил валидации');
    }

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
     * @return false|Author
     */
    public function getAuthor(): false|\App\Model\Author
    {
        if ($this->author_id > 0) {
            return Author::findById($this->author_id);
        }

        return new \App\Model\Author();
    }

    /**
     * @param string $name
     * @return bool|object
     */
    public function __get(string $name): bool|object
    {
        if ($name === 'author') {
            return $this->getAuthor();
        }

        return parent::__get($name);
    }
}
