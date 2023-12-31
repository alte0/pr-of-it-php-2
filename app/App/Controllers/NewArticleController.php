<?php

namespace App\Controllers;

class NewArticleController extends AbstractController
{
    protected function action(): void
    {
        $templateName = 'new_article.twig';

        if (
            $_SERVER['REQUEST_METHOD'] === 'POST'
        ) {
            $article = new \App\Model\Article();
            $article->fill(
                [
                    'title' => strip_tags(trim($_POST['article']['title'])),
                    'content' => strip_tags(trim($_POST['article']['content'])),
                    'author_id' => intval($_POST['article']['author']),
                ],
                'new'
            );
            $article->save();
            $templateName = 'new_article_success.twig';
        }

        $title = 'Добавить новую новость';
        $this->view->h3 = $title;
        $this->view->textSubmit = 'Добавить новость';
        $this->view->authors = \App\Model\Author::findAll();
        $this->view->pageTitle = $title;

        echo $this->view->renderTwig($templateName);
    }
}