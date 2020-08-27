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
$showAlert = False;
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    $th_title = $_POST['title'];
    $th_desc = $_POST['desc'];
    $sql = "INSERT INTO `threads`(`thread_title`, `thread_desc`, `thread_cat_id`) VALUES ('$th_title','$th_desc', '$catid')";
    $result = mysqli_query($conn, $sql);
    $showAlert = True;
    if ($showAlert) {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfully!</strong> Your Question Is Submitted, Please Wait for Community to Response.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ';
    }
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
    <h1><u>Start Discusssion Releted to <?php echo $catagoryname ?>:</u></h1>

    <?php
    $catid = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$catid";
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $noResult = false;
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $id = $row['thread_id'];
        echo '
            <div class="media my-3">
                <img src="img/user_default.png" width="54px" class="mr-3" alt="User">
                <div class="media-body">
                    <h5 class="mt-0"><a class="text-dark" href="threads.php?id=' . $id . '">' . $title . '</a></h5>
                    ' . $desc . '
                </div>
            </div>
    ';
    }
    if ($noResult == true) {
        echo '
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <p class="display-4">No Threads Found</p>
                    <p class="lead">Be The First Person to Ask a Question.</p>
                </div>
            </div>
        ';
    }

    ?>


    <form class="my-3" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Problem Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">KEEP YOUR TITLE AS SHORT AS POSIBLE.</small>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Problem Description</label>
            <textarea class="form-control" id="desc" name="desc" rows="4"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>




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