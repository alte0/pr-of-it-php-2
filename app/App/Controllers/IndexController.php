<?php

namespace App\Controllers;

class IndexController extends AbstractController
{
    protected function action()
    {
        $this->view->articles = \App\Model\Article::findLastThree();

        if (empty($this->view->articles)) {
            throw new \App\Exception\NotFoundException();
        } else {
            $this->view->pageTitle = 'Новости';
            echo $this->view->renderTwig('index.twig');
        }
    }
}