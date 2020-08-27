<?php


$server = "localhost";
$user = "root";
$dbpassword = "henil0604";
$db = "emaillogin";

$con = mysqli_connect($server, $user, $dbpassword, $db);


if ($con) {
} else {
    $_SESSION['msg'] = "No Internet Connection";
}
