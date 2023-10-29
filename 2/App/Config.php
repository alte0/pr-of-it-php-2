<?php

namespace App;

class Config
{
    protected static Config $instance;

    public array $data = [
        'db' => [
            'host' => 'mysql-service'
        ]
    ];

    protected function __construct()
    {
    }

    public static function getInstance(): Config
    {
        if (empty(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }
}