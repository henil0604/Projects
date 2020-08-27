<?php

require '../../db/db.php';
require '../../db/db_connect.php';

if (isset($_COOKIE['tokenwispy'])) {
    $token = $_COOKIE['tokenwispy'];
    $sql = "SELECT * FROM `emailogin` WHERE `token`='$token'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $_SESSION['username'] = $row['Username'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['mobile'] = $row['mobile'];
    $_SESSION['token'] = $row['token'];
    $_SESSION['status2'] = $row['ststus2'];

    if ($_SESSION['token'] == $row['token']) {
        $updatequery = "UPDATE emaillogin SET `status2`='online' WHERE token='$db_token'";
        $query = mysqli_query($con, $updatequery);
        $_SESSION['loginTrace'] = "Loginned";

        ?>
            <script>
                location.href = "http://wispychat.epizy.com/site/index.php";
            </script>

        <?php
    }
} else {
    $_SESSION['msg'] = "No Last Data Found First Login Once Here to Use Direct Login System";
    header("location: ../");
}
