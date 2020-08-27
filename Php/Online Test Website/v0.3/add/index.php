<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require '../links/head.html'; ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>Add</title>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        require '../db/db.php';
        require '../db/db_connect.php';

        $test_id = $_POST['test_id'];
        $points = $_POST['points'];
        $que = $_POST['que'];
        $o1 = $_POST['o1'];
        $o2 = $_POST['o2'];
        $o3 = $_POST['o3'];
        $o4 = $_POST['o4'];
        $ans = $_POST['ans'];

        $sql = "INSERT INTO `questions`(`test_id`, `question`, `option1`, `option2`, `option3`, `option4`, `ans`, `que_score`) VALUES ('$test_id', '$que', '$o1', '$o2', '$o3', '$o4', '$ans', '$points')";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo 'FAILED TO INSERT';
        }
    }
    ?>


    <div class="container my-5">
        <form action="" method="POST">
            <div class="form-group flex my-2">
                <label>Test Id: </label>
                <input type="number" name="test_id" class="form-control w-25 mx-2" required="">
                <label>Points:</label>
                <input type="number" name="points" class="form-control w-25 mx-2" required="">
            </div>
            <div class="form-group flex my-2">
                <label>Que:</label>
                <input type="text" name="que" class="form-control mx-2" required="">
            </div>
            <div class="form-group flex my-2">
                <label>O1:</label>
                <input type="text" name="o1" class="form-control mx-2" required="">
            </div>
            <div class="form-group flex my-2">
                <label>O2:</label>
                <input type="text" name="o2" class="form-control mx-2" required="">
            </div>
            <div class="form-group flex my-2">
                <label>O3:</label>
                <input type="text" name="o3" class="form-control mx-2" required="">
            </div>
            <div class="form-group flex my-2">
                <label>O4:</label>
                <input type="text" name="o4" class="form-control mx-2" required="">
            </div>
            <div class="form-group flex my-2">
                <label>Ans:</label>
                <input type="text" name="ans" class="form-control mx-2" required="">
            </div>
            <button type="submit" name="submit" class="btn btn-primary my-2">Add</button>
        </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <?php require '../links/footer.html'; ?>
</body>

</html>