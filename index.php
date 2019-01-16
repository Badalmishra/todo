<?php
include 'connection.php';
$sql = "select * from tasks order by id desc";
$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Best Todo App</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="app-container">

    <div class="title">
      <h1>Todo App</h1>
    </div>

    <form class="" action="save.php" method="post" autocomplete="off">
      <input type="text" name="task_input" placeholder="Enter task here">
      <input type="submit" name="" value="" hidden="true">
    </form>

    <div class="todoHolder">

      <table width="100%">

        <?php
        if ($result->num_rows >0) {
          while ($row = $result->fetch_assoc()) {
            $display ="";
            $form_display = "" ;
            if (!$row["status"]) {
              $display = "disabled";
              $form_display = "hideForm";
            }
            ?>
            <tr class="<?php echo $display; ?>">
              <td>
                <p><?php echo $row["task_body"]; ?></p>
              </td>
              <td class="formButton <?php echo $form_display; ?>">
                <form class="" action="<?php echo $row['status']?'done.php':'#'; ?>" method="post">

                  <input type="text" name="id" value="<?php echo $row["id"];?>" hidden>
                  <button type="submit"  name="">&#10004;</button>
                </form>
              </td>
              <td class="formButton">
                <form class="" action="remove.php" method="post">
                  <input type="text" name="id" value="<?php echo $row["id"];?>" hidden>
                  <button type="submit" class="remButton" name="">&#10060;</button>
                </form>
              </td>
            </tr>
          <?php }}
          else{?>
            <tr>
              <td>
                <p>
                  Nothing to Show, please insert some task.
                </p>
              </td>
            </tr>
          <?php } ?>
          
        </table>
      </div>
    </div>
  </body>
  </html>
