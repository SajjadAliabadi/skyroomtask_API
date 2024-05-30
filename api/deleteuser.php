<?php
include "functions.php";

$path = $_SERVER["DOCUMENT_ROOT"] . "/skyroom/db/Users.php";
include $path;
$usersDB = new Users();

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if (!isset($_GET['id'])) {
        $error = array(
            "status" => "false",
            "message" => "please inter your ID for delete it",
        );
        showOutput($error);
        return;
    }

    $err = $usersDB->deleteUser($_GET['id']);
    if (!$err) {
        $error = array(
            "status" => "false",
            "message" => "Can't delete record",
        );

        showOutput($error);
        return;

    } else {
        $success = array(
            "status" => "true",
            "message" => "Delete successful",
        );

        showOutput($success);
        return;
    }
}
