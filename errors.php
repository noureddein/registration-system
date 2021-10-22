<?php

// Reg Values
$err_first_name = '';
$err_last_name = '';
$err_email = '';
$err_password = '';
$err_conf_pass = '';
$err_gender = '';
$err_user_type = '';
$err_user_not_found = '';
if (count($errors) > 0) {
    foreach ($errors as $val) {
        if ($val == "First Name is required") {
            $err_first_name = "First Name is required";
        }

        if ($val == "Last Name is required") {
            $err_last_name = "Last Name is required";
        }
        if ($val == "Email already exists") {
            $err_email = "Email already exists";
        }

        if ($val == "empty") {
            $err_email = "Email is required";
        } elseif ($val == "Not a Valid Email") {
            $err_email = "Not a Valid Email";
        }
        if ($val == "User Not Found") {
            $err_email = 'User Not Found';

        }

        if ($val == "Input a Password" || $val == "Password must be 6 or more character") {
            $err_password = "Input a Password";
            $err_password .= "<br/>" . "Password must be 6 or more character";
        } elseif ($val == "Password is required") {
            $err_password = "Password is required";
        }

        if ($val == "The two passwords do not match") {
            $err_conf_pass = "The two passwords do not match";
        }
        if ($val == "Please select your gender") {
            $err_gender = "Please select your gender";
        }
        if ($val == "Please select your user type") {
            $err_user_type = "Please select your user type";
        }

    }

}

/*
"Email already exists"

 */
