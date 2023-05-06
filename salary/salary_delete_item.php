<?php
    $conection = mysqli_connect('localhost', 'root', '','educ_gamific');

    if ($conection->connect_error) {
        die("Connection failed: " . $conection->connect_error);
    }

    $id = $_GET['id'];

    $sql_update = "DELETE FROM `salary` WHERE `id`='$id'";
    $result = $conection->query($sql_update);

    if ($result = 1) {
        $conection->close();
        header('Location: salary_edit.php');
    }
    $conection->close();

?>