<?php

namespace App;

class AdminDataTable
{
    protected $arModels;
    protected $arFn;

    public function __construct(array $arModels, array $arFn)
    {
        $this->arModels = $arModels;
        $this->arFn = $arFn;
    }

    public function render()
    {
        $view = new View();
        $view->arModels = $this->arModels;
        $view->arFn = $this->arFn;

        return $view->renderTwig('admin_table.twig');
    }
}