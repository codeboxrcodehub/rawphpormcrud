<?php
require "./bootstrap.php";

/*$user = User::Create([
    'name' => "Arafat Alam",
    'email' => "arafat@mail.com",
    'password' => password_hash("123456789",PASSWORD_BCRYPT),
]);*/
$user = User::all();

//echo "requested";

echo json_encode($user);
exit();
