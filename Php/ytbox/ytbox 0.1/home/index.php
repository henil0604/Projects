<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php require '../links/header.html'; ?>
    <link rel="stylesheet" href="../css/index.css" />

    <title>YT bOx</title>
</head>

<body>
    <?php require '../partials/_navbar.php'; ?>

    <?php
    require '../db/db_connect.php';
    $sql = "SELECT * FROM `videos`";
    $result = mysqli_query($con, $sql);
    $index = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $desc = $row['desc'];
        $v = $row['v'];
        $owner = $row['owner'];

        $temp = '
            <div class="media">
                <div class="mr-3">' . $index . '.</div>
                <div class="media-body">
                    <h5 class="mt-0"><a href="../watch?v=' . $v . '">' . $title . '<a></h5>
                    <span class="text-light">' . $desc . '</span>
                </div>
            </div>
        ';

        echo $temp;

        $index++;
    }

    ?>


    <?php require '../links/footer.html'; ?>
</body>

</html>