<?php
session_start();
$user_email = $_SESSION['email'];
include 'connection.php';
if (isset($_POST['upload_img'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];

    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 50000000) {
                // To prevent repeats  name
                // $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                if (file_exists("uploads/$user_email")) {
                    $fileDestination = "uploads/$user_email/" . $fileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    mkdir("uploads/$user_email");
                    move_uploaded_file($fileTmpName, $fileDestination);
                }
                $sql = "INSERT INTO
                            images (img_name, user_email)
                        VALUES
                            ('$fileName', '$user_email');";
                mysqli_query($db, $sql);

                header("location:index.php");

            } else {
                echo "Yor file is too BIG!!";
            }
        } else {
            echo "There was an error uploading your files!!";
        }

    } else {
        echo "You cannot upload files of this type";
    }
}
