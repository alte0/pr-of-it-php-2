<?php

namespace App\Controllers;

class DeleteArticleController extends AbstractController
{
    protected function action():void
    {
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

        if (is_array($articles)) {
            $templateName = 'del_article';
            $this->view->articles = $articles;
        }

        $this->layoutView->content = $this->view->render(__DIR__ . '/../../templates/' . $templateName);
        echo $this->layoutView->render(__DIR__ . '/../../templates/layout');        
    }
}