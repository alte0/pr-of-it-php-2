<?php

namespace App\Controllers;

use App\Model\Article;

class DeleteArticleController extends AbstractController
{
    protected function action(): void
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

            $article = new Article();

            foreach ($arrArticlesDel as $id) {
                $article->fill(['id' => intval($id)], 'delete');
                $article->delete();
            }
        }

        $articles = Article::findAll();

        if (is_array($articles)) {
            $this->view->articles = $articles;
            $this->view->pageTitle = 'Удаление новостей';
            echo $this->view->renderTwig('del_article.twig');
        } else {
            throw new \App\Exception\NotFoundException();
        }

    }
}