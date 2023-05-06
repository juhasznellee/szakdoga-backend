<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\editor.css">
    <title>Feladatok szerkesztése</title>
</head>
<body>
    <div class='ticketDesign'>
        <a href="http://localhost:3000/admin" class='backPrevPage'><img src="..\images/back_icon_f.png" alt="Back" class='back'></a>
        <?php
            $conection = mysqli_connect('localhost', 'root', '','educ_gamific');

            if ($conection->connect_error) {
                die("Connection failed: " . $conection->connect_error);
            }
        ?>
        <div id='newTask'>
            <form name="newItem" method="post" action="task_insert.php">
                <input class="task_input" type="text" autocomplete="off" placeholder="Feladat" name="taskName" id="taskName">
                &nbsp;&nbsp;
                <input class="task_input" type="number" autocomplete="off" placeholder="Válasz" name="answerNum" id="answerNum">
                &nbsp;&nbsp;
                <input class="task_input" type="number" autocomplete="off" placeholder="Megoldás" name="solutionNum" id="solutionNum">
                &nbsp;&nbsp;
                <button type="submit" class='customIcons'>
                    <img src="..\images/add_icon_f.png" class='add' alt="Add">
                </button>
            </form>
        </div>
        <div id='taskTable'>
            <table class="task_table">
                <?php
                    $sql_select = "SELECT `id`, `task`, `answer`, `solution` FROM `tasks`";

                    $result = $conection->query($sql_select);
                    if($result->num_rows > 0){
                        echo "<tr><th>Id</th><th>Feladat</th><th>Válasz</th><th>Megoldás</th><th>Szerkesztés</th><th>Törlés</th></tr>";
                        while($row = $result->fetch_assoc()){ ?>
                            <tr class='hoveredTr'>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['task']; ?></td>
                                <td><?php echo $row['answer']; ?></td>
                                <td><?php echo $row['solution']; ?></td>
                                <td><a href="task_update_item.php?id=<?php echo $row['id']; ?>&task=<?php echo $row['task']; ?>&answer=<?php echo $row['answer']; ?>&solution=<?php echo $row['solution']; ?>"><img src="..\images/edit_icon.png" class='edit' alt="Edit"></a></td>
                                <td><a href="task_delete_item.php?id=<?php echo $row['id']; ?>"><img src="..\images/delete_icon.png" class='delete' alt="Delete"></a></td>
                            </tr>
                        <?php }
                        $result->free();
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>