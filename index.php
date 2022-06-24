<?php

//use table\Migration;

require "./bootstrap.php";
require "./tables/Migration.php";

/*$user = User::Create([
    'name' => "Arafat Alam",
    'email' => "arafat@mail.com",
    'password' => password_hash("123456789",PASSWORD_BCRYPT),
]);*/

$migration = new Migration();

$user = User::all();

//echo "requested";

echo json_encode($user);
exit();
