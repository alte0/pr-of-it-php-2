<?php

namespace App\Controllers;

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
            $article = new \App\Model\Article();
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

            $this->layoutView->content = $this->view->render(__DIR__ . '/../../templates/' . $templateName);
            echo $this->layoutView->render(__DIR__ . '/../../templates/layout');
        } else {
            throw new \App\Exception\NotFoundException();
        }
    }
}