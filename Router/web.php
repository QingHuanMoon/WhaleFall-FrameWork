<?php


$router->addRoute('GET', '/{id:\d+}/{card:\d+}/{name:\d+}', 'Back/View/IndexController@showIndex');
$router->addRoute('GET','/test','Back/View/TestController@test');
$router->addRoute('POST','/change','Back/View/TestController@change');

$router->addRoute('GET','/hello/{id:\d+}','Back/View/HelloController@showArticle');

$router->addRoute('GET','/table/{id:\d+}','Back/View/TableController@show');
$router->addRoute('GET','/table/info','Back/View/TableController@info');
$router->addRoute('GET','/table/find/{id:\d+}','Back/View/TableController@find');
