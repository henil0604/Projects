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
    <title>SignUp Form</title>
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
    <style>
        .tnc {
            color: #fff;
            font-size: 16px;
        }

        .tnc:hover {
            color: wheat;
        }
    </style>
</head>

<body>
    <?php
    $_SESSION['msg'] = "Fill All Imformation";
    if (isset($_POST['submit'])) {
        include 'db.php';

        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $token = bin2hex(random_bytes(15));

        $emailquery = "select * from emaillogin where email='$email'";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if ($emailcount > 0) {
            $_SESSION['msg'] = "Email Already Exist";
        } else {
            if ($password === $cpassword) {

                $insertquery = "INSERT INTO `emaillogin`(`UserName`, `email`, `mobile`, `password`, `cpassword`, `token`, `status`) VALUES ('$username','$email','$mobile','$pass','$cpass', '$token', 'inactive')";

                $iqueary = mysqli_query($con, $insertquery);

                if ($iqueary) {

                    $subject = "Email Activation";
                    $body = "Hi $username, Click here to activate your account 
                    http://localhost/Form/emaillogin/activate.php?token=$token";
                    $sender_email = "From: henilmalaviya06@gmail.com";

                    if (mail($email, $subject, $body, $sender_email)) {
                        $_SESSION['msg'] = "Check your Mail to activate your Account $email";
                        header('location:login.php');
                    } else {
                        $_SESSION['msg'] = "Email sending Failed";
                    }
                } else {
                    $_SESSION['msg'] = "Failed to Save Imformation";
                }
            } else {
                $_SESSION['msg'] = "Password Are not mathcing";
            }
        }
    }

    ?>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>SignUp Form</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <p class="bg-info text-white px-4" style="width: 380px;"><?php if (isset($_SESSION['msg'])) {
                                                                                echo $_SESSION['msg'];
                                                                            } ?></p>
                <form action="" method="POST">
                    <input class="text" type="text" name="username" placeholder="Username" required="">
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
                    <input class="text email" type="telephone" name="mobile" placeholder="Phone Number" required="">
                    <input class="text" type="password" name="password" placeholder="Password" required="">
                    <input class="text w3lpass" type="password" name="cpassword" placeholder="Confirm Password" required="">
                    <div class="wthree-text">
                        <label class="anim">
                            <input type="checkbox" name="rememberme" class="checkbox" required="">
                            <a href="termsnConditions.php" class="tnc">Terms & Conditions</a>
                        </label>
                        <div class="clear"> </div>
                    </div>
                    <input type="submit" name="submit" value="SIGNUP">
                </form>
                <p>Already have an Account <a href="login.php"> SignIn Now!</a></p>
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