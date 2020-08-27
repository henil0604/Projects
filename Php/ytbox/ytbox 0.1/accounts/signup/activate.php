<?php
session_start();

include '../db/db.php';


if (isset($_GET['token'])) {

    $token = $_GET['token'];

    $updatequery = " update emaillogin set status='active' where token='$token'";

    $query = mysqli_query($con, $updatequery);

    if ($query) {
        if (isset($_SESSION['msg'])) {
            $_SESSION['msg'] = "Account Activated Successfully";
            header('location: ../login/');
        } else {
            $_SESSION['msg'] = "you are logged out";
            header('location: ../login/');
        }
    } else {
        $_SESSION['msg'] = "Account Not Updated";
        header('location: ../signup/');
    }
}
