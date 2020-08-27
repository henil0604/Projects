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
    <title>SignIn Form</title>
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


    if (!$_SESSION['msg']) {
        $_SESSION['msg'] = "Fill All Imformation";
    }
    if (isset($_POST['submit'])) {
        include 'db.php';
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search = " select * from emaillogin where email='$email' and status='active' ";
        $query = mysqli_query($con, $email_search);

        $email_count = mysqli_num_rows($query);

        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);

            $db_pass = $email_pass['password'];
            $db_user = $email_pass['Username'];
            $db_token = $email_pass['token'];
            $db_mobile = $email_pass['mobile'];
            $db_email = $email_pass['email'];

            $_SESSION['username'] = $db_user;
            $_SESSION['email'] = $db_email;
            $_SESSION['mobile'] = $db_mobile;
            $_SESSION['token'] = $db_token;


            $pass_decode = password_verify($password, $db_pass);

            if ($pass_decode) {
                if (isset($_POST['rememberme'])) {

                    setcookie('emailcookie', $email, time() + 86400);
                    setcookie('passwordcookie', $password, time() + 86400);

                    $_SESSION['loginTrace'] = "Loginned";

                    header("location:main.php?token='$db_token'");
                } else {

                    setcookie('emailcookie', '', time() - 86400);
                    setcookie('passwordcookie', '', time() - 86400);

                    $_SESSION['loginTrace'] = "Loginned";

                    header("location:main.php?token=$db_token'");
                }
            } else {
                $_SESSION['msg'] = "Password Incorect";
            }
        } else {
            $_SESSION['msg'] = "Invalid Email";
        }
    }
    ?>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>SignIn Form</h1>
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
                    <input class="text" type="password" name="password" value="<?php
                                                                                if (isset($_COOKIE['passwordcookie'])) {
                                                                                    echo $_COOKIE['passwordcookie'];
                                                                                } else {
                                                                                    echo "";
                                                                                }
                                                                                ?>" placeholder="Password" required="">
                    <br>
                    <div class="wthree-text">
                        <label class="anim">
                            <input type="checkbox" checked="" name="rememberme" class="checkbox">
                            <span>Remember Me</span>
                        </label>
                        <div class="clear"> </div>
                    </div>
                    <input type="submit" name="submit" value="SIGNIN">
                </form>
                <p>Forgot Password? No Worry! <a href="recover_email.php"> Click Here</a></p>
                <p>Don't have an Account? <a href="index.php"> SignUp Now!</a></p>
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