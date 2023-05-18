<?php
    header('Access-Control-Allow-Origin: *');
    include_once("core.php");
    $conection = mysqli_connect('localhost', 'root', '','educ_gamific');

    if ($conection->connect_error) {
        die("Connection failed: " . $conection->connect_error);
    }

    $player = $_GET['player'];
    $name = $_GET['name'];

    $sql_delete = "DELETE FROM `player`";
    $result = $conection->query($sql_delete);
    $sql_insert = "INSERT INTO `player` (`name`, `gender`, `money`) VALUES ('$name', '$player', 500000)";
    $result = $conection->query($sql_insert);

    $conection->close();
?>