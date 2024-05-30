<?php
include "functions.php";
$path= $_SERVER["DOCUMENT_ROOT"] . "/skyroom/db/Users.php";
include $path;
$usersDB = new Users();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        $error = array(
            "status" => "false",
            "message" => "please inter your ID for update it",
        );
        showOutput($error);
        return;
    }

     $user= $usersDB->getUserById($_GET['id']);
    if (!$user){
        $error = array(
            "status" => "false",
            "message" => "can't find this record!",
        );

        showOutput($error);
        return;

    }else{
        $success = array(
            "status" => "true",
            "message" => $user,
        );

        showOutput($success);
        return;
    }
}

