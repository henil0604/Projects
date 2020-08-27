<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/threads.css">
    <title>Wipe Discuss</title>
</head>

<?php require 'partials/_header.php' ?>
<?php require 'partials/_dbconnect.php' ?>

<?php
$catid = $_GET['catid'];
$sql = "SELECT * FROM `catagories` WHERE catagory_id=$catid";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $catagoryname = $row['catagory_name'];
    $catagorydiscription = $row['catagory_discription'];
}
?>

<?php
if (isset($_POST['addQuestion'])) {
    $thread_title = $_POST['title'];
    $thread_desc = $_POST['desc'];
    $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUE ('$thread_title','$thread_desc','$catid','0')";
    $result = mysqli_query($conn, $sql);
}

?>

<div class="container my-3">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to <?php echo $catagoryname; ?> Forum!</h1>
        <p class="lead"><?php echo $catagorydiscription; ?></p>
        <hr class="my-4">
        <p> No Spam / Advertising / Self-promote in the forums.
            Do not post copyright-infringing material.
            Remain respectful of other members at all times.</p>
    </div>
</div>

<div class="container">
    <div>
        <button class="btn btn-success bt-sm float-right" data-toggle="modal" data-target="#addquestionModal">Add Question</button>
        <?php include 'partials/_addquestion.php'; ?>

        <h1><u>Browse Questions Releted to <?php echo $catagoryname ?>:</u></h1>
    </div>
    <?php
    $catid = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$catid";
    $result = mysqli_query($conn, $sql);
    $index = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $id = $row['thread_id'];
        echo '
            <div class="media my-3">
                <h3 class="mr-3">Q. ' . $index . ' </h3>
                <div class="media-body">
                    <h5 class="mt-0"><a class="text-dark" href="threads.php?id=' . $id . '">' . $title . '</a></h5>
                    ' . substr($desc, 0, 200) . '...
                </div>
            </div>
    ';
        ++$index;
    }

    ?>
</div> <?php require 'partials/_footer.php' ?>

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