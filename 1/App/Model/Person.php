<?php

namespace App\Model;

class Person extends Model
{
    protected static string $table = 'persons';
    public string $name;
    public string $age;
}