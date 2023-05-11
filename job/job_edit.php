<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\editor.css">
    <title>Munkák szerkesztése</title>
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
        <div id='newJob'>
            <form name="newItem" method="post" action="job_insert.php">
                <input class="job_input" type="text" autocomplete="off" placeholder="Munka megnevezése" name="txtName" id="txtName">
                &nbsp; &nbsp;   <!-- SPACE INSERT -->
                <input class="job_input" type="number" autocomplete="off" placeholder="Munkához szükséges szint" name="jobLevel" id="jobLevel">
                &nbsp; &nbsp;
                <button type="submit" class='customIcons'>
                    <img src="..\images/add_icon_f.png" class='add' alt="Add">
                </button>
            </form>
        </div>
        <div id='jobTable'>
            <table class="job_table">
                <?php
                    $sql_select = "SELECT `id`, `description`, `level` FROM `jobs` ORDER BY `level`";

                    $result = $conection->query($sql_select);
                    if($result->num_rows > 0){
                        echo "<tr><th>Megnevezés</th><th>Szint</th><th>Törlés</th></tr>";
                        while($row = $result->fetch_assoc()){ ?>
                            <tr class='hoveredTr'>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['level']; ?></td>
                                <td><a href="job_delete_item.php?id=<?php echo $row['id']; ?>"><img src="..\images/delete_icon.png" class='delete' alt="Delete"></a></td>
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