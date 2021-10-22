<?php
session_start();
// include 'script.php';
include 'connection.php';

$errors = array();

// ! Sign Up!
if (isset($_POST['submitForm'])) {

    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $email = mysqli_real_escape_string($db, $_POST['userEmail']);
    $userPass = mysqli_real_escape_string($db, $_POST['userPass']);
    $confPass = mysqli_real_escape_string($db, $_POST['confPass']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $userType = mysqli_real_escape_string($db, $_POST['userType']);

    if (empty($firstName)) {array_push($errors, "First Name is required");}
    if (empty($lastName)) {array_push($errors, "Last Name is required");}
    if (empty($email)) {array_push($errors, "empty");} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {array_push($errors, "Not a Valid Email");}
    ;
    if (empty($userPass)) {array_push($errors, "Input a Password");}
    if (strlen($userPass) < 6) {array_push($errors, "Password must be 6 or more character");
    }

    // =====> Check  Password confirmation
    if ($userPass != $confPass) {
        array_push($errors, "The two passwords do not match");
    }

    if (empty($gender)) {array_push($errors, "Please select your gender");}
    if (empty($userType)) {array_push($errors, "Please select your user type");}

    // ===> Check if the Email exist
    $sql = "SELECT * FROM users WHERE  email ='$email' LIMIT 1 ";

    $result = mysqli_query($db, $sql);

    $email_result = mysqli_fetch_assoc($result);

    if ($email_result) {
        if ($email_result['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Insert a new user to Database
    if (count($errors) == 0) {
        $hash_user_password = password_hash($userPass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (first_name, last_name, email, pass, user_type, gender) VALUES ('$firstName' , '$lastName' , '$email' , '$hash_user_password', '$userType', '$gender' )";

        mysqli_query($db, $sql);

        $_SESSION['name'] = $firstName . " " . $lastName;
        $_SESSION['success'] = "You are now registered";
        $message = "Registration  Successful";
        $msg_type = "success";

        header('location: reg.php?message=' . $message . "&msg_type=" . $msg_type);

    }

    include 'errors.php';

}

// ! Sign In!
if (isset($_POST['sign-in'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    if (empty($email)) {
        array_push($errors, "empty");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Not a Valid Email");
    }
    if (empty($password)) {array_push($errors, "Password is required");}
    $sql = "SELECT * FROM users WHERE email = '$email'; ";
    $results = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($results);
    $verify = password_verify($password, $data['pass']);
    if (!$verify) {array_push($errors, "Incorrect Password");}
    if (count($errors) == 0) {
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['full_name'] = $data['first_name'] . " " . $data['last_name'];
            $_SESSION['userType'] = $data['user_type'];
            if ($data['user_type'] === 'admin') {
                header('location: adminPage.php');
            } else {
                header("Location: index.php");
            }
        } else {
            array_push($errors, 'User Not Found');
        }
    }
    include 'errors.php';

}

// ! Log out!
if ($_POST['logOut']) {
    session_start();
    session_unset();
    session_destroy();
}

if (isset($_POST['img_id'])) {
    $id = $_POST['img_id'];
    $sql = "DELETE FROM images WHERE img_id = '$id';";
    $select_query = mysqli_query($db, $sql) or die;
}

if (isset($_POST['img_comment_id'])) {
    $text_area_comment = $_POST['comment_text'];
    $img_comment_id = $_POST['img_comment_id'];
    $email = $_SESSION['email'];
    echo $text_area_comment;
    $sql = "INSERT INTO comments (img_comment_id, comment_text, email) VALUES ('$img_comment_id','$text_area_comment','$email');";
    $select_query = mysqli_query($db, $sql) or die;
}

if (isset($_POST['delete_all_comments'])) {
    $id = $_POST['delete_all_comments'];
    $sql = "DELETE FROM comments WHERE img_comment_id = '$id';";
    $select_query = mysqli_query($db, $sql) or die;
}
