<?php
    $conection = mysqli_connect('localhost', 'root', '','educ_gamific');

    if ($conection->connect_error) {
        die("Connection failed: " . $conection->connect_error);
    }

    $numSalary = '';
    $salaryLevel = '';
    
    if ($_POST){
        $numSalary = $_POST['numSalary'];
        $salaryLevel = $_POST['salaryLevel'];

        $sql_insert = "INSERT INTO `salary` (`id`, `description`, `level`) VALUES ('0', '$numSalary', '$salaryLevel')";

        $rs = mysqli_query($conection, $sql_insert);

        $conection->close();
    }
    header('Location: salary_edit.php');
?>