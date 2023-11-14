<?php

include('database/db_helper.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];
    $query = "DELETE FROM `tasks` WHERE task_id = $id";

    if (mysqli_query($conn, $query)) {
        echo "Item deleted successfully.";
    } else {
        echo "Something went wrong, try again or contact Support if issue persists.";
    }

    mysqli_close($conn);

    header("Location: index.php");
} elseif (!isset($_GET['id'])) {
    echo "ID not provided";
} else {
    echo "Invalid ID";
}
