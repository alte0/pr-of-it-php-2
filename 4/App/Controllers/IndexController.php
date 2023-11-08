<?php

namespace App\Controllers;

class IndexController extends AbstractController
{
    protected function action()
    {
        $this->view->articles = \App\Model\Article::findLastThree();

        $this->layoutView->title = 'Новости';
        $this->layoutView->content = $this->view->render(__DIR__ . '/../../templates/index');
        echo $this->layoutView->render(__DIR__ . '/../../templates/layout');
    }
}