<?php

require_once __DIR__ . '/autoload.php';

$id = 0;
$isEdit = false;
$templateName = 'none_article';

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = intval($_GET['id']);
}

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['article']['title']) && isset($_POST['article']['content']) &&
    mb_strlen(trim($_POST['article']['title'])) > 0 && mb_strlen(trim($_POST['article']['content'])) > 0
) {
    $article = new \App\Model\Article();
    $article->id = $id;
    $article->title = trim($_POST['article']['title']);
    $article->content = trim($_POST['article']['content']);
    $article->save();
}

$article = \App\Model\Article::findById($id);

if (is_object($article)) {
    $templateName = 'edit_article';
    $isEdit = true;
}

require_once __DIR__ . '/templates/' . $templateName . '.php';