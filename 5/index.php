<?php

require_once __DIR__ . '/autoload.php';

// fake $_SERVER['REQUEST_URI']
//$requestUri = '/news/article/id1/';
$requestUri = '/delete/article/';
//$requestUri = '/edit/article/id17/';
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

try {
    if (class_exists($className)) {
        $ctrl = new $className(true);
        $ctrl->dispatcher();
    }
} catch (\App\Exception\DbException | \App\Exception\NotFoundException | \App\Exception\ErrorsException $e) {
    $view = new \App\View();
    $layoutView = new \App\View();

    if (method_exists($e, 'getAll')) {
        $arrAlerts = [];
        
        foreach ($e->getAll() as $error) {
            $arrAlerts[] = $error->getMessage();
        }
        
        $view->alert = implode('<br>', $arrAlerts);
    } else {
        $view->alert = $e->getMessage();
    }
    
    $layoutView->title = 'Информационное сообщение!';

    $layoutView->content = $view->render(__DIR__ . '/templates/alert');
    echo $layoutView->render(__DIR__ . '/templates/layout');
}
