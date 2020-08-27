<?php

$server = "localhost";
$user = "root";
$dbpassword = "henil0604";
$db = "online test";

$conn = mysqli_connect($server, $user, $dbpassword, $db);


if ($conn) {
} else {
    $_SESSION['msg'] = "No Internet Connection";
}
