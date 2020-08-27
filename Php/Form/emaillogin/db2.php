<?php


$server = "localhost";
$user = "root";
$dbpassword = "henil0604";
$db = "worldcustomnews";

$con2 = mysqli_connect($server, $user, $dbpassword, $db);


if ($con2) {
    $_SESSION['msg'] = "Fill All the Information";
} else {
    $_SESSION['msg'] = "No Internate Connection";
}
