<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- in your header -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
    <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->


    <title>Wipe Discuss</title>
</head>

<?php require 'partials/_header.php' ?>
<?php require 'partials/_dbconnect.php' ?>

<?php

$thread_id = $_GET['id'];
$sql = "SELECT * FROM threads WHERE thread_id=$thread_id";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $thread_title = $row['thread_title'];
    $thread_desc = $row['thread_desc'];
    $thread_cat_id = $row['thread_cat_id'];
}

?>

<?php
if (isset($_POST['addanswer'])) {
    $answer_text = $_POST['ans'];
    $sql = "INSERT INTO `answers` (`answere_question_id`, `answere_text`) VALUES ('$thread_id','$answer_text')";
    $result = mysqli_query($conn, $sql);
}

?>

<div class="container my-5">
    <h1>Q. <?php echo $thread_title ?></h1>
    <h5 class="my-4"><b class="mr-3">Description:</b> <?php echo $thread_desc; ?></h5>
    <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#addanswerModal">Give Answere</button>
    <?php require "partials/_addanswer.php"; ?>

    <div class="my-4">
        <h3>Answeres:</h3>
        <div class="container ml-5">
            <?php
            $sql = "SELECT * FROM `answers` WHERE `answere_question_id`='$thread_id'";
            $result = mysqli_query($conn, $sql);
            $index = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $answere_id = $row['answer_id'];
                $answere_question_id = $row['answere_question_id'];
                $answere_text = $row['answere_text'];

                echo '
            <div class="media my-3">
                <h4 class="mr-3">Ans. ' . $index . ' </h4>
                <div class="media-body">
                    <p style="font-size: 18px;" class="text-muted">' . $answere_text . '</p>
                </div>
            </div>
        ';

                $index++;
            }
            ?>
        </div>
    </div>
</div>





<?php require 'partials/_footer.php' ?>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>