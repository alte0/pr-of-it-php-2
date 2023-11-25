<?php

namespace App\Controllers;

use App\Model\Article;

class EditArticleController extends AbstractController
{
    protected function action(): void
    {
        $id = 0;

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = intval($_GET['id']);
        } elseif (isset($_GET['action']) && ($id = substr($_GET['action'], 2)) > 0) {
            $id = intval($id);
        }

        if (
            $_SERVER['REQUEST_METHOD'] === 'POST'
        ) {
            $article = new Article();
            $article->fill(
                [
                    'id' => $id,
                    'title' => strip_tags(trim($_POST['article']['title'])),
                    'content' => strip_tags(trim($_POST['article']['content'])),
                    'author_id' => intval($_POST['article']['author']),
                ],
                'edit'
            );
            $article->save();
        }

        $article = Article::findById($id);

        if (get_class($article) == Article::class) {
            $this->view->h3 = 'Редактирование - ' . $article->title;
            $this->view->title = $article->title;
            $this->view->pageTitle = $article->title;
            $this->view->content = $article->content;
            $this->view->author_id = $article->author_id;
            $this->view->textSubmit = 'Изменить новость';
            $this->view->authors = \App\Model\Author::findAll();

            echo $this->view->renderTwig('edit_article.twig');
        } else {
            throw new \App\Exception\NotFoundException();
        }
    }
}