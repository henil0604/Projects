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
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
            $_SESSION['msgBg'] = "danger";
            $_SESSION['msgTxt'] = "white";
        } else {
            if ($password === $cpassword) {

                $insertquery = "INSERT INTO `emaillogin`(`UserName`, `email`, `mobile`, `password`, `cpassword`, `token`, `status`, `status2`) VALUES ('$username','$email','$mobile','$pass','$cpass', '$token', 'inactive', 'offline')";


                $subject = "Email Activation";
                $body = "Hi $username, Click here to activate your account 
                    http://localhost/chat%20room%205/activate.php?token=$token";
                $sender_email = "From: henilmalaviya06@gmail.com";

                if (mail($email, $subject, $body, $sender_email)) {
                    $iqueary = mysqli_query($con, $insertquery);
                    if ($iqueary) {
                        $_SESSION['msg'] = "Check your Mail to activate your Account $email";
                        header('location:login.php');
                    } else {
                        $_SESSION['msg'] = "Failed to Store Details Please Try Again";
                        $_SESSION['msgBg'] = "danger";
                        $_SESSION['msgTxt'] = "white";
                    }
                } else {
                    $_SESSION['msg'] = "Email sending Failed";
                    $_SESSION['msgBg'] = "danger";
                    $_SESSION['msgTxt'] = "white";
                }
            } else {
                $_SESSION['msg'] = "Password Are not mathcing";
                $_SESSION['msgBg'] = "danger";
                $_SESSION['msgTxt'] = "white";
            }
        }
    }

    ?>
    <!-- main -->
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"><a accesskey="u" href="index.php">Sign Up</a></h2>
            <h2 class="inactive underlineHover"><a accesskey="l" href="login.php"> Sign In </a></h2>

            <!-- Icon -->
            <div class="fadeIn first">
                <div class="bg-<?php echo $_SESSION['msgBg'] ?> text-<?php echo $_SESSION['msgTxt'] ?> fadeIn first">
                    <p class="px-2" style="width: 100%;"><?php if (isset($_SESSION['msg'])) {
                                                                echo $_SESSION['msg'];
                                                            } ?></p>
                </div>
            </div>

            <!-- Login Form -->
            <form action="" method="POST">
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="Choose Username" required="">
                <input type="email" id="email" class="fadeIn third" name="email" placeholder="Email" required="">
                <input type="phone" id="mobile" class="fadeIn fourth" name="mobile" placeholder="Phone Number" required="">
                <input type="password" id="password" class="fadeIn fifth pass" name="password" placeholder="Choose Password" required="">
                <input type="password" id="cpassword" class="fadeIn sixth cpass" name="cpassword" placeholder="Repeat Password" required="">
                <i>
                    <p id="passmsg" class="passmsg"></p>
                </i>
                <br>
                <input type="checkbox" accesskey="m" id="checkbox" class="fadeIn seventh" name="tnc" required="">
                <a href="termsnConditions.php" class="tnc fadeIn seventh">Agree With Terms & Conditions</a>
                <br>
                <input type="submit" name="submit" class="fadeIn eighth" value="SIGN UP">
            </form>

        </div>
    </div>
    <!-- //main -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <script>
        var cpassword = document.getElementById('cpassword')
        cpassword.addEventListener('input', () => {
            cpassword = document.getElementById('cpassword').value
            password = document.getElementById('password').value
            if (password == cpassword) {
                passMsg = "The Password Are Mathing Now";
                document.getElementById('passmsg').innerHTML = passMsg;
                document.getElementsByClassName('pass')[0].style.border = "0.5px solid green";
                document.getElementsByClassName('cpass')[0].style.border = "0.5px solid green";
                document.getElementsByClassName('passmsg')[0].style.color = "green";
                setTimeout(() => {
                    document.getElementsByClassName('pass')[0].style.border = "";
                    document.getElementsByClassName('cpass')[0].style.border = "";
                }, 1000);
            } else {
                passMsg = "The Password is not Matching";
                document.getElementById('passmsg').innerHTML = passMsg;
                document.getElementsByClassName('pass')[0].style.border = "0.5px solid red";
                document.getElementsByClassName('cpass')[0].style.border = "0.5px solid red";
                document.getElementsByClassName('passmsg')[0].style.color = "red";
            }
        })
    </script>
</body>

</html>