<?php
include 'connection.php';
$id = $_POST['id'];
$sql = "UPDATE tasks SET status = 0 WHERE id = $id";
if ($conn->query($sql)) {
  header('Location:index.php');
}
 ?>
