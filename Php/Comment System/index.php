<?php
require 'action.php';

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/23a0a9f173.js" crossorigin="anonymous"></script>

    <title>Comment System</title>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center mb-2">
            <div class="col-lg-5 bg-light rounded mt-2">
                <h4 class="text-center p-2">Write Your Comment!</h4>
                <form action="index.php" method="POST" class="p-2">
                    <input type="hidden" name="id" value="<?= $u_id; ?>">
                    <div class="form-group">
                        <input class="form-control rounded-0" type="text" name="name" placeholder="Enter Your Name" required="" value="<?= $u_name; ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="comment" class="form-control rounded-0" placeholder="Write Your Comment" required=""><?= $u_comment;  ?></textarea>
                    </div>
                    <div class="form-group">
                        <?php if ($update == true) { ?>
                            <input type="submit" name="update" value="Update" class="btn btn-success rounded-1" placeholder="Update Comment">
                        <?php } else { ?>
                            <input type="submit" name="submit" value="Post" class="btn btn-primary rounded-1" placeholder="Post Comment">
                        <?php } ?>

                        <h5 class="float-right text-success p-2"><?php if (isset($msg)) {
                                                                        echo $msg;
                                                                    } ?></h5>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5 rounded bg-light p-3">
                <?php
                $sql = "SELECT * FROM comment_table ORDER BY id DESC";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="card mb-2 border-secondary">
                        <div class="card-header bg-secondary py-1 text-light">
                            <span class="font-italic">Posted By : <?= $row['name'] ?></span>
                            <span class="float-right font-italic">At : <?= $row['cur_date'] ?></span>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?= $row['comment'] ?></p>
                        </div>
                        <div class="card-footer py-2">
                            <div class="float-right">
                                <a href="action.php?del=<?= $row['id'] ?>" class="text-danger mr-2" onclick="return confirm(' Do You want to delete This Comment?');" title="Delete"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>