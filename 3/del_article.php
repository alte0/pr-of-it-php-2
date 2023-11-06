<?php

require_once __DIR__ . '/autoload.php';

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['articles']) && is_array($_POST['articles']) && count($_POST['articles']) > 0
) {
    $arrArticlesDel = array_map(function ($articleDel) {
        return intval($articleDel);
    },
        $_POST['articles']
    );

    $article = new \App\Model\Article();
    foreach ($arrArticlesDel as $id) {
        $article->id = $id;
        $article->delete();
    }
}

$templateName = 'none_articles_del';
$articles = \App\Model\Article::findAll();

$view = new \App\View();
$layoutView = new \App\View();

if (is_array($articles)) {
    $templateName = 'del_article';
    $view->articles = $articles;
}

$layoutView->content = $view->render(__DIR__ . '/templates/' . $templateName);
echo $layoutView->render(__DIR__ . '/templates/layout');