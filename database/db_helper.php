<?php


define('DB_HOST', "localhost");
define('DB_USERNAME', "root");
define('DB_PASSWORD', "");
define('DB_NAME', "todo-demo");

try {

    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
