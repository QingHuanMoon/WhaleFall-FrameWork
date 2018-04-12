<?php


$router->addRoute('GET', '/', 'Back/View/IndexController@showIndex');
$router->addRoute('GET','/test','Back/View/TestController@test');
$router->addRoute('POST','/change','Back/View/TestController@change');

$router->addRoute('GET','/hello/{id}','Back/View/HelloController@showArticle');
