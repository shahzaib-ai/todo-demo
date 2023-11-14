<?php

session_start();

include('database/tasks.php');

if (!isset($_SESSION["SUCC_MSG"])) {

    header("Location: login.php");
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
    <title>TO DO App</title>
</head>

<body>
    <div class="container p-2 w-50 mt-5">
        <div class="animate__animated animate__flipInX d-flex justify-content-center mb-3"><a class="btn btn-danger" href="logout.php">Logout</a></div>
        <h1 class="animate__animated animate__rubberBand text-center mb-5">TODO App</h1>
        <form action="handle_form.php" method="post">
            <div class="d-flex gap-2">
                <input class="form-control" name="task_name" id="task_name" type="text" required>
                <button class="btn btn-primary text-nowrap" type="submit">Add Item</button>
            </div>
        </form>
        <div class="container mt-5">
            <ol class="list-unstyled">
                <?php get_tasks() ?>
            </ol>
        </div>
    </div>


    <script src="static/bootstrap.bundle.min.js"></script>
</body>

</html>