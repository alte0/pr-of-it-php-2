<?php

use App\Exception\DbException as DbExceptionAlias;
use App\Exception\ErrorsException as ErrorsExceptionAlias;
use App\Exception\NotFoundException as NotFoundExceptionAlias;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/autoload.php';

/* url адреса
$requestUri = '/news/article/id1/';
$requestUri = '/delete/article/';
$requestUri = '/edit/article/id8/';
$requestUri = '/new/article/';
$requestUri = '/';
*/

/*foreach (\App\Model\Person::findAllEach() as $person) {
    var_dump($person->name);
}*/
$requestUri = $_SERVER['REQUEST_URI'];

if (isset($requestUri) && mb_strlen($requestUri) > 0) {
    $parsedUrl = parse_url($requestUri);
    $requestCtrl = array_filter(explode('/', $parsedUrl['path']), 'strval');

    if (is_array($requestCtrl) && count($requestCtrl) > 2) {
        $_GET['action'] = array_pop($requestCtrl);
    }

    $ctrlName = implode('', $requestCtrl);
    $ctrlName = !empty($ctrlName) ? ucfirst($ctrlName) : 'Index';
} else {
    $ctrlName = (isset($_GET['ctrl']) && mb_strlen($_GET['ctrl']) > 0) ? ucfirst($_GET['ctrl']) : 'Index';
}

$className = "\App\Controllers\\{$ctrlName}Controller";

try {
    if (class_exists($className)) {
        $ctrl = new $className(true);
        $ctrl->dispatcher();
    } else {
        throw new NotFoundExceptionAlias();
    }
} catch (DbExceptionAlias|NotFoundExceptionAlias|ErrorsExceptionAlias $e) {
    $view = new \App\View();

    if (method_exists($e, 'getAll')) {
        $arrAlerts = [];

        foreach ($e->getAll() as $error) {
            $arrAlerts[] = $error->getMessage();
        }

        $view->alert = implode('<br>', $arrAlerts);
    } else {
        $view->alert = $e->getMessage();
    }

    $view->title = 'Информационное сообщение!';

    echo $view->renderTwig('alert.twig');
}
