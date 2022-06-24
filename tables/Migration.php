<?php
//namespace tables;
require "./bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

class Migration {
    public $tables = [
        'AlterUserMigration',
        'RolesMigration',
        'TodoMigration',
        'UserMigration',
    ];
    public function __construct() {
        try {
            if (!Capsule::schema()->hasTable('migrations')) {
                Capsule::schema()->create('migrations', function ($table) {
                    $table->increments('id');
                    $table->string('migration');
                    $table->integer('batch');
                    $table->string('component');
                });
                echo "Migration table migrated \n";
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        echo json_encode($this->up());
    }

    public function up() {
        
        $migrations = Migrations::all()->toArray();
        $migrated_files = array_column($migrations, 'migration');
        $migration_files = array_values(array_diff(array_reverse($this->tables), $migrated_files));

        foreach ($migration_files as $value){
            require $value.'.php';
            $migration = new $value();

            Migrations::create([
                'migration' => $value
            ]);
        }
    }
    
}
