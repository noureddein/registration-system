<?php
include '../connection.php';
$id = $_POST['id'];
$sql = "DELETE FROM comments WHERE id= '$id';";
$results = mysqli_query($conn, $sql) or die($mysqli->error);
echo $id;
