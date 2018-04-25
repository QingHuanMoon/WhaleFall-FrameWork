<?php


$router->addRoute('GET', '/{id:\d+}/{card:\d+}/{name:\d+}', 'Back/View/IndexController@showIndex');
$router->addRoute('GET','/test','Back/View/TestController@test');
$router->addRoute('POST','/change','Back/View/TestController@change');

$router->addRoute('GET','/hello/{id:\d+}','Back/View/HelloController@showArticle');
