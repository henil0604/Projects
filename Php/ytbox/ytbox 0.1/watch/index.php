<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php require '../links/header.html'; ?>
    <link rel="stylesheet" href="../css/index.css" />
    <link href="https://vjs.zencdn.net/7.8.3/video-js.css" rel="stylesheet" />

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <title>YT bOx</title>
</head>

<body>
    <?php require '../partials/_navbar.php'; ?>
    <?php $v = $_GET['v'] ?>


    <video id="" class="video-js" controls preload="auto" width="800" height="500" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
        <source src="../Videos/<?php echo $v; ?>.mp4" type="video/mp4" />
        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
    </video>





    <?php require '../links/footer.html'; ?>

    <script src="https://vjs.zencdn.net/7.8.3/video.js"></script>
</body>

</html>