<?php

// Local Database
// $serverName = 'localhost';
// $dbname = 'regForm';
// $dbUser = 'root';
// $dbPass = 'root';

//Remote Connection
$serverName = 'remotemysql.com';
$dbname = 'em8uEEBJj6';
$dbUser = 'em8uEEBJj6';
$dbPass = 'uBOGVOBBY5';

$db = mysqli_connect($serverName, $dbUser, $dbPass, $dbname) or die(mysqli_error($db));
