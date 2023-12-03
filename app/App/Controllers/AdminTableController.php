<?php

namespace App\Controllers;

use App\AdminDataTable;
use App\Model\Person;

class AdminTableController extends AbstractController
{
    protected function action()
    {
        $admTable = new AdminDataTable([Person::class], [get_class_methods(Person::class)]);
        echo $admTable->render();
    }
}