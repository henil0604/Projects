<?php
require "config.php";

$u_id = "";
$u_name = "";
$u_comment = "";
$update = false;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $date = date("Y-m-d");

    $sql = "INSERT INTO comment_table(name, comment, cur_date)VALUES('$name','$comment', '$date')";

    if ($conn->query($sql)) {
        $msg = "Posted Successfully!";
    } else {
        $msg = "Failed To Post Comment!";
    }
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $sql = "DELETE FROM comment_table WHERE id='$id'";

    if ($conn->query($sql)) {
        header('location: index.php');
    }
}
