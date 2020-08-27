<?php


$server = "localhost";
$user = "root";
$dbpassword = "henil0604";
$db = "wipenote";

$con2 = mysqli_connect($server, $user, $dbpassword, $db);


if ($con) {
    $_SESSION['msg'] = "Fill All the Information";
} else {
    $_SESSION['msg'] = "No Internet Connection";
}
