<?php

require_once '../app/bootstrap.php';

$app->get('/', function() use ($app) { 
    $app->render('index');
});

$app->run();