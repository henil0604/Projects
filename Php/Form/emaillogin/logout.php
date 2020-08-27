<?php
session_start();

setcookie('emailcookie', '', time() - 86400);
setcookie('passwordcookie', '', time() - 86400);

$_SESSION['msg'] = "You Logged Out";
$_SESSION['loginTrace'] = null;

header('location:login.php ');
