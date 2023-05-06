<?php
    $conection = mysqli_connect('localhost', 'root', '','educ_gamific');

    if ($conection->connect_error) {
        die("Connection failed: " . $conection->connect_error);
    }

    $txtName = '';
    $jobLevel = '';
    
    if ($_POST){
        $txtName = $_POST['txtName'];
        $jobLevel = $_POST['jobLevel'];

        $sql_insert = "INSERT INTO `jobs` (`id`, `description`, `level`) VALUES ('0', '$txtName', '$jobLevel')";

        $rs = mysqli_query($conection, $sql_insert);

        $conection->close();
    }
    header('Location: job_edit.php');
?>