<?php

require_once __DIR__ . '/autoload.php';

// fake $_SERVER['REQUEST_URI']
//$requestUri = '/news/article/id1/';
//$requestUri = '/delete/article/';
//$requestUri = '/edit/article/id10/';
//$requestUri = '/new/article/';
//$requestUri = '/';

if (isset($requestUri) && mb_strlen($requestUri) > 0){
    $requestCtrl = array_filter(explode('/', $requestUri), 'strval');
    
    if (is_array($requestCtrl) && count($requestCtrl) > 2) {
        $_GET['action'] = array_pop($requestCtrl);
    }
    
    $ctrlName = implode('',$requestCtrl);
    $ctrlName = !empty($ctrlName) ? ucfirst($ctrlName) : 'Index';
} else {
    $ctrlName = (isset($_GET['ctrl']) && mb_strlen($_GET['ctrl']) > 0) ? ucfirst($_GET['ctrl']) : 'Index';
}

$className = "\App\Controllers\\{$ctrlName}Controller";

if (class_exists($className)) {
    $ctrl = new $className(true);
    $ctrl->dispatcher();
}
