<?php

require_once __DIR__ . '/autoload.php';

$id = 0;
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = intval($_GET['id']);
}

$templateName = 'none_article';
$article = \App\Model\Article::findById($id);

$view = new \App\View();
$layoutView = new \App\View();

if (is_object($article)) {
    $view->article = $article;
    $templateName = 'article';
    $layoutView->title = $article->title;
}

$layoutView->content = $view->render(__DIR__ . '/templates/' . $templateName);
echo $layoutView->render(__DIR__ . '/templates/layout');
