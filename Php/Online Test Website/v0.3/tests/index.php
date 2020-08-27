<?php
session_start();

?>

<!doctype html>
<html lang="en">

<head>

    <?php require '../links/head.html'; ?>

    <title>Online Test Website</title>
</head>

<body>

    <?php require '../common/navbar.html'; ?>


    <section class="text-gray-700 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                <?php
                require '../db/db.php';
                require '../db/db_connect.php';

                $token = $_SESSION['token'];

                $sql = "SELECT * FROM `tests`";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $test_id = $row['test_id'];
                        $cat = $row['cat'];
                        $title = $row['title'];
                        $desc = $row['desc'];

                        if ($_SESSION['logintrace'] == True) {
                            echo '
                            <div class="p-4 lg:w-1/3">
                                <div class="h-full bg-gray-200 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1">' . $cat . '</h2>
                                    <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">' . $title . '</h1>
                                    <p class="leading-relaxed mb-3">' . $desc . '</p>
                                    <a href="testpage.php?test_id=' . $test_id . '" class="text-indigo-500 inline-flex items-center">Give Test
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        ';
                        } else {
                            echo '
                            <div class="p-4 lg:w-1/3">
                                <div class="h-full bg-gray-200 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1">' . $cat . '</h2>
                                    <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">' . $title . '</h1>
                                    <p class="leading-relaxed mb-3">' . $desc . '</p>
                                    <p class="text-center my-5 tracking-widest title-font font-medium text-red-500 mb-1">Login To Give The Test</p>
                                </div>
                            </div>
                        ';
                        }
                    }
                } else {
                    echo '<h2 class="text-center my-5 tracking-widest title-font font-medium text-gray-500 mb-1">No Tests Found</h2>';
                }

                ?>
            </div>
        </div>
    </section>


    <?php require '../links/footer.html'; ?>
</body>

</html>