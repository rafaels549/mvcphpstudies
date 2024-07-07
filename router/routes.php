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
    ],
    '/editCliente/{id}' => [
         'controller' => 'ClienteController@editCliente',
         'middleware'=>'auth'
    ],
    
    '/cliente/{id}'=> [
             'controller' => 'ClienteController@clienteView',
             'middleware'=>'auth'
             
    ],

    '/create/ordem_servico' => [
             'controller'=>'HomeController@store',
             'middleware'=>'auth'
    ],
    '/getordensServico' => [
        'controller'=>'HomeController@ordens',
        'middleware'=>'auth'
    ],
    '/ordem/{id}' => [
        'controller'=>'HomeController@ordemView', 
        'middleware' => 'auth'
    ],
    '/editOrdem/{id}' => [
        'controller' => 'HomeController@ordemEdit',
        'middleware' => 'auth'
    ],
    '/deleteOrdem/{id}' => [
        'controller' => 'HomeController@ordemDelete',
        'middleware' => 'auth'
    ],
    '/deleteCliente/{id}' => [
          'controller' => 'ClienteController@clienteDelete',
          'middleware' => 'auth'
    ]
    
];
