<?php

namespace App\Controllers;

class AbstractController
{
    protected \App\View $view;
    protected string $action;
    protected bool $access;

    public function __construct(bool $access)
    {
        $this->view = new \App\View();

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