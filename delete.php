<?php
session_start();
include 'connection.php';

$id = $_POST['id'];
$sql = "DELETE FROM users WHERE id= '$id';";
$results = mysqli_query($conn, $sql) or die($mysqli->error);
$_SESSION['message'] = "Record has been deleted";
$_SESSION['msg_type'] = "danger";
