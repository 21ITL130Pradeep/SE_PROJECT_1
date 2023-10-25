<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="16x16" href="images/lg.png">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel="stylesheet" href="css/login.css">

    <style type="text/css">
        #buttn {
            color: #fff;
            background-color: #ff3300;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $message = "";

    if (isset($_POST['submit'])) {
        include("connection/connect.php"); // Include the database connection

        $user_id = mysqli_real_escape_string($db, $_POST['user_id']); // Sanitize user input
        $password = $_POST['password'];

        $loginquery = "SELECT * FROM users WHERE u_id='$user_id' AND password='$password'";
        $result = mysqli_query($db, $loginquery);

        if ($result && mysqli_num_rows($result) > 0) {
            // Match found
            $_SESSION["user_id"] = $user_id;
            header("Location: home.php");
            exit();
        } else {
            $message = "Invalid User ID or Password!";
        }

        mysqli_close($db);
    }
    ?>

    <div class="pen-title">
        <h1>Login Page</h1>
    </div>

    <div class="module form-module">
        <div class="toggle"></div>
        <div class="form">
            <h2>Login to your account</h2>
            <span style="color:red;"><?php echo $message; ?></span>
            <form action="" method="post">
                <input type="text" placeholder="User ID" name="user_id" />
                <input type="password" placeholder="Password" name="password" />
                <input type="submit" id="buttn" name="submit" value="Login" />
            </form>
        </div>

        <div class="cta">Not registered? <a href="registration.php" style="color:#f30;">Create an account</a></div>
    </div>

</body>

</html>
