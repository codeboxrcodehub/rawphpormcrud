<?php
//require "../bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

class TodoMigration {
    public function __construct()
    {
        try {
            if (!Capsule::schema()->hasTable('todos')) {
                Capsule::schema()->create('todos', function ($table) {
                    $table->increments('id');
                    $table->string('todo');
                    $table->string('description');
                    $table->string('category');
                    $table->integer('user_id')->unsigned();
                    $table->timestamps();
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                });
                echo "todos table migrated\n";
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
