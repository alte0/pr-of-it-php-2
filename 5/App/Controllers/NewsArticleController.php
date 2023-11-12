<?php

namespace App\Controllers;

class NewsArticleController extends AbstractController
{
    protected function action():void
    {
        $id = 0;
        
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = intval($_GET['id']);
        } elseif (isset($_GET['action']) && ($id = substr($_GET['action'], 2)) > 0) {
            $id = intval($id);
        }
        
        $article = \App\Model\Article::findById($id);

        if (is_object($article)) {
            $this->view->article = $article;
            $templateName = 'article';
            $this->layoutView->title = $article->title;
            $this->layoutView->content = $this->view->render(__DIR__ . '/../../templates/' . $templateName);
            echo $this->layoutView->render(__DIR__ . '/../../templates/layout');
        } else {
            throw new \App\Exception\NotFoundException();
        }

    }
}