<?php

require_once __DIR__ . '/autoload.php';

$config = \App\Config::getInstance();
echo $config->data['db']['host'];

$view = new \App\View();
$view->articles = \App\Model\Article::findLastThree();
//$view->display(__DIR__ . '/templates/index');
/*foreach ($view as $key => $item) {
    var_dump([
        'index' => $key,
        'value' => $item,
    ]);
}*/
$layoutView = new \App\View();
$layoutView->title = 'Новости';
$layoutView->content = $view->render(__DIR__ . '/templates/index');
echo $layoutView->render(__DIR__ . '/templates/layout');
