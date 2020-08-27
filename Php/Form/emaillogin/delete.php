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

    $_SESSION['msg'] = "Enter Your Email Which you want to Delete.";
    if (isset($_POST['submit'])) {
        include 'db.php';

        $email = mysqli_real_escape_string($con, $_POST['email']);


        $emailquery = "select * from emaillogin where email='$email'";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if ($emailcount) {

            $userdata = mysqli_fetch_array($query);
            $username = $userdata['Username'];
            $token = $userdata['token'];


            $subject = "Delete Account";
            $body = "Hi $username, Click here to Delete your Account, 
                    http://localhost/Form/emaillogin/delete_account.php?token=$token";
            $sender_email = "From: henilmalaviya06@gmail.com";

            if (mail($email, $subject, $body, $sender_email)) {
                $_SESSION['msg'] = "Check your Mail to Delete Your Account at $email";
                header('location:login.php');
            } else {
                $_SESSION['msg'] = "Email sending Failed";
            }
        } else {
            $_SESSION['msg'] = "No Email Found";
        }
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
                    <input class="text email" type="email" name="email" value="<?php
                                                                                if (isset($_COOKIE['emailcookie'])) {
                                                                                    echo $_COOKIE['emailcookie'];
                                                                                } else {
                                                                                    echo "";
                                                                                }
                                                                                ?>" placeholder="Email" required="">

                    <input type="submit" name="submit" value="SEND MAIL">
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