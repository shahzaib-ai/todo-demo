<?php

include('database/tasks.php');



add_tasks(htmlspecialchars($_POST['task_name']));

// echo $_POST['task_name'];

header("Location: index.php");
