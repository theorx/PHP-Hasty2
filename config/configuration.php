<?php
/**
 * Returns configuration
 */
return [
    'mysql'                      => [
        'driver'   => 'pdo_mysql',
        'host'     => 'localhost',
        'user'     => 'root',
        'password' => '',
        'dbname'   => 'test'
    ],
    'paths'                      => [
        'entities' => __DIR__ . '/../application/Entities'
    ],
    'cache_settings'             => [
        'mysql_cache'    => [
            'host'     => '',
            'user'     => '',
            'password' => '',
            'dbname'   => ''
        ],
        'memcache_cache' => [
            'servers' => [
                [
                    'host' => '',
                    'port' => ''
                ]
            ]
        ],
        'disk_cache'     => [
            'path' => __DIR__ . '/../application/cache/'
        ],
        'cache_provider' => 'disk',
        'cache_enabled'  => true
    ],
    'application_cache_settings' => [
        'controller_parameter_hinting' => 120
    ]
];