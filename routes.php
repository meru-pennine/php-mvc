<?php
$routes = [

    '/' => ['controller' => 'DashboardController', 'method' => 'index'],
    '/news/' => ['controller' => 'NewsController', 'method' => 'index'],
    '/news/top-headline/' => ['controller' => 'NewsController', 'method' => 'topHeadline'],


    // Book Module
    '/book/' => ['controller' => 'BookController', 'method' => 'list'],
    '/book/add/' => ['controller' => 'BookController', 'method' => 'add'],
    '/book/create/' => ['controller' => 'BookController', 'method' => 'create'],
    '/book/edit/{id}/' => ['controller' => 'BookController', 'method' => 'edit'],
    '/book/update/' => ['controller' => 'BookController', 'method' => 'update'],
    '/book/delete/{id}/' => ['controller' => 'BookController', 'method' => 'delete'],


    // Movie Route Here
]; 
