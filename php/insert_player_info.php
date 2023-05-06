<?php
    header('Access-Control-Allow-Origin: *');
    include_once("core.php");
    $conection = mysqli_connect('localhost', 'root', '','educ_gamific');

    if ($conection->connect_error) {
        die("Connection failed: " . $conection->connect_error);
    }

    $column = $_GET['column'];
    $value = $_GET['value'];
    if($column == 'job_id' || $column == 'salary_id' || $column == 'salary' || $column == 'level' || $column == 'money'){
        $newValue = (int)$value;
        echo "<script>console.log('Debug Objects int: " . $newValue . "' );</script>";
    }else{
        $newValue = (string)$value;
        echo "<script>console.log('Debug Objects string: " . $newValue . "' );</script>";
    }
    
    $sql = "UPDATE `player` SET $column='[$newValue]' WHERE 1";
    $result = $conection->query($sql);

    $conection->close();

?>