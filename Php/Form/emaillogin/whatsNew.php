<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <title>What's New - World Custom News</title>

    <!-- styleSheet -->
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark" style="width: 100%;">
        <img src="worldNewsLogo3.png" class="d-inline-block align-top" id="worldNewsLogo" alt="World News">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="main.php?token=<?php echo $_SESSION['token'] ?>" onclick="mainHome()">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactUs.php?token=<?php echo $_SESSION['token'] ?>">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="termsnConditions.php?token=<?php echo $_SESSION['token'] ?>">Terms &
                        Conditions</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link">What's New</a>
                </li>
            </ul>
        </div>
    </nav>

    <br><br><br>
    <div class="container">
        <h6 id="MadeBy" class="card-subtitle mb-2 text-muted">-Made by Metal</h6>
        <br>

        <div class="newDiv my-3">
            <hr style="height: 2px; background-color: lightgrey;">

            <h4><strong>Updated at:</strong> 28 April 2020</h4>
            <br>

            <ul>
                <li> Fixed Some Bug Releted To Delete Account. </li>
            </ul>

            <br>
            <h6 class="card-subtitle mb-2 text-muted">New Update Comming Soon... <span style="color: lightseagreen;">Stay
                    Conected...</span>
            </h6>
            <hr style="height: 2px; background-color: lightgrey;">
        </div>

        <div class="newDiv my-3">
            <hr style="height: 2px; background-color: lightgrey;">

            <h4><strong>Updated at:</strong> 27 April 2020</h4>
            <br>

            <ul>
                <li> Added 'Delete Account' Option At login Page Where You can Delete Your Account. </li>
            </ul>

            <br>
            <h6 class="card-subtitle mb-2 text-muted">New Update Comming Soon... <span style="color: lightseagreen;">Stay
                    Conected...</span>
            </h6>
            <hr style="height: 2px; background-color: lightgrey;">
        </div>

        <div class="newDiv my-3">
            <hr style="height: 2px; background-color: lightgrey;">

            <h4><strong>Updated at:</strong> 20 April 2020</h4>
            <br>

            <ul>
                <li> Now You can add your Feedback At Home Page. </li>
            </ul>

            <br>
            <h6 class="card-subtitle mb-2 text-muted">New Update Comming Soon... <span style="color: lightseagreen;">Stay
                    Conected...</span>
            </h6>
            <hr style="height: 2px; background-color: lightgrey;">
        </div>

        <div class="newDiv my-3">
            <hr style="height: 2px; background-color: lightgrey;">

            <h4><strong>Updated at:</strong> 2 April 2020</h4>
            <br>

            <ul>
                <li> Fixed some Logo, Refresh Button and Navigation Bar related Issues. </li>
            </ul>

            <br>
            <h6 class="card-subtitle mb-2 text-muted">New Update Comming Soon... <span style="color: lightseagreen;">Stay
                    Conected...</span>
            </h6>
            <hr style="height: 2px; background-color: lightgrey;">
        </div>

        <div class="newDiv my-3">
            <hr style="height: 2px; background-color: lightgrey;">

            <h4><strong>Updated at:</strong> 1 April 2020</h4>
            <br>

            <ul>
                <li>Replaced Country and Catagory Selection on Home Page.</li>
            </ul>

            <br>
            <h6 class="card-subtitle mb-2 text-muted">New Update Comming Soon... <span style="color: lightseagreen;">Stay
                    Conected...</span>
            </h6>
            <hr style="height: 2px; background-color: lightgrey;">
        </div>

        <div class="newDiv my-3">
            <hr style="height: 2px; background-color: lightgrey;">

            <h4><strong>Updated at:</strong> 31 March 2020</h4>
            <br>

            <ul>
                <li>Added a new button at the Home Page named 'Get Headline'.</li>
                <li>Added a Gmail Id in Contact Us Page.</li>
            </ul>

            <br>
            <h6 class="card-subtitle mb-2 text-muted">New Update Comming Soon... <span style="color: lightseagreen;">Stay
                    Conected...</span>
            </h6>
            <hr style="height: 2px; background-color: lightgrey;">
        </div>

        <div class="newDiv my-3">
            <hr style="height: 2px; background-color: lightgrey;">

            <h4><strong>Updated at:</strong> 30 March 2020</h4>
            <br>

            <ul>
                <li>Updated a New Logo of Website In Navigation Bar.</li>
            </ul>

            <br>
            <h6 class="card-subtitle mb-2 text-muted">New Update Comming Soon... <span style="color: lightseagreen;">Stay
                    Conected...</span>
            </h6>
            <hr style="height: 2px; background-color: lightgrey;">
        </div>

        <div class="newDiv my-3">
            <hr style="height: 2px; background-color: lightgrey;">

            <h4><strong>Updated at:</strong> 29 March 2020</h4>
            <br>

            <ul>
                <li>Updated a Logo of Website In Navigation Bar.</li>
                <li>Updated a 'What's New' Button At Navigation Bar in Home Page And Contact Us Page.</li>
            </ul>

            <br>
            <h6 class="card-subtitle mb-2 text-muted">New Update Comming Soon... <span style="color: lightseagreen;">Stay
                    Conected...</span>
            </h6>
            <hr style="height: 2px; background-color: lightgrey;">
        </div>



    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>