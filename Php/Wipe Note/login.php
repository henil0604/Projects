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
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://kit.fontawesome.com/23a0a9f173.js" crossorigin="anonymous"></script>
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php

    if (!isset($_SESSION['msg']) || !isset($_SESSION['msgBg']) || !isset($_SESSION['msgTxt'])) {
        $_SESSION['msg'] = "Fill All Imformation";
        $_SESSION['msgBg'] = "info";
        $_SESSION['msgTxt'] = "white";
    }
    if (isset($_POST['submit'])) {
        require 'db/db.php';
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
                    require 'db/db.php';
                    setcookie('emailcookie', $email, time() + 86400);
                    setcookie('passwordcookie', $password, time() + 86400);
                    $_SESSION['loginTrace'] = "Loginned";
                    $updatequery = "UPDATE emaillogin SET `status2`='online' WHERE token='$db_token'";
                    $query = mysqli_query($con, $updatequery);
                    if ($query) {
                        header("location:main.php?token=$db_token");
                    }
                } else {

                    setcookie('emailcookie', '', time() - 86400);
                    setcookie('passwordcookie', '', time() - 86400);
                    $_SESSION['loginTrace'] = "Loginned";
                    $updatequery = "UPDATE emaillogin SET `status2`='online' WHERE token='$db_token'";
                    $query = mysqli_query($con, $updatequery);
                    if ($query) {
                        header("location:main.php?token=$db_token");
                    }
                }
            } else {
                $_SESSION['msg'] = "Password Incorect";
                $_SESSION['msgBg'] = "danger";
                $_SESSION['msgTxt'] = "white";
            }
        } else {
            $_SESSION['msg'] = "Invalid Email";
            $_SESSION['msgBg'] = "danger";
            $_SESSION['msgTxt'] = "white";
        }
    }
    ?>
    <!-- main -->
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="inactive underlineHover"><a accesskey="u" href="index.php">Sign Up</a></h2>
            <h2 class="active"><a accesskey="l" href="login.php"> Sign In </a></h2>

            <!-- Icon -->
            <div class="bg-<?php echo $_SESSION['msgBg'] ?> text-<?php echo $_SESSION['msgTxt'] ?> fadeIn first">
                <p class="px-2" style="width: 100%;"><?php echo $_SESSION['msg']; ?></p>
            </div>

            <!-- Login Form -->
            <form action="" method="POST">
                <input type="email" id="login" class="fadeIn second" name="email"" value=" <?php
                                                                                            if (isset($_COOKIE['emailcookie'])) {
                                                                                                echo $_COOKIE['emailcookie'];
                                                                                            } else {
                                                                                                echo "";
                                                                                            }
                                                                                            ?>" placeholder="Email" required="">
                <input type="password" id="password" class="fadeIn third" name="password" value="<?php
                                                                                                    if (isset($_COOKIE['passwordcookie'])) {
                                                                                                        echo $_COOKIE['passwordcookie'];
                                                                                                    } else {
                                                                                                        echo "";
                                                                                                    }
                                                                                                    ?>" placeholder="Password" required="">
                <div id="toggle" onclick="showHide()">
                    <i class="fas fa-eye"></i>
                    <!-- <i class="fas fa-eye-slash"></i> -->
                </div>
                <br>
                <input type="checkbox" accesskey="m" id="checkbox" checked="" class="fadeIn fourth" name="rememberme">
                <label class="fadeIn fourth">Remember Me</label>
                <br>
                <input type="submit" name="submit" class="fadeIn fifth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover fadeIn sixth" href="recover_email.php">Forgot Password?</a>
            </div>

        </div>
    </div>
    <!-- //main -->

    <script>
        const password = document.getElementById('password');
        const toogle = document.getElementById('toggle');

        function showHide() {
            if (password.type === "password") {
                password.setAttribute('type', 'text')
                toogle.innerHTML = `<i class="fas fa-eye-slash"></i>`;
            } else {
                password.setAttribute('type', 'password')
                toogle.innerHTML = `<i class='fas fa-eye'></i>`;
            }
        }
    </script>
</body>

</html>