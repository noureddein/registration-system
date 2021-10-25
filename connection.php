<?php

$serverName = 'localhost';
$dbname = 'regForm';
$dbUser = 'root';
$dbPass = 'root';

$db = mysqli_connect($serverName, $dbUser, $dbPass, $dbname) or die(mysqli_error($db));
