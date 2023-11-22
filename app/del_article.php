<?php

require_once __DIR__ . '/autoload.php';

$ctrl = new \App\Controllers\DeleteArticleController('show');
$ctrl->dispatcher();