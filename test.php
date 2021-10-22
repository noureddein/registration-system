<?php

$pass = "test12345";

$hashing_pass = password_hash($pass, PASSWORD_DEFAULT);
echo $hashing_pass . '<br/>';
echo !true;
