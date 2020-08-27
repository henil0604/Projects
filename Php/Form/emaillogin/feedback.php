<?php
session_start();

?>


<?php

include 'db2.php';
$feedback = $_SESSION['feedback'];
$username = $_SESSION['username'];
$mobile = $_SESSION['mobile'];
$email = $_SESSION['email'];

$iquery = "INSERT INTO `worldcustomnews` (`Sr No`, `username`, `email`, `mobilenumber`, `Feedback`, `Date`) VALUES (NULL, '$username', '$email', '$mobile', '$feedback', current_timestamp());";

$query = mysqli_query($con2, $iquery);

if ($query) {
    header('location:main.php');
    $_SESSION['feedbackSuccess'] = "Your Feedback sent. Thanks For Your Feedback...";
} else {
    header('location:main.php');
    $_SESSION['feedbackerror'] = "Sorry We can't Send Your Feedback, Please Try Again Later";
}



?>