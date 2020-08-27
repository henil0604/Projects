<?php
$token = $_GET['token'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Note website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/navbar.html' ?>
    <?php
    require 'db/db.php';
    require 'db/db2.php';
    $token = $_GET['token'];
    // Getting Data Of User Using Token

    $sql = "SELECT * FROM `emaillogin` WHERE token='$token'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $username = $row['Username'];
                $email = $row['email'];
            }
        }
    }

    // checking that add note button is clicked
    if (isset($_POST['submit'])) {

        $title = $_POST['title'];
        $note = $_POST['note'];

        // insetring the note into database
        $sql2 = "INSERT INTO `wipenote`(`title`, `note`, `token`, `name`) VALUES ('$title','$note','$token','$username')";
        $result2 = mysqli_query($con2, $sql2);
        if ($result2) {
            echo '
            <div id="warnDiv">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your Note has been Added.
                    <button type="button" class="close" onclick="warnClose()" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            ';
        } else {
            echo '
            <div id="warnDiv">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Failed!</strong> Failed To Add Your Note Please Try Again.
                    <button type="button" class="close" onclick="warnClose()" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            ';
        }
    }
    ?>
    </div>
    <div class="container my-3">
        <h1>Welcome to Wipe Note</h1>
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <h5 class="card-title">Add a Title</h5>
                        <input name="title" type="text" class="form-control" id="addTitle" area-discribeby="title" placeholder="Enter Title" required="">
                    </div>
                    <h5 class="card-title">Add a Note</h5>
                    <div class="form-group">
                        <textarea name="note" class="form-control" id="addTxt" rows="3" required=""></textarea>
                    </div>
                    <input type="submit" name="submit" id="addBtn" class="btn btn-primary" value="Add Note">
                </form>
            </div>
        </div>
        <h1>Your Notes</h1>
        <hr>
        <div id="notes" class="row container-fluid">
            <?php

            // bringing the notes from data base
            if (isset($_GET['token'])) {
                $token = $_GET['token'];
                $sql3 = "SELECT * FROM `wipenote` WHERE `token`='$token' and `name`='$username'";
                $result3 = mysqli_query($con2, $sql3);
                if ($result3) {
                    if (mysqli_num_rows($result3) > 0) {
                        while ($row2 = mysqli_fetch_assoc($result3)) {
                            $title = $row2['title'];
                            $note = $row2['note'];
                            $sno = $row2['sno'];
                            echo '
                                <div class="card my-2 mx-2" style="width: 20rem;">
                                <div class="card-body">
                                    <h5 class="card-title">' . $title . '</h5>
                                    <p class="card-text">' . $note . '</p>
                                    <form action="deletenote.php?token=' . $token . '" method="POST">
                                        <input type="hidden" name="sno" value="' . $sno . '">
                                        <input type="submit" name="deletenote" class="btn btn-primary" value="Delete Note">
                                    </form>
                                </div>
                                </div>
                            ';
                        }
                    } else {
                        echo "You haven't Added Any Note Yet, Click 'Add Note' to Add Note";
                    }
                } else {
                }
            }
            ?>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/note.js"></script>
</body>

</html