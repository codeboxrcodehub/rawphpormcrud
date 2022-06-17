<?php
require "../bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;
$tableNames = [
    

        /*
         * The table that your application uses for users. This table's model will
         * be using the "HasRoles" and "HasPermissions" traits.
         */

        'users' => 'users',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'roles' => 'roles',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your permissions. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'permissions' => 'permissions',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your users permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'user_has_permissions' => 'permission_user',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your users roles. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'user_has_roles' => 'role_user',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'role_has_permissions' => 'permission_role',
    

        /*
         * The name of the foreign key to the users table.
         */
        'user_id' => 'user_id',
    
];

Capsule::schema()->create($tableNames['roles'], function ($table) {
    $table->increments('id');
    $table->string('name')->unique();
    $table->timestamps();
});

Capsule::schema()->create($tableNames['permissions'], function ($table) {
    $table->increments('id');
    $table->string('name')->unique();
    $table->timestamps();
});

Capsule::schema()->create($tableNames['user_has_roles'], function ($table) use ($tableNames) {
    $table->integer('role_id')->unsigned();
    $table->integer('user_id')->unsigned();

    $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');

    $table->foreign('role_id')
        ->references('id')
        ->on($tableNames['roles'])
        ->onDelete('cascade');

    $table->primary(['role_id', 'user_id']);
});

Capsule::schema()->create($tableNames['role_has_permissions'], function ($table) use ($tableNames) {
    $table->integer('permission_id')->unsigned();
    $table->integer('role_id')->unsigned();

    $table->foreign('permission_id')
        ->references('id')
        ->on($tableNames['permissions'])
        ->onDelete('cascade');

    $table->foreign('role_id')
        ->references('id')
        ->on($tableNames['roles'])
        ->onDelete('cascade');

    $table->primary(['permission_id', 'role_id']);
});