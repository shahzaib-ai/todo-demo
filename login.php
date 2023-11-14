<?php

include('database/db_helper.php');


session_start();


if (isset($_SESSION["SUCC_MSG"])) {

    header("Location: index.php");
}

if (isset($_POST["username"]) && isset($_POST["password"])) {

    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);


    $stmt = mysqli_prepare($conn, "SELECT `password` FROM `users` WHERE username=?");

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {

            $_SESSION["SUCC_MSG"] = "Logged In";

            header("Location: index.php");
        } else {


            echo "Login failed";
        }
    } else {
        echo "Invalid username";
    }

    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="static/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="static/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="animate__animated animate__backInDown container p-2 w-25 mt-5">
        <h1 class="text-center mb-5">Login</h1>
        <form method="post">

            <label for="username">Username</label>
            <input class="form-control" name="username" id="username" type="text"><br>

            <label for="username">Password</label>
            <input class="form-control" name="password" id="password" type="password"><br>

            <button class="btn btn-primary text-nowrap" type="submit">Login</button>
        </form>

        <br>
    </div>


    <script src="static/bootstrap.bundle.min.js"></script>
</body>

</html>