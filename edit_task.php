<?php

include('database/db_helper.php');

session_start();


if (!isset($_SESSION["SUCC_MSG"])) {

    header("Location: login.php");
}



if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];
    $query = "SELECT * FROM `tasks` WHERE task_id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result) ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <link rel="stylesheet" href="static/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
            <link rel="stylesheet" href="static/style.css">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Task</title>
        </head>

        <body>
            <div class="container p-2 w-50 mt-5">
                <h1 class="animate__animated animate__tada text-center mb-5">TODO App</h1>
                <form action="edit.php" method="post">
                    <div class="d-flex gap-2">
                        <input value="<?php echo $row["task_name"] ?>" class="form-control" name="task_name" id="task_name" type="text">
                        <input type="hidden" name="id" value="<?php echo $row["task_id"] ?>">
                        <button class="btn btn-primary text-nowrap" type="submit">Edit Item</button>
                    </div>
                </form>
            </div>

            <script src="static/bootstrap.bundle.min.js"></script>
        </body>

        </html>




<?php
    } else {
        echo "No results";
    }

    mysqli_close($conn);
}
?>