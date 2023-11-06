<?php

namespace App\Model;

class Author extends Model
{
    protected const TABLE = 'authors';
    public int $author_id;
    public string $fio;
}