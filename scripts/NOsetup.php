<?php

require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$config = include(__DIR__ . '/../src/config.php');

$capsule = new Capsule;
$capsule->addConnection($config['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('username')->unique();
    $table->string('password');
    $table->date('expiration_date');
    $table->integer('max_connections');
    $table->timestamps();
});

echo "Database and tables created successfully.";
