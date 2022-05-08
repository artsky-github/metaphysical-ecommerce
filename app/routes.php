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

$router->get('employee','PagesController@employee');
$router->post('product/add','ProductController@store');
$router->post('product/delete','ProductController@delete');
$router->post('product/update','ProductController@update');


$router->get('admin','PagesController@admin');
$router->post('user/remove','UserController@delete');


$router->get('owner','PagesController@owner');
$router->post('employee/add','UserController@store');
$router->post('employee/remove','UserController@delete');



