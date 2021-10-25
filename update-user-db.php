<?php
include 'connection.php';
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_Name = $_POST['last_Name'];
$email = $_POST['email'];
$user_type = $_POST['user_type'];
$user_gender = $_POST['user_gender'];

$sql = "UPDATE users
    SET
        first_name = '$first_name',
        last_name = '$last_Name',
        email = '$email',
        user_type = '$user_type',
        gender = '$user_gender'
    WHERE
        id = '$id';";

$results = mysqli_query($db, $sql) or die($mysqli->error);
