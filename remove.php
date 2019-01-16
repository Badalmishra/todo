<?php
include 'connection.php';
$id = $_POST["id"];
$sql = "DELETE FROM tasks WHERE id = $id";
$conn->query($sql);
header('Location:index.php');
 ?>
