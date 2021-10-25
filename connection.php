<?php

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = true;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

// LOcal Database
$serverName = 'localhost';
$dbname = 'regForm';
$dbUser = 'root';
$dbPass = 'root';

$db = mysqli_connect($serverName, $dbUser, $dbPass, $dbname) or die(mysqli_error($db));
