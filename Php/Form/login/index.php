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
</head>

<body>
    <?php

    if (isset($_POST['submit'])) {
        include 'db.php';
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search = " select * from signupform where email='$email' ";
        $query = mysqli_query($con, $email_search);

        $email_count = mysqli_num_rows($query);

        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);

            $db_pass = $email_pass['password'];

            $pass_decode = password_verify($password, $db_pass);

            if ($pass_decode) {
                echo "<br>" . "login Successful" . "<br>";
            } else {
                echo "<br>" . "password Incorect" . "<br>";
            }
        } else {
            echo "<br>" . "Invalid Email" . "<br>";
        }
    }
    ?>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>SignIn Form</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="" method="POST">
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
                    <input class="text" type="password" name="password" placeholder="Password" required="">
                    <input type="submit" name="submit" value="SIGNIN">
                </form>
                <p>Don't have an Account <a href="../signup/index.php"> SignUp Now!</a></p>
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