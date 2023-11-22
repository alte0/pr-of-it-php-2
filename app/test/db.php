<?php

require_once __DIR__ . '/../autoload.php';

$db = new \App\Db();
$id = 1000;
$newName = 'Маркетинг';
$resDb = $db->execute('UPDATE departments SET name = :name WHERE id = :id', [':id' => $id, ':name' => $newName]);

assert(false === $resDb);

$id = 1;
$resDb = $db->execute('UPDATE departments SET name = :name WHERE id = :id', [':id' => $id, ':name' => $newName]);

assert(true === $resDb);