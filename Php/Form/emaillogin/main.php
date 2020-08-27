<?php

session_start();

?>
<?php

if (!isset($_SESSION['loginTrace'])) {
    $_SESSION['msg'] = "You Havn't Logged In. First Login Here";
    header('location:login.php');
}
?>
<?php

if (isset($_SESSION['feedbackerror'])) {
?>

    <script>
        alert("<?php echo $_SESSION['feedbackerror'] ?>")
    </script>

<?php

    $_SESSION['feedbackerror'] = null;
} else if (isset($_SESSION['feedbackSuccess'])) {
?>

    <script>
        alert("<?php echo $_SESSION['feedbackSuccess'] ?>")
    </script>

<?php

    $_SESSION['feedbackSuccess'] = null;
}




?>

<html>

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Welcome <?php echo $_SESSION['username'] ?> - Home - World Custom News</title>

    <link rel="stylesheet" href="stylesheet.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
    <script type="text/javascript">
        $.getJSON("https://jsonip.com?callback=?", function(data) {
            localStorage.setItem(`ClientIp`, " IP address is:- " + data.ip);
        });
    </script>

</head>

<body>
    <?php

    if (isset($_POST['feedbacksubmit'])) {
        include 'db2.php';
        $token = $_GET['token'];
        $_SESSION['token'] = $token;
        $feedback = $_POST['feedback'];
        if ($feedback == "") {
    ?>
            <script>
                alert('Please input Some Feedback...')
            </script>

    <?php
        } else {
            $_SESSION['feedback'] = $feedback;
            header('location:feedback.php');
        }
    }
    ?>



    <p id="scrollIsThis"></p>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark" style="width: 100%;">
        <img src="worldNewsLogo3.png" class="d-inline-block align-top" id="worldNewsLogo" alt="World Custom News">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link " href="main.php?token=<?php echo $_SESSION['token'] ?>" onclick="mainHome()">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="contactUs.php?token=<?php echo $_SESSION['token'] ?>">Contact Us</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="termsnConditions.php?token=<?php echo $_SESSION['token'] ?>">Terms & Conditions</a>
                </li>
            </ul>
            <button class="btn btn-outline-warning my-2 my-sm-0" onclick="location.href = 'whatsNew.php?token=<?php echo $_SESSION['token']; ?>'" type=" button">What's New?</button>
            <button class="btn btn-outline-danger my-2 my-sm-0 mx-2" onclick="location.href = 'logout.php'" type=" button" id="logout">Log Out</button>
        </div>
    </nav>
    <br><br><br>
    <div class="container my-2">
        <h6 id="MadeBy" class="card-subtitle mb-2 text-muted">-Made by Mr Metal</h6>
        <h3 id="MadeBy" class="card-subtitle mb-2 text-muted">Welcome <u><?php

                                                                            if (isset($_SESSION['username'])) {
                                                                                echo $_SESSION['username'];
                                                                            } else {
                                                                                echo "User";
                                                                            }

                                                                            ?></u> ,</h3>

        <br>
        <div class="selection">
            <form action="" method="POST">
                <select id="country-input" name="country" class="country-input" onchange="newsResponse()">
                    <option id="country-input-item" value="in"><a>India</a></option>
                    <option id="country-input-item" value="ar">Argentina</option>
                    <option id="country-input-item" value="au">Australia</option>
                    <option id="country-input-item" value="at">Austria</option>
                    <option id="country-input-item" value="be">Belgium</option>
                    <option id="country-input-item" value="br">Brazil</option>
                    <option id="country-input-item" value="bg">Bulgaria</option>
                    <option id="country-input-item" value="ca">Canada</option>
                    <option id="country-input-item" value="co">Colombia</option>
                    <option id="country-input-item" value="cu">Cuba</option>
                    <option id="country-input-item" value="cz">Czech Republic</option>
                    <option id="country-input-item" value="eg">Egypt</option>
                    <option id="country-input-item" value="fr">France</option>
                    <option id="country-input-item" value="de">Germany</option>
                    <option id="country-input-item" value="gr">Greece</option>
                    <option id="country-input-item" value="hu">Hungary</option>
                    <option id="country-input-item" value="id">Indonesia</option>
                    <option id="country-input-item" value="ie">Ireland</option>
                    <option id="country-input-item" value="il">Israel</option>
                    <option id="country-input-item" value="it">italy</option>
                    <option id="country-input-item" value="jp">Japan</option>
                    <option id="country-input-item" value="lv">Latvia</option>
                    <option id="country-input-item" value="lt">Lithuania</option>
                    <option id="country-input-item" value="my">Malaysia</option>
                    <option id="country-input-item" value="mx">Maxico</option>
                    <option id="country-input-item" value="ma">Morocco</option>
                    <option id="country-input-item" value="nl">Netherlands</option>
                    <option id="country-input-item" value="nz">New Zealand</option>
                    <option id="country-input-item" value="ng">Nigeria</option>
                    <option id="country-input-item" value="no">Norway</option>
                    <option id="country-input-item" value="ph">Philippines</option>
                    <option id="country-input-item" value="pl">Poland</option>
                    <option id="country-input-item" value="pt">Portagal</option>
                    <option id="country-input-item" value="ro">Romania</option>
                    <option id="country-input-item" value="ru">Russia</option>
                    <option id="country-input-item" value="sa">Saudi Arabia</option>
                    <option id="country-input-item" value="rs">Serbia</option>
                    <option id="country-input-item" value="sg">Singapore</option>
                    <option id="country-input-item" value="sk">Slovakia</option>
                    <option id="country-input-item" value="si">Slovenia</option>
                    <option id="country-input-item" value="za">South Africa</option>
                    <option id="country-input-item" value="kr">South korea</option>
                    <option id="country-input-item" value="se">Sweden</option>
                    <option id="country-input-item" value="ch">Switzerland</option>
                    <option id="country-input-item" value="tw">Taiwan</option>
                    <option id="country-input-item" value="th">Thailand</option>
                    <option id="country-input-item" value="tr">Turkey</option>
                    <option id="country-input-item" value="ae">UAE</option>
                    <option id="country-input-item" value="us">Ukraine</option>
                    <option id="country-input-item" value="gb">United Kingdom</option>
                    <option id="country-input-item" value="us">United Status</option>
                    <option id="country-input-item" value="ve">Venuzuela</option>
                </select>
                <select id="catagory-input" name="catagory" class="catagory-input" onchange="newsResponse()">
                    <option id="catagory-input-item">Top</option>
                    <option id="catagory-input-item" value="science">Science</option>
                    <option id="catagory-input-item" value="technology">Technology</option>
                    <option id="catagory-input-item" value="health">Health</option>
                    <option id="catagory-input-item" value="business">Business</option>
                    <option id="catagory-input-item" value="sports">Sports</option>
                    <option id="catagory-input-item" value="entertainment">Entertainment</option>
                </select>
            </form>
            <div id="refreshMainDiv" class="my-3">
            </div>
        </div>
        <h6 class="card-subtitle mb-2 text-muted" id="response"></h6>
        <div id="totalResults"></div>
        <div class="Response" id="Response">
        </div>

        <h4 class="errorDiv" id="errorDiv"></h4>
        <hr style="height: 1px; background-color: rgba(0,0,0,0.6);">
        <center>
            <h6 class="card-subtitle mb-2 text-muted my-2">Thanks For Visiting Us.</h6>
            <h6 class="card-subtitle mb-2 text-muted my-2">Supported For UI By <a href="https://getbootstrap.com/" target="_blank">getbootstrap.com</a></h6>
            <h6 class="card-subtitle mb-2 text-muted my-2">Supported For Json Files By <a href="https://newsapi.org/" target="_blank">newsapi.org</a></h6>
            <h6 class="card-subtitle mb-2 text-muted my-2">Give Your <button type="button" onclick="feedbackResponse()" class="btn btn-secondary btn-sm" id="scroll4">Feedback</button></h6>
        </center>

        <div class="my-5" id="more"></div>
        <div class="feedbackResponseDiv" id="feedbackResponseDiv"></div>

    </div>

    <script src="index.js"></script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>



</html>