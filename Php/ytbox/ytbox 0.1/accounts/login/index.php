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
    <style>
        #toggle {
            position: absolute;
            top: 45%;
            right: 10%;
            width: 30px;
            height: 30px;
            transform: translateY(-50%);
            background-size: cover;
            cursor: pointer;
        }
    </style>
    <!-- Custom Theme files -->
    <link href="../../css/style2.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <?php

    if (isset($_POST['submit'])) {
        require '../../db/db_connect.php';
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `accounts` WHERE `email`='$email'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $db_password = $row['password'];
            if ($db_password == $password) {
                $_SESSION['token'] = $row['token'];
                $_SESSION['logintrace'] = true;
                header("location: ../../home/");
            }
        }
    }
    ?>
    <!-- main -->
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="text-center">
                <a class="btn btn-info btn-sm" href="../">Go to Cover Page</a>
            </div>

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
                <a class="underlineHover fadeIn sixth" href="forgotpass/">Forgot Password?</a>
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