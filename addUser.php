<?php
require_once './bootstrap.php';

if (isset($_POST)) {

    $data = $_POST;
    try {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $data['password'],
        ]);
    } catch (\Throwable $th){
        echo $th->getMessage();
        exit();
    }
    echo json_encode($user);
} else {
    echo "direct hit not support"; exit();
}
