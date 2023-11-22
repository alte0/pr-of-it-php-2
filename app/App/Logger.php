<?php

namespace App;

class Logger
{
    protected static array $data = [];

    public static function addLog(string $str): void
    {
        self::$data[] = date("d-m-Y H:i:s");
        self::$data[] = $str;
    }

    public static function recordLog(): void
    {
        $dirLog = __DIR__ . '/../logs/';
        $pathFileLog = $dirLog . 'log.txt';

        if (!is_dir($dirLog)) {
            mkdir($dirLog, 0700);
        }

        if (count(self::$data)) {
            file_put_contents($pathFileLog, implode(' ; ', self::$data) . PHP_EOL, FILE_APPEND);
        }

        self::$data = [];
    }
}