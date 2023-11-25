<?php

namespace App\Controllers;

class AbstractController
{
    protected \App\View $view;
    protected \App\View $layoutView; // TODO удалить
    protected string $action;
    protected bool $access;

    public function __construct(bool $access)
    {
        $this->view = new \App\View();
        $this->layoutView = new \App\View(); // TODO удалить

        $this->access = $access;
    }

    public function dispatcher()
    {
        if (!$this->access()) {
            echo 'Доступ закрыт';
        } else {
            $this->action();
        }
    }

    protected function access(): bool
    {
        return $this->access;
    }

    protected function action()
    {
    }
}