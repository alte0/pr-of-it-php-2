<?php

require_once __DIR__ . '/autoload.php';

$templateName = 'new_article';

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['article']['title']) && isset($_POST['article']['content']) &&
    mb_strlen(trim($_POST['article']['title'])) > 0 && mb_strlen(trim($_POST['article']['content'])) > 0
) {
    $article = new \App\Model\Article();
    $article->title = strip_tags(trim($_POST['article']['title']));
    $article->content = strip_tags(trim($_POST['article']['content']));
    $article->save();
    $templateName = 'new_article_success';
}

require_once __DIR__ . '/templates/' . $templateName . '.php';
