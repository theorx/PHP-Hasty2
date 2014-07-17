<?php
/**
 * Returns configuration
 */
return [
    'mysql' => [
        'driver'   => 'pdo_mysql',
        'host'     => 'localhost',
        'user'     => 'root',
        'password' => '',
        'dbname'   => 'test'
    ],
    'paths' => [
        'entities' => __DIR__ . '/../application/Entities'
    ]
];