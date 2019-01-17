<?php
return [
    'default_return_type'   =>  'json',
    'exception_handle'      => '\\app\\api\\lib\\exception\\ExceptionHandler',
    'database'              => [
        'type'            => 'mysql',
        'hostname'        => 'localhost',
        'database'        => 'course',
        'username'        => 'root',
        'password'        => 'Albert651651',
        'hostport'        => '3306',
        'resultset_type'  => 'array'
    ]
];