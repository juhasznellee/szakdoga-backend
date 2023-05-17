<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="..\editor.css">
  <title>Feladat szerkesztő</title>
</head>
<body>
  <?php
    $conection = mysqli_connect('localhost', 'root', '','educ_gamific');

    if ($conection->connect_error) {
        die("Connection failed: " . $conection->connect_error);
    }

    $id = $_GET['id'];
    $task = $_GET['task'];
    $answer = $_GET['answer'];
    $solution = $_GET['solution'];
    

    $sql_select = "SELECT * FROM `tasks` WHERE `id` = $id";

    $result = $conection->query($sql_select);
    ?>
    
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        ?>
          <div class='ticketDesignUpdate' id='task-update'>
            <a href="task_edit.php" class='backPrevPage'><img src="..\images/back_icon_f.png" alt="Back" class='back'></a>
            <form action="" method="POST">
              <label for="taskName">Feladat:</label>&nbsp;&nbsp;
              <input class="task_input_update" type="text" autocomplete="off" placeholder="Feladat" name="taskName" id="taskName" value="<?php echo $row['task']; ?>"><br>
              <label for="answerNum">Válasz:</label>&nbsp;&nbsp;
              <input class="task_input_update" type="number" autocomplete="off" placeholder="Válasz" name="answerNum" id="answerNum" value="<?php echo $row['answer']; ?>"><br>
              <label for="solutionNum">Megoldás:</label>&nbsp;&nbsp;
              <input class="task_input_update" type="number" autocomplete="off" placeholder="Megoldás" name="solutionNum" id="solutionNum" value="<?php echo $row['solution']; ?>"><br>
              <button type="submit" name='update' class='customIcons'>
                <img src="..\images/save_icon_f.png" class='save' alt="Save">
              </button>
            </form>
          </div>
        <?php
      }
    }

    if (isset($_POST['update'])) {
      $task = $_POST['taskName'];
      $answer = $_POST['answerNum'];
      $solution = $_POST['solutionNum'];
      $sql_update = "UPDATE `tasks` SET `task`='$task', `answer`='$answer', `solution`='$solution' WHERE `id`='$id'";
      $result = $conection->query($sql_update);

      if ($result = 1) {
        $conection->close();
        header('Location: task_edit.php');
      }
    }
    $conection->close();
  ?>
</body>
</html>