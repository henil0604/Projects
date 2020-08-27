<?php


// deleting Note
if (isset($_POST['deletenote'])) {
    require 'db/db.php';
    require 'db/db2.php';
    $sno = $_POST['sno'];
    $token = $_GET['token'];
    $sql4 = "DELETE FROM `wipenote` WHERE `sno`='$sno' and `token`='$token'";
    $result4 = mysqli_query($con2, $sql4);
    if ($result4) {
        echo '
            <div id="warnDiv">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your Note Has Been Deleted.
                    <button type="button" class="close" onclick="warnClose()" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            ';
        header("location: main.php?token=$token");
    } else {
        echo '
            <div id="warnDiv">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Failed!</strong> Failed To Delete Your Note Please Try Again.
                    <button type="button" class="close" onclick="warnClose()" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        ';
    }
}
