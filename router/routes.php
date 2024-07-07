<?php 

$routes = [
    '/home' => [
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
    '/clientes' => [
          'controller' => 'ClienteController@index',
          'middleware'=>'auth'
    ],
    '/create/cliente' => [
      'controller' => 'ClienteController@store',
      'middleware' => 'auth'
    ],
    '/getclientes' => [
        'controller' => 'ClienteController@clientes',
         'middleware' => 'auth'
    ]
];
