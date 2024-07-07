<?php 

$routes = [
    '/' => [
        'controller' => 'HomeController@index',
        'middleware' => 'auth' 
    ],
    '/users/{id}' => [
        'controller' => 'UserController@show',
        'middleware' => 'auth' 
    ],
    '/login' => [
        'controller' => 'AuthController@loginpage',
        'middleware' => 'guest' 
    ],
    '/login_submit' => [
        'controller' => 'AuthController@login',
        'middleware' => 'guest' 
    ],
    '/register' => [
        'controller' => 'AuthController@registerpage',
        'middleware' => 'guest' 
    ],
    '/register_submit' => [
        'controller' => 'AuthController@register',
        'middleware' => 'guest' 
    ],
];
