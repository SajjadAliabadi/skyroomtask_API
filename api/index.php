<?php
include "functions.php";
$path= $_SERVER["DOCUMENT_ROOT"] . "/skyroom/db/Users.php";
include $path;
$usersDB = new Users();

$allUsers=$usersDB->getAllUsers();

showOutput($allUsers);

