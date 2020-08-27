<?php
session_start();

require '../db/db.php';
require '../db/db_connect.php';

$token = $_SESSION['token'];
$test_id = $_GET['test_id'];

if (isset($test_id) || $test_id != "") {
    $sql = "SELECT * FROM `tests` WHERE `test_id`='$test_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $test_title = $row['title'];
    $test_cat = $row['cat'];
    $test_desc = $row['desc'];
} else {
    header("location: ../tests/");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require '../links/head.html'; ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1  iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/test.css">
    <title>Online Test</title>
</head>

<body>


    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet" />
            <div class="container">
                <div class="heading">
                    <h2 class="heading__text">​<?php echo $test_title ?> - <?php echo $test_cat ?></h2>
                    <h5 class="text-center" style="color: #999999;"><?php echo $test_desc ?></h5>
                </div>

                <!-- Quiz section -->
                <div class="quiz">
                    <div id="alertDiv"></div>
                    <div class="quiz__heading">
                        <h2 class="quiz__heading-text">
                            <form id="mark" action="" method="POST">
                                <input type="hidden" id="resultHide" name="mark">
                                <span class="result" name="result"></span> Our of <span class="result" id="outof"></span> Points
                                <br>
                                <a type="submit" value="Go Back" class="submit" type="hidden" href="../tests/">Go Back</a>
                            </form>
                        </h2>
                    </div>


                    <form class="quiz-form" onsubmit="return false">
                        <?php
                        ?>
                        <script>
                            var correctAns = [];
                            var que_mark = [];
                            var userAns = [];
                        </script>
                        <?php
                        $sql2 = "SELECT * FROM `questions` WHERE `test_id`='$test_id'";
                        $result2 = mysqli_query($conn, $sql2);
                        $index = 1;
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $que_id = $row2['que_id'];
                                $que_title = $row2['question'];
                                $que_option1 = $row2['option1'];
                                $que_option2 = $row2['option2'];
                                $que_option3 = $row2['option3'];
                                $que_option4 = $row2['option4'];
                                $que_ans = $row2['ans'];
                                $que_mark = $row2['que_score'];
                        ?>
                                <script>
                                    correctAns.push("<?php echo $que_ans ?>")
                                    que_mark.push("<?php echo $que_mark ?>")
                                </script>
                        <?php

                                echo '
                                    <div class="quiz-form__quiz">
                                        <p class="quiz-form__question" style="display: space-between; word-wrap: break-word;">
                                            ' . $index . '. ' . $que_title . '  <span style="float: right;">(' . $que_mark . ' Points)</span>
                                        </p>
                                        <label class="quiz-form__ans">
                                            <input type="radio" class="quiz-input" name="que' . $index . '" id="que' . $index . '" value="A" required=""/>
                                            <span class="design"></span>
                                            <span class="text">' . $que_option1 . '</span>
                                        </label>
                                        <label class="quiz-form__ans">
                                            <input type="radio" class="quiz-input" name="que' . $index . '" id="que' . $index . '" value="B" required=""/>
                                            <span class="design"></span>
                                            <span class="text">' . $que_option2 . '</span>
                                        </label>
                                        <label class="quiz-form__ans">
                                            <input type="radio" class="quiz-input" name="que' . $index . '" id="que' . $index . '" value="C" required=""/>
                                            <span class="design"></span>
                                            <span class="text">' . $que_option3 . '</span>
                                        </label>
                                        <label class="quiz-form__ans">
                                            <input type="radio" class="quiz-input" name="que' . $index . '" id="que' . $index . '" value="D" required=""/>
                                            <span class="design"></span>
                                            <span class="text">' . $que_option4 . '</span>
                                        </label>
                                    </div>  
                                ';
                                $index += 1;
                            }
                        }

                        ?>
                        <div id="submit">
                            <input class="submit" value="Submit Answers" type="submit">
                        </div>
                    </form>
                </div>


            </div>
        </div>

    </div>
    </div>


    <?php require '../links/footer.html'; ?>
    <script src="../js/test.js"></script>
    <script>
        function disableF5(e) {
            if (((e.which || e.keyCode) == 116) || ((e.which || e.keyCode) == 82)) {
                e.preventDefault();
                document.getElementById('alertDiv').innerHTML = `
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 rounded relative my-3" role="alert">
                    <strong class="font-bold">Warning! </strong>
                    <span class="block sm:inline font-bold">You Can Not Refresh The Page.</span>
                </div>`;
                console.log("Sorry You Can Not Refresh Page")

                setTimeout(() => {
                    document.getElementById('alertDiv').innerHTML = ""
                }, 3000);
            }
        };

        $(document).ready(function() {
            $(document).on("keydown", disableF5);
        });
    </script>
</body>

</html>



<!-- 9377444493 -->