<?php


$db_server = "localhost";
$db_username = "root";
$db_password = "henil0604";
$db_databasename = "ytbox";

$con = mysqli_connect($db_server, $db_username, $db_password, $db_databasename);

if (!$con) {
    $dbconnect = false;
} else {
    $dbconnect = true;
}
