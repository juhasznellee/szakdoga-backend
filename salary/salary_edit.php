<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\editor.css">
    <title>Fizetések szerkesztése</title>
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
        <div id='newSalary'>
            <form name="newItem" method="post" action="salary_insert.php">
                <input class="salary_input" type="number" autocomplete="off" name="numSalary" placeholder="Fizetés összege" id="numSalary">
                &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;     <!-- SPACE INSERT -->
                <input class="salary_input" type="number" autocomplete="off" placeholder="Fizetési szint" name="salaryLevel" id="salaryLevel">
                &nbsp; &nbsp;
                <button type="submit" class='customIcons'>
                    <img src="..\images/add_icon_f.png" class='add' alt="Add">
                </button>
            </form>
        </div>
        <div id='salaryTable'>
            <table class="salary_table">
                <?php
                    $sql_select = "SELECT `id`, `description`, `level` FROM `salary` ORDER BY `level`";

                    $result = $conection->query($sql_select);
                    if($result->num_rows > 0){
                        echo "<tr><th>Id</th><th>Megnevezés</th><th>Szint</th><th>Törlés</th></tr>";
                        while($row = $result->fetch_assoc()){ ?>
                            <tr class='hoveredTr'>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['level']; ?></td>
                                <td><a href="salary_delete_item.php?id=<?php echo $row['id']; ?>"><img src="..\images/delete_icon.png" class='delete' alt="Delete"></a></td>
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