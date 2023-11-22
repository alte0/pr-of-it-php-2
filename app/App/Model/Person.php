<?php

namespace App\Model;

class Person extends Model
{
    protected const TABLE = 'persons';
    public string $name;
    public string $age;
}