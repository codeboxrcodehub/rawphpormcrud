<?php
require_once "./bootstrap.php";

if (isset($_GET['id']) && $_GET['id'] > 0){
    $id = $_GET['id'];
    $user = User::find($id)->delete();

    echo "Deleted" ; exit();
}