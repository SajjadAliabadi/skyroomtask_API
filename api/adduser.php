<?php
include "functions.php";

$path= $_SERVER["DOCUMENT_ROOT"] . "/skyroom/db/Users.php";
include $path;
$usersDB = new Users();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    list($flag, $msg) = $usersDB->createUser($_POST);
    if (!$flag){
        $error = array(
            "status" => "false",
            "message" => $msg,
        );

        showOutput($error);
        return;

    }else{
        $success = array(
            "status" => "true",
            "message" => $msg,
        );

        showOutput($success);
        return;
    }
}