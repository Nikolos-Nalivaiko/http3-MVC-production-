<?php

return [

    '/' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    '/account/sign-in' => [
        'controller' => 'account',
        'action' => 'signIn'
    ],
    
    '/account/select' => [
        'controller' => 'account',
        'action' => 'select'
    ], 

    '/account/sign-up/user' => [
        'controller' => 'account',
        'action' => 'signUpUser'
    ],
    
    '/account/sign-up/company' => [
        'controller' => 'account',
        'action' => 'signUpCompany'
    ],

    '/account/recovery/select' => [
        'controller' => 'account',
        'action' => 'recoverySelect'
    ],

    '/account/recovery/login' => [
        'controller' => 'account',
        'action' => 'recoveryLogin'
    ],

    '/account/recovery/password' => [
        'controller' => 'account',
        'action' => 'recoveryPassword'
    ],

    '/account/profile' => [
        'controller' => 'account',
        'action' => 'profile'
    ],

    '/account/change/password' => [
        'controller' => 'account',
        'action' => 'changePassword'
    ],

    '/account/change/login' => [
        'controller' => 'account',
        'action' => 'changeLogin'
    ],

    '/cargos/(\d+)' => [
        'controller' => 'cargo',
        'action' => 'cargos'
    ],

    '/cargo/info/(\d+)' => [
        'controller' => 'cargo',
        'action' => 'info'
    ],

    '/cargo/create' => [
        'controller' => 'cargo',
        'action' => 'create'
    ],

    '/cargo/update' => [
        'controller' => 'cargo',
        'action' => 'update'
    ],

    '/cars/(\d+)' => [
        'controller' => 'car',
        'action' => 'cars'
    ],

    '/car/create' => [
        'controller' => 'car',
        'action' => 'create'
    ],

    '/car/info/(\d+)' => [
        'controller' => 'car',
        'action' => 'info'
    ],

    '/car/update' => [
        'controller' => 'car',
        'action' => 'update'
    ],

    '/user/info/(\d+)' => [
        'controller' => 'user',
        'action' => 'info'
    ],

];