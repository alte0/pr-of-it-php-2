<?php

require_once __DIR__ . '/autoload.php';

$templateName = 'new_article';

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['article']['title']) && isset($_POST['article']['content']) && isset($_POST['article']['author']) &&
    $_POST['article']['author'] > 0 && 
    mb_strlen(trim($_POST['article']['title'])) > 0 && mb_strlen(trim($_POST['article']['content'])) > 0
) {
    $article = new \App\Model\Article();
    $article->title = strip_tags(trim($_POST['article']['title']));
    $article->content = strip_tags(trim($_POST['article']['content']));
    $article->author_id = intval($_POST['article']['author']);
    $article->save();
    $templateName = 'new_article_success';
}

$view = new \App\View();
$title = 'Добавить новую новость';
$view->h3 = $title;
$view->textSubmit = 'Добавить новость';
$view->autors = \App\Model\Author::findAll();
$layoutView = new \App\View();
$layoutView->title = $title;
$layoutView->content = $view->render(__DIR__ . '/templates/' . $templateName);
echo $layoutView->render(__DIR__ . '/templates/layout');
