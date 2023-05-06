<?php
    header('Access-Control-Allow-Origin: *');
    include_once("core.php");
    $connect = mysqli_connect('localhost', 'root', '','educ_gamific');

    $sql_select = "SELECT * FROM salary";
    $result = mysqli_query($connect, $sql_select);
    $json_array = array();
    while($row = mysqli_fetch_assoc($result)){
        $json_array[]=$row;
    }
    echo json_encode($json_array);
?>