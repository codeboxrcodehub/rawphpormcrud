<?php
require "../bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Database\Schema\Blueprint;

try {
    Capsule::schema()->table('users', function (Blueprint $table){
        $table->string('uuid')->after('id')->nullable()->comment('uuid');
    });
    echo "user table altered";
} catch (\Throwable $th) {
    echo $th->getMessage();
}