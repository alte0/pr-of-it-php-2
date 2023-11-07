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
    isset($_POST['article']['title']) && isset($_POST['article']['content']) && isset($_POST['article']['author']) &&
    $_POST['article']['author'] > 0 &&
    mb_strlen(trim($_POST['article']['title'])) > 0 && mb_strlen(trim($_POST['article']['content'])) > 0
) {
    $article = new \App\Model\Article();
    $article->id = $id;
    $article->title = trim($_POST['article']['title']);
    $article->content = trim($_POST['article']['content']);
    $article->author_id = intval($_POST['article']['author']);
    $article->save();
}

$article = \App\Model\Article::findById($id);

$view = new \App\View();
$layoutView = new \App\View();

if (is_object($article)) {
    $templateName = 'edit_article';

    $view->h3 = 'Редактирование - ' . $article->title;
    $view->title = $article->title;
    $view->content = $article->content;
    $view->author_id = $article->author_id;
    $view->textSubmit = 'Изменить новость';
    $view->autors = \App\Model\Author::findAll();

    $layoutView->title = 'Редактирование - ' . $article->title;
}


$layoutView->content = $view->render(__DIR__ . '/templates/' . $templateName);
echo $layoutView->render(__DIR__ . '/templates/layout');
