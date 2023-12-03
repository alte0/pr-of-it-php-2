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


    public static function findAllEach(): \Generator|\stdClass
    {
        $db = new \App\Db();

        return $db->queryEach(
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
            $objectVars = $this->getObjectVars();
            $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = :id';

            $db = new \App\Db();
            $db->execute($sql, $objectVars);
        }
    }

    /** Получение переменных объекта.
     * @param array $arrExcludeVars Массив ключей для получения определённых
     * @return array
     */
    protected function getObjectVars(array $arrExcludeVars = []): array
    {
        $varsObject = get_object_vars($this);

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

    /** Заполнение данными в модель
     * @param array $data - массив входных данных
     * @throws \App\Exception\ErrorsException
     */
    public function fill(array $data, string $typeValidate): void
    {
        $errors = new \App\Exception\ErrorsException();
        $validateFields = static::getValidateFields($typeValidate);

        if (!is_array($validateFields) || empty($validateFields) || empty($data)) {
            $errors->add(new \Exception('Ошибка валидации.'));
            throw $errors;
        }

        foreach ($validateFields as $keyField => $field) {
            $isError = false;
            $textError = '';

            if (isset($data[$keyField]) && ($curTypeField = gettype($data[$keyField])) === $field['type']) {
                if ($curTypeField === 'string' && mb_strlen($data[$keyField]) <= 0) {
                    $isError = true;
                } elseif ($curTypeField === 'integer' && $data[$keyField] <= 0) {
                    $isError = true;
                }
            } else {
                $isError = true;
            }

            if ($isError) {
                $textError = $field['errorText'] . ' "' . $field['name'] . '"';
            }

            if ($isError) {
                $errors->add(new \Exception($textError));
            }
        }

        if (!$errors->empty()) {
            throw $errors;
        }

        foreach ($data as $datumKey => $datum) {
            $this->$datumKey = $datum;
        }
    }
}