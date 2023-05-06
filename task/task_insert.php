<?php
    $conection = mysqli_connect('localhost', 'root', '','educ_gamific');

    if ($conection->connect_error) {
        die("Connection failed: " . $conection->connect_error);
    }

    $taskName = '';
    $answerNum = '';
    $solutionNum = '';
    
    if ($_POST){
        $taskName = $_POST['taskName'];
        $answerNum = $_POST['answerNum'];
        $solutionNum = $_POST['solutionNum'];

        $sql_insert = "INSERT INTO `tasks` (`id`, `task`, `answer`, `solution`) VALUES ('0', '$taskName', '$answerNum', '$solutionNum')";

        $rs = mysqli_query($conection, $sql_insert);

        $conection->close();
    }
    header('Location: task_edit.php');
?>