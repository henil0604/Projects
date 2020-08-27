<?php

$server = "localhost";
$user = "root";
$dbpassword = "";
$db = "signupform";

$con = mysqli_connect($server, $user, $dbpassword, $db);

if ($con) {
    echo "Connection successful";
} else {
    echo "No Connection";
}
