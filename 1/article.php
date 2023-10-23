<?php

require_once __DIR__ . '/autoload.php';

$id = 0;
if ($_GET['id'] > 0) {
    $id = intval($_GET['id']);
}

$templateName = 'none_article';
$article = \App\Model\Article::findById($id);

if (is_object($article)) {
    $templateName = 'article';
}

require_once __DIR__ . '/templates/' . $templateName . '.php';