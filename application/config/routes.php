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

    '/cargos' => [
        'controller' => 'cargo',
        'action' => 'cargos'
    ],

    '/cargo/info' => [
        'controller' => 'cargo',
        'action' => 'info'
    ],

    '/cargo/create' => [
        'controller' => 'cargo',
        'action' => 'create'
    ],

    '/cars' => [
        'controller' => 'car',
        'action' => 'cars'
    ],

    '/car/create' => [
        'controller' => 'car',
        'action' => 'create'
    ],

    '/car/info' => [
        'controller' => 'car',
        'action' => 'info'
    ],

    '/user' => [
        'controller' => 'user',
        'action' => 'info'
    ],
];