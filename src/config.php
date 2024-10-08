<?php
return [
    'db' => [
        'driver' => 'pgsql',
        'host' => getenv('DB_HOST') ?: 'localhost',
        'database' => getenv('DB_DATABASE') ?: 'iptv',
        'username' => getenv('DB_USERNAME') ?: 'root',
        'password' => getenv('DB_PASSWORD') ?: '',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ],
    'xtream' => [
        'api_url' => 'http://remote-iptv-server/api',
        'api_key' => 'your_api_key'
    ]
];
