<?php

namespace App\Controllers;

class EditArticleController extends AbstractController
{
    protected function action():void
    {
        $id = 0;
        $templateName = 'none_article';

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = intval($_GET['id']);
        } elseif (isset($_GET['action']) && ($id = substr($_GET['action'], 2)) > 0) {
            $id = intval($id);
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

        if (is_object($article)) {
            $templateName = 'edit_article';

            $this->view->h3 = 'Редактирование - ' . $article->title;
            $this->view->title = $article->title;
            $this->view->content = $article->content;
            $this->view->author_id = $article->author_id;
            $this->view->textSubmit = 'Изменить новость';
            $this->view->autors = \App\Model\Author::findAll();

            $this->layoutView->title = 'Редактирование - ' . $article->title;
        }
        
        $this->layoutView->content = $this->view->render(__DIR__ . '/../../templates/' . $templateName);
        echo $this->layoutView->render(__DIR__ . '/../../templates/layout');
    }
}