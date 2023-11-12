<?php

require_once __DIR__ . '/autoload.php';

$ctrl = new \App\Controllers\NewsArticleController('show');
$ctrl->dispatcher();