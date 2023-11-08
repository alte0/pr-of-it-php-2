<?php

namespace App\Controllers;

class NewArticleController extends AbstractController
{
    protected function action():void
    {
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
        
        $title = 'Добавить новую новость';
        $this->view->h3 = $title;
        $this->view->textSubmit = 'Добавить новость';
        $this->view->autors = \App\Model\Author::findAll();
        $this->layoutView->title = $title;

        $this->layoutView->content = $this->view->render(__DIR__ . '/../../templates/' . $templateName);
        echo $this->layoutView->render(__DIR__ . '/../../templates/layout');        
    }
}