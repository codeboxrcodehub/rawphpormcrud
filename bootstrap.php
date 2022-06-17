<?php

require "vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    "driver"   => "mysql",
    "host"     => "127.0.0.1",
    "database" => "project_ORM",
    "username" => "root",
    "password" => ""
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");