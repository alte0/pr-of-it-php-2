<?php

namespace App\Controllers;

use App\Model\Article;

class NewsArticleController extends AbstractController
{
    protected function action(): void
    {
        $id = 0;

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = intval($_GET['id']);
        } elseif (isset($_GET['action']) && ($id = substr($_GET['action'], 2)) > 0) {
            $id = intval($id);
        }

        $article = Article::findById($id);

        if (Article::class === get_class($article)) {
            $this->view->article = $article;
            $this->view->pageTitle = $article->title;
            $this->view->title = $article->title;
            echo $this->view->renderTwig('article.twig');
        } else {
            throw new \App\Exception\NotFoundException();
        }

    }
}