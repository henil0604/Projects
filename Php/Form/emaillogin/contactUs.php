<?php
session_start()
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Contact Us- World Custom News</title>



    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- StyleSheet -->
    <link rel="stylesheet" href="stylesheet.css">

    <!--fontawesome.com -->
    <script src="https://kit.fontawesome.com/23a0a9f173.js" crossorigin="anonymous"></script>

</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark" style="width: 100%;">
        <img src="worldNewsLogo3.png" class="d-inline-block align-top" id="worldNewsLogo" alt="World News">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <<li class="nav-item">
                    <a class="nav-link" href="main.php?token=<?php echo $_SESSION['token'] ?>" onclick="mainHome()">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="contactUs.php?token=<?php echo $_SESSION['token'] ?>">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="termsnConditions.php?token=<?php echo $_SESSION['token'] ?>">Terms &
                            Conditions</a>
                    </li>
            </ul>
            <button class="btn btn-outline-warning my-2 my-sm-0" onclick="location.href = 'whatsNew.php?token=<?php echo $_SESSION['token']; ?>'" type=" button">What's New?</button>
        </div>
    </nav>

    <br><br><br>
    <div class="container">
        <h6 id="MadeBy" class="card-subtitle mb-2 text-muted">-Made by Mr Metal</h6>
        <br>

        <div class="facebook">
            <svg id="faceBookIcon" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" class="svg-inline--fa fa-facebook fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z">
                </path>
            </svg>
            <a href="https://www.facebook.com/henil.malaviya.7" id="facebook-link">Facebook</a>
        </div>
        <div class="gmail">
            <i class="fas fa-envelope" id="gmailLogo"></i>
            <a href="#" class="gmail-text" id="gmail-text">henilmalaviya06@gmail.com</a>
        </div>

        <br><br>
        <hr style="height: 1px; background-color: rgba(0,0,0,0.6);">

        <center>
            <h6 class="card-subtitle mb-2 text-muted my-2">Thanks For Visiting Us.</h6>
            <h6 class="card-subtitle mb-2 text-muted my-2">Supported For UI By <a href="https://getbootstrap.com/">getbootstrap.com</a></h6>
            <h6 class="card-subtitle mb-2 text-muted my-2">Supported For Json Files By <a href="https://newsapi.org/">newsapi.org</a></h6>
        </center>
        <br>
        <div class="feedbackResponseDiv" id="feedbackResponseDiv"></div>


    </div>




    <!-- Script -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>