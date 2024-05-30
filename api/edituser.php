<?php
include "functions.php";
$path= $_SERVER["DOCUMENT_ROOT"] . "/skyroom/db/Users.php";
include $path;
$usersDB = new Users();

if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
    if (!isset($_GET['id'])) {
        $error = array(
            "status" => "false",
            "message" => "please inter your ID for update it",
        );
        showOutput($error);
        return;
    }

    list($flag, $msg) = $usersDB->updateUser($_GET['id'], $_POST);
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

