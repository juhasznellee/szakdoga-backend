<?php
    $conection = mysqli_connect('localhost', 'root', '','educ_gamific');

    if ($conection->connect_error) {
        die("Connection failed: " . $conection->connect_error);
    }

    $id = $_GET['id'];

    $sql_delete = "DELETE FROM `tasks` WHERE `id`='$id'";
    $result = $conection->query($sql_delete);

    if ($result = 1) {
        $conection->close();
        header('Location: task_edit.php');
    }
    $conection->close();

?>