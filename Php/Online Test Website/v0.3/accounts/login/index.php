<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require '../../links/head.html'; ?>
</head>

<body>

    <?php
    session_start();

    if (isset($_POST['submit'])) {
        require '../../db/db.php';
        require '../../db/db_connect.php';
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search = " select * from emaillogin where email='$email' and status='active' ";
        $query = mysqli_query($con, $email_search);

        $email_count = mysqli_num_rows($query);

        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);

            $db_pass = $email_pass['password'];
            $db_user = $email_pass['Username'];
            $db_token = $email_pass['token'];
            $db_mobile = $email_pass['mobile'];
            $db_email = $email_pass['email'];
            $db_status2 = $email_pass['status2'];

            $_SESSION['username'] = $db_user;
            $_SESSION['email'] = $db_email;
            $_SESSION['mobile'] = $db_mobile;
            $_SESSION['token'] = $db_token;
            $_SESSION['status2'] = $db_status2;


            $pass_decode = password_verify($password, $db_pass);

            if ($pass_decode) {
                $_SESSION['logintrace'] = True;
                $updatequery = "UPDATE emaillogin SET `status2`='online' WHERE token='$db_token'";
                $query = mysqli_query($con, $updatequery);
                if ($query) {
                    header("location:../../home/");
                }
            } else {
                $_SESSION['msg'] = "Password Incorect";
            }
        } else {
            $_SESSION['msg'] = "Invalid Email";
        }
    }
    ?>


    <section class="text-gray-700 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
            <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                <h1 class="title-font font-medium text-3xl text-gray-900">Javiya Schooling System</h1>
                <p class="leading-relaxed mt-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque nesciunt veniam odit, consequuntur tenetur officia culpa beatae, sint, officiis provident tempore quibusdam a dolorum natus. Ipsum in sit saepe voluptatibus.</p>
            </div>
            <form action="  " method="POST" class="lg:w-2/6 md:w-1/2 bg-gray-200 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Login</h2>
                <input class="bg-white rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4" placeholder="Email" type="email" name="email">
                <input class="bg-white rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4" placeholder="Password" type="password" name="password">
                <br>
                <input class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" value="Login" name="submit" type="submit">
            </form>
        </div>
    </section>
    <?php require '../../links/footer.html'; ?>
</body>

</html>