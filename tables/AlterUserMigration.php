<?php
//require "../bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Database\Schema\Blueprint;

class AlterUserMigration {
    public function __construct() {

        try {
            if (!Capsule::schema()->hasTable('users')) {
                Capsule::schema()->table('users', function (Blueprint $table){
                    $table->string('uuid')->after('id')->nullable()->comment('uuid');
                });
                echo "user table altered\n";
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
