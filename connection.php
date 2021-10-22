<?php
// include 'script.php';

$serverName = 'localhost'; //data source name
$dbname = 'regForm';
$dbUser = 'root';
$dbPass = 'root';

$db = mysqli_connect($serverName, $dbUser, $dbPass, $dbname) or die(mysqli_error($db));
