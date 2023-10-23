<?php

require_once __DIR__ . '/autoload.php';

$data = \App\Model\Article::findLastThree();

require_once __DIR__ . '/templates/index.php';