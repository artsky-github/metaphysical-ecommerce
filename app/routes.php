<?php

$router->get('','PagesController@login');
$router->get('login','PagesController@login');

$router->post('login','SessionController@store');
$router->get('logout','SessionController@delete');


$router->get('register','PagesController@register');
$router->post('register','UserController@store');


$router->get('home','PagesController@home');
$router->get('orders','PagesController@orders');

$router->get('cart','PagesController@cart');
$router->post('cart','OrderController@store');

$router->get('products','PagesController@products');





