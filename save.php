<?php
include 'connection.php';
$task_input = $_POST['task_input'];

$sql ="insert into tasks (task_body) values('$task_input')";
if($conn->query($sql)){
  header('Location:index.php');

}
else {
echo "couldn't add ".$task_input;
}
 ?>
