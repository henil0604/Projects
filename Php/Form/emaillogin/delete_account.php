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
    <title>Delete Your Account</title>
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

            $pass = password_hash($password, PASSWORD_BCRYPT);
            $cpass = password_hash($cpassword, PASSWORD_BCRYPT);


            $updatequery = " DELETE FROM `emaillogin` WHERE token='$token' ";

            $iqueary = mysqli_query($con, $updatequery);

            if ($iqueary) {
                $_SESSION['msg'] = "Your Account has been Deleted";
                setcookie('emailcookie', '', time() - 86400);
                setcookie('passwordcookie', '', time() - 86400);

                header('location:login.php');
            } else {
                $_SESSION['msg'] = "Account Delete Failed";
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
        <h1>Delete Your Account</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <p class="bg-info text-white px-4" style="width: 380px;"><?php if (isset($_SESSION['msg'])) {
                                                                                echo $_SESSION['msg'];
                                                                            } ?></p>

                <form action="" method="POST">
                    <input class="text password" type="password" name="password" value="<?php
                                                                                        if (isset($_COOKIE['passwordcookie'])) {
                                                                                            echo $_COOKIE['passwordcookie'];
                                                                                        } else {
                                                                                            echo "";
                                                                                        }
                                                                                        ?>" placeholder="Enter Password" required="">

                    <input type="submit" name="submit" value="DELETE">
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