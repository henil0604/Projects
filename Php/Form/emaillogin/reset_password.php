<?php
session_start();
?>

<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>Password Recover</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php

    if (isset($_POST['submit'])) {
        include 'db.php';

        if (isset($_GET['token'])) {

            $token = $_GET['token'];

            $password = mysqli_real_escape_string($con, $_POST['password']);
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

            $pass = password_hash($password, PASSWORD_BCRYPT);
            $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

            if ($password === $cpassword) {

                $updatequery = " update emaillogin set password='$pass' where token='$token' ";

                $iqueary = mysqli_query($con, $updatequery);

                if ($iqueary) {
                    $_SESSION['msg'] = "Your Password has been Updated";
                    header('location:login.php');
                } else {
                    $_SESSION['msg'] = "Password Update Failed";
                }
            } else {
                $_SERVER['msg'] = "Password are not Mathcing";
            }
        } else {
            $_SESSION['msg'] = "No Email Found";
        }
    } else {
        $_SESSION['msg'] = "Fill All Imformation";
    }
    ?>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>Password Recover</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <p class="bg-info text-white px-4" style="width: 380px;"><?php if (isset($_SESSION['msg'])) {
                                                                                echo $_SESSION['msg'];
                                                                            } ?></p>

                <form action="" method="POST">
                    <input class="text" type="password" name="password" placeholder="New Password" required="">
                    <input class="text w3lpass" type="password" name="cpassword" placeholder="Confirm Password" required="">
                    <input type="submit" name="submit" value="RESET PASSWORD">
                </form>
            </div>
        </div>

        <!-- //copyright -->
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- //main -->
</body>

</html>