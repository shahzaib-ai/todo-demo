<?php

include('database/db_helper.php');


$id = $_POST["id"];
$task_name = htmlspecialchars($_POST["task_name"]);


$stmt = mysqli_prepare($conn, "UPDATE `tasks` SET `task_name`=? WHERE task_id=?");
mysqli_stmt_bind_param($stmt, "si", $task_name, $id);

if (mysqli_stmt_execute($stmt)) {
    echo "Item edited successfully.";
} else {
    echo "Something went wrong.";
}

mysqli_close($conn);

header("Location: index.php");
