<?php

require_once "./bootstrap.php";

if (isset($_GET['id']) && $_GET['id'] > 0) {

    $id = $_GET['id'];
    $user = User::find($id);
    if ($user){
        echo json_encode($user); exit();
    } else {
        echo 'user not found';
    }
}

if (isset($_POST)){
    try {
        $data = $_POST;
        $user = User::find($data['id']);
        $pass = ($data['password'] !== '') ? $data['password'] : $user->password;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password =  $pass;
        $user->save();

        /*$user = User::where('id', $data['id'])->update([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => ($data['password'])??,
        ]);*/
        echo "Update success"; exit();
    } catch (\Throwable $th){
        echo $th->getMessage(); exit();
    }

    echo "Update failed"; exit();

}