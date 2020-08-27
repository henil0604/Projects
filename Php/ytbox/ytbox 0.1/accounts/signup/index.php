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

    <link rel="stylesheet" href="../../css/style2.css">
    <title>SignUp Form</title>
    <style>
        .tnc {
            color: black;
            font-size: 16px;
        }

        .tnc:hover {
            color: blue;
        }
    </style>
</head>

<body>
    <?php

    if (isset($_POST['submit'])) {
        require '../db/db.php';
        require '../db/db_connect.php';

        $token = bin2hex(random_bytes(15));

        $profile_pic_main = $_FILES['profile_pic'];

        $profile_pic_tmp_name = $profile_pic_main['tmp_name'];

        $profile_pic_dir_name = $token . " " . date("d-m-Y h:i:s A") . ".png";

        $profile_pic_target = "../img/profilepics/" . $profile_pic_dir_name;

        $move = move_uploaded_file($profile_pic_tmp_name, $profile_pic_target);

        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);


        $emailquery = "select * from emaillogin where email='$email'";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if ($emailcount > 0) {
            $_SESSION['msg'] = "Email Already Exist";
            $_SESSION['msgBg'] = "danger";
            $_SESSION['msgTxt'] = "white";
        } else {
            if ($password === $cpassword) {

                $htmlTemp = '
                    <head>
                        <style>
                        img {
                            border: none;
                            -ms-interpolation-mode: bicubic;
                            max-width: 100%; }
                        body {
                            background-color: #f6f6f6;
                            font-family: sans-serif;
                            -webkit-font-smoothing: antialiased;
                            font-size: 14px;
                            line-height: 1.4;
                            margin: 0;
                            padding: 0; 
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%; }
                        table {
                            border-collapse: separate;
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            width: 100%; }
                            table td {
                            font-family: sans-serif;
                            font-size: 14px;
                            vertical-align: top; }
                        .body {
                            background-color: #f6f6f6;
                            width: 100%; }
                        .container {
                            display: block;
                            Margin: 0 auto !important;
                            /* makes it centered */
                            max-width: 580px;
                            padding: 10px;
                            width: 580px; }
                        .content {
                            box-sizing: border-box;
                            display: block;
                            Margin: 0 auto;
                            max-width: 580px;
                            padding: 10px; }
                        .main {
                            background: #fff;
                            border-radius: 3px;
                            width: 100%; }
                        .wrapper {
                            box-sizing: border-box;
                            padding: 20px; }
                        .footer {
                            clear: both;
                            padding-top: 10px;
                            text-align: center;
                            width: 100%; }
                            .footer td,
                            .footer p,
                            .footer span,
                            .footer a {
                            color: #999999;
                            font-size: 12px;
                            text-align: center; }
                        h1,
                        h2,
                        h3,
                        h4 {
                            color: #000000;
                            font-family: sans-serif;
                            font-weight: 400;
                            line-height: 1.4;
                            margin: 0;
                            Margin-bottom: 30px; }
                        h1 {
                            font-size: 35px;
                            font-weight: 300;
                            text-align: center;
                            text-transform: capitalize; }
                        p,
                        ul,
                        ol {
                            font-family: sans-serif;
                            font-size: 14px;
                            font-weight: normal;
                            margin: 0;
                            Margin-bottom: 15px; }
                            p li,
                            ul li,
                            ol li {
                            list-style-position: inside;
                            margin-left: 5px; }
                        a {
                            color: #3498db;
                            text-decoration: underline; }
                        .btn {
                            box-sizing: border-box;
                            width: 100%; }
                            .btn > tbody > tr > td {
                            padding-bottom: 15px; }
                            .btn table {
                            width: auto; }
                            .btn table td {
                            background-color: #ffffff;
                            border-radius: 5px;
                            text-align: center; }
                            .btn a {
                            background-color: #ffffff;
                            border: solid 1px #3498db;
                            border-radius: 5px;
                            box-sizing: border-box;
                            color: #3498db;
                            cursor: pointer;
                            display: inline-block;
                            font-size: 14px;
                            font-weight: bold;
                            margin: 0;
                            padding: 12px 25px;
                            text-decoration: none;
                            text-transform: capitalize; }
                        .btn-primary table td {
                            background-color: #3498db; }
                        .btn-primary a {
                            background-color: #3498db;
                            border-color: #3498db;
                            color: #ffffff; }
                        /* -------------------------------------
                            OTHER STYLES THAT MIGHT BE USEFUL
                        ------------------------------------- */
                        .last {
                            margin-bottom: 0; }
                        .first {
                            margin-top: 0; }
                        .align-center {
                            text-align: center; }
                        .align-right {
                            text-align: right; }
                        .align-left {
                            text-align: left; }
                        .clear {
                            clear: both; }
                        .mt0 {
                            margin-top: 0; }
                        .mb0 {
                            margin-bottom: 0; }
                        .preheader {
                            color: transparent;
                            display: none;
                            height: 0;
                            max-height: 0;
                            max-width: 0;
                            opacity: 0;
                            overflow: hidden;
                            mso-hide: all;
                            visibility: hidden;
                            width: 0; }
                        .powered-by a {
                            text-decoration: none; }
                        hr {
                            border: 0;
                            border-bottom: 1px solid #f6f6f6;
                            Margin: 20px 0; }
                        /* -------------------------------------
                            RESPONSIVE AND MOBILE FRIENDLY STYLES
                        ------------------------------------- */
                        @media only screen and (max-width: 620px) {
                            table[class=body] h1 {
                            font-size: 28px !important;
                            margin-bottom: 10px !important; }
                            table[class=body] p,
                            table[class=body] ul,
                            table[class=body] ol,
                            table[class=body] td,
                            table[class=body] span,
                            table[class=body] a {
                            font-size: 16px !important; }
                            table[class=body] .wrapper,
                            table[class=body] .article {
                            padding: 10px !important; }
                            table[class=body] .content {
                            padding: 0 !important; }
                            table[class=body] .container {
                            padding: 0 !important;
                            width: 100% !important; }
                            table[class=body] .main {
                            border-left-width: 0 !important;
                            border-radius: 0 !important;
                            border-right-width: 0 !important; }
                            table[class=body] .btn table {
                            width: 100% !important; }
                            table[class=body] .btn a {
                            width: 100% !important; }
                            table[class=body] .img-responsive {
                            height: auto !important;
                            max-width: 100% !important;
                            width: auto !important; }}
                        @media all {
                            .ExternalClass {
                            width: 100%; }
                            .ExternalClass,
                            .ExternalClass p,
                            .ExternalClass span,
                            .ExternalClass font,
                            .ExternalClass td,
                            .ExternalClass div {
                            line-height: 100%; }
                            .apple-link a {
                            color: inherit !important;
                            font-family: inherit !important;
                            font-size: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                            text-decoration: none !important; } 
                            .btn-primary table td:hover {
                            background-color: #34495e !important; }
                            .btn-primary a:hover {
                            background-color: #34495e !important;
                            border-color: #34495e !important; } }
                        </style>
                    </head>
                    <body class="">
                        <table border="0" cellpadding="0" cellspacing="0" class="body">
                        <tr>
                            <td>&nbsp;</td>
                            <td class="container">
                            <div class="content">
                                <span class="preheader">Subscribe to Coloured.com.ng mailing list</span>
                                <table class="main">

                                <!-- START MAIN CONTENT AREA -->
                                <tr>
                                    <td class="wrapper">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                        <td>
                                            <h1>Confirm your email</h1>
                                            <h2>You are just one step away</h2>
                                            <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                            <tbody>
                                                <tr>
                                                <td align="left">
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                        <td> <a href="wispychat.epizy.com/signup/activate.php?token=' . $token . '" target="_blank">Activate Wispychat Account</a> </td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                            <p>If you received this email by mistake, Simply delete it.</p>
                        
                                        </td>
                                        </tr>
                                    </table>
                                    </td>
                                </tr>
                                <!-- END MAIN CONTENT AREA -->
                                </table>
                            </div>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        </table>
                    </body>
            ';







                $insertquery = "INSERT INTO `emaillogin`(`UserName`, `email`, `mobile`, `password`, `cpassword`, `token`, `profile_pic`, `status`, `status2`) VALUES ('$username','$email','$mobile','$pass','$cpassword', '$token', '$profile_pic_dir_name', 'inactive', 'offline')";


                require "../phpmailer/class.phpmailer.php";

                $mail = new PHPMailer();
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                $mail->Username = 'henilmalaviya06@gmail.com';                     // SMTP username
                $mail->Password = '_mypassword_';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                    // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('henilmalaviya06@gmail.com', 'Wispychat');
                $mail->addAddress($email, "$username");     // Add a recipient
                $mail->isHTML(true);

                $mail->Subject = "Wispychat Account Activation";
                $mail->Body = $htmlTemp;

                if ($mail->send()) {
                    $_SESSION['msg'] = "Check Your Mail At $email To Activate Your Wispychat Account Password";
                    $sql = "INSERT INTO `settings`(`token`) VALUES('$token');";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $iqueary = mysqli_query($con, $insertquery);
                        if ($iqueary) {
                            header('location:../login/');
                        } else {
                            $_SESSION['msg'] = "Failed to Store Details Please Try Again";
                            $_SESSION['msgBg'] = "danger";
                            $_SESSION['msgTxt'] = "white";
                        }
                    } else {
                        $_SESSION['msg'] = "Failed To Save Your Setting Data Please Try Agian";
                    }
                } else {
                    $_SESSION['msg'] = "Email Sending Failed At $email, Please Try Again";
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
            <div class="text-center">
            </div>

            <!-- Icon -->
            <div class="fadeIn first my-2">
                <div class="bg-<?php echo $_SESSION['msgBg'] ?> text-<?php echo $_SESSION['msgTxt'] ?> fadeIn first">
                    <p class="px-2" style="width: 100%;"><?php if (isset($_SESSION['msg'])) {
                                                                echo $_SESSION['msg'];
                                                            } ?></p>
                </div>
            </div>

            <!-- Login Form -->
            <form action="" method="POST" enctype="multipart/form-data">
                Choose Profile Picture: <input type="file" id="profile_pic" class="fadeIn second" name="profile_pic">
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="Choose Username" required="">
                <input type="email" id="email" class="fadeIn third" name="email" placeholder="Email" required="">
                <br>
                <small id="emailText" class="form-text text-muted fadeIn third">This Email Address will use for Varification.</small>
                <input type="phone" id="mobile" class="fadeIn fourth" name="mobile" placeholder="Phone Number" required="">
                <input type="password" id="password" class="fadeIn fifth pass" name="password" placeholder="Choose Password" required="">
                <input type="password" id="cpassword" class="fadeIn sixth cpass" name="cpassword" placeholder="Repeat Password" required="">
                <i>
                    <p id="passmsg" class="passmsg"></p>
                </i>
                <br>
                <!-- <input type="checkbox" accesskey="m" id="checkbox" class="fadeIn seventh" name="tnc" required="">
                <a href="termsnConditions.php" class="tnc fadeIn seventh">Agree With Terms & Conditions</a>  -->
                <br>
                <input type="submit" name="submit" class="fadeIn eighth" value="SIGN UP">
            </form>

        </div>
    </div>
    <!-- //main -->
    <?php require '../link/footer.html'; ?>

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




<!-- Desciption -->
<!-- 

<ul>
    <li>
        What Is Wispychat?
    </li>
</ul>
​<p>
           Wispychat Chat Is Chat Website Where You Can Chat With Your Friends By Creating a Room Or Join Your Friend's Room.​ 
</p>

<ul>
    <li>
        Why Choose Wispychat?
    </li>
</ul>
<p>
      Because Provides A Lots of Features And Stay Away Users From Security Issues.
</p>

 -->




<!-- Features -->
<!-- ​
<ul>
    <li>​Sign Up Functionality​ With Email Verification</li>
    <li>Sign In Functionality​</li>
    <li>Forgot Password Functionality​​ With Email Verification​</li>
    <li>Remember Me Functionality​</li>
    <li>Create Room Functionality​​</li>
    <li>Join Room Functionality​​</li>
    <li>Live Peoples Already Registered​, Rooms Created​, Massages Sent​, Peoples Are Online​ Functionality​</li>
    <li>Search Friend With Username Functionality​​</li>
    <li>Send a Friend Request Functionality​​</li>
    <li>Accept Or Decline​ Friend Request Functionality​</li>
    <li>Delete Your Room Functionality​</li>
    <li>Setting of Default Showing Message Functionality​</li>
    <li>Setting of Read Previous Message Functionality​</li>
    <li>Setting of Run Time To Get All Messages Frequently ​Functionality​</li>
    <li>Mute Room Functionality​</li>
    <li>Online Users In Room ( Joiners ) Functionality​</li>
    <li>Room And Owner's Information Functionality​</li>
    <li>Disconnect Room Functionality​</li>
    <li>Responsive Room</li>
    <li>Delete Your Messages Functionality</li>
    <li>What's New Page</li>
    <li>Logout System</li>
</ul>
-->


<!-- Requirements -->
<!-- 
​There Is No Any Requirements To Use It. It will Work in Any Device.
-->



<!-- Instruction -->
<!-- 
<ul>
    <li>
        <strong>How To Sign Up in WispyChat?</strong>
    </li>
</ul>
<p>
    First Open a Website Than Go To Sign Up Form. Now simply Fill The Required Fields. Now Click On Sign Up Button. It may Take Less Than 1 Minutes To Save Your Data In Data Base. When the Process Will Complete You Will Receive a Mail On Provided Email Address Now Click On the Link Provided In Mail To Verify Your Account.
</p>

<ul>
    <li>
        <strong>How To Sign In in WispyChat?</strong>
    </li>
</ul>
<p>
    To Login or Sign In In WispyChat Go To Login Page. There You Have To Enter Your Username And Corresponding Password. Now It May Take Less Than 10 Seconds Depending on Your Internet Speed. After That You will Redirect To Home Page.
</p>

<ul>
    <li>
        <strong>How To Create Room in WispyChat?</strong>
    </li>
</ul>
<p>
    To Create a Room In WispyChat First Login In WispyChat. After That It Will Redirect To Home Page. There You Can See Two Buttons: First 'Claim Room', Second 'Join Room'. Now Click On Claim Room. Now You Can See Input Box. Now Type Your decided Room Name. You Can Only Use Alphanumeric Character. When Your Room Will ready you can chat with anyone.
</p>


<ul>
    <li>
        <strong>How To Join Room in WispyChat?</strong>
    </li>
</ul>
<p>
    To Join a Room In WispyChat First Login In WispyChat. After That It Will Redirect To Home Page. There You Can See Two Buttons: First 'Claim Room', Second 'Join Room'. Now Click On Join Room. Now You Can See Input Box. Now Type Room Name. When Your Room Will ready you can chat with anyone.
</p>

<ul>
    <li>
        <strong>How To Send A Friend Request in WispyChat?</strong>
    </li>
</ul>
<p>
    To Send A Friend Request In WispyChat First Login In WispyChat. After That It Will Redirect To Home Page. Now Scroll Down Little. There You Can See Search User Input Box. Now Search The Username Of Your Friend. Now You Can See The List of People Whose Username is Matched with Your Given Search Username. Now Find Your Friend and click On Add Friend.Now The Friend Request Will Send To Your Friend.
</p>


<ul>
    <li>
        <strong>How To Accept Or Decline A Friend Request in WispyChat?</strong>
    </li>
</ul>
<p>
    To Accept or Decline a Friend Request You Have To In go In 'Friend Request' Link Provided In Navigation Bar. There You Can See a List of a Friend Requests Which Are Sent to You. There is Two Option Of Each Friend Request : 'Accept','Decline'. If You Click On Accept That Friend Will Add To Your Friend List. If You Click on Decline That Do Nothing And Friend Request Will Remove to your Friend Request List.
</p>


<ul>
    <li>
        <strong>How To Delete My Made Room in WispyChat?</strong>
    </li>
</ul>
<p>
    To Delete Your Made Room You Have To Go In 'My Rooms' Link Provided in Navigation Bar. There You can See a List of Your Made Rooms. There You Can Delete Your Room. Now Click on 'Delete'.
    <br>
    <strong>Note:</strong> If You Click On 'Delete' Button Your Room Messages Will Delete Permanently. There Is No Way To Recover It.
</p>


<ul>
    <li>
        <strong>How To Mute Chat Room in WispyChat?</strong>
    </li>
</ul>
<p>
    If You Want to Mute The Chat Room First, Connect With Any Room. If You Are in Computer or Laptop ( Big Screen ) You can See Various Option Like: 'Mute', 'Joiners', 'Info' and 'Disconnect'. But If You Are In Mobile Screen ( Small Screen ) You have To Click On Three Line in Navigation Bar. Now Click On 'Mute'. The Chat Will Mute It Means That If Anyone Message in That Room That Message Will Not Come to Your Screen And You Can Save Your Data. If You Want To Unmute The Chat Room Click on 'Muted' Button.
</p>


<ul>
    <li>
        <strong>How To See Online Peoples in WispyChat?</strong>
    </li>
</ul>
<p>
    If You Want to See Online Peoples First Join The Chat Room First, Connect With Any Room. If You Are in Computer or Laptop ( Big Screen ) You can See Various Option Like: 'Mute', 'Joiners', 'Info' and 'Disconnect'. But If You Are In Mobile Screen ( Small Screen ) You have To Click On Three Line in Navigation Bar. Now Click On 'Joiners'. There You Can See Online Peoples Of That Chat Room.
</p>


<ul>
    <li>
        <strong>How To See Room Information in WispyChat?</strong>
    </li>
</ul>
<p>
    If You Want to See Room Information First Join The Chat Room First, Connect With Any Room. If You Are in Computer or Laptop ( Big Screen ) You can See Various Option Like: 'Mute', 'Joiners', 'Info' and 'Disconnect'. But If You Are In Mobile Screen ( Small Screen ) You have To Click On Three Line in Navigation Bar. Now Click On 'Info'. There You Can See Room Information of That Chat Room.
</p>


<ul>
    <li>
        <strong>How To Read Previous Messages in WispyChat?</strong>
    </li>
</ul>
<p>
    To Read Previous Messages Of That Chat Room Scroll Top in Chat Box. The Top You Can See 'Read Previous + _Your Previous Message Setting Value_ + Messages'. Now Click On That. It will Show You More '_Your Previous Message Setting Value_' Messages.
</p>

<ul>
    <li>
        <strong>How To Delete Your Messages in WispyChat?</strong>
    </li>
</ul>
<p>
    To Delete Your Messages Double Click On Your Message. Now You Will See A Dialog Box. Now Click On 'Delete Message' And Your Message Will Delete.
</p>

<ul>
    <li>
        <strong>How To Change Settings in WispyChat?</strong>
    </li>
</ul>
<p>
    To Change Setting Go To Home Page. In The Navigation Bar You Can See 'Settings'. Click On That. Now You Can See Settings.To Change Settings, Change Value After That Make Sure To Save Data.
</p>

<ul>
    <li>
        <strong>How To Recover Password in WispyChat?</strong>
    </li>
</ul>
<p>
    To Recover Your Account Password, Go To Login Page. Now at The Bottom Of The Form You can See 'Forgot Password?'. Now Click On It. Now It will Ask a Email Address. Type a Email. Now Click On Send Mail. Now The System will Send Mail To a Given Account To Confirm That The Owner of Are You.Now Check The Mail And And Open The Latest Mail And Click On the Provide Link. It Will Redirect To Recover Password Page. There You Have To Make Your New Password.
</p> -->