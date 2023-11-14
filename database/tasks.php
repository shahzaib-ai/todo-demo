<?php

include('database/db_helper.php');


function get_tasks()
{
    global $conn;

    $query = "SELECT * FROM `tasks`";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) { ?>


            <li class="animate__animated animate__lightSpeedInLeft mt-2 border border-primary-subtle p-2 rounded-4 d-flex justify-content-between align-content-center">
                <p class="mx-2 mb-0 align-self-center fs-5"> <?php echo $row["task_name"] ?> </p>
                <div>
                    <a class="text-decoration-none rounded-pill p-2 btn btn-sm btn-outline-danger" href="delete.php?id=<?php echo $row["task_id"] ?>">Delete</a>
                    <a class="text-decoration-none rounded-pill p-2 btn btn-sm btn-outline-primary" href="edit_task.php?id=<?php echo $row["task_id"] ?>">Edit</a>
                </div>
            </li>


<?php }
    } else {
        echo "No results";
    }

    mysqli_close($conn);
}

function add_tasks($task)
{
    global $conn;


    $stmt = mysqli_prepare($conn, "INSERT INTO `tasks`(`task_name`) VALUES (?)");
    mysqli_stmt_bind_param($stmt, "s", $task);

    if (mysqli_stmt_execute($stmt)) {
        echo "Item added Successfully.";
    } else {
        echo "Something went wrong, try again or contact Support if issue persists.";
    }

    mysqli_close($conn);
}
?>