<?php
session_start();
include '../connection.php';
?>

<?php
// get Images from Database
$user_email = $_SESSION['email'];
$sql = "SELECT * FROM images WHERE user_email = '$user_email';";
$select_query = mysqli_query($db, $sql) or die;
$results = mysqli_fetch_all($select_query) or die(mysqli_error($db));

if ($results) {
    foreach ($results as $val) {
        $path = './uploads/' . $user_email . "/" . $val[1];
        echo "<div class='img_and_comment_cont'>";

        echo "<div class='single_img_container'>";
        echo "<img src='$path' alt='$val[1]'>";
        echo "<input type='submit' value='Delete' onclick='deleteImage($val[0])' class='btn btn-danger'>";
        echo "<div class='form-floating'>
                                <textarea id='text_area_comment$val[0]' class='form-control' cols='28' rows='2' style='resize: none; margin-top:15px' required placeholder='Leave a comment...'></textarea> <br>
                                <button class='btn btn-secondary' type='submit' onclick='add_comment($val[0])'>Add a comment</button>
                            </div>";

        echo "</div>";

        // Comments Section
        echo "<div class='comment_section shadow p-1 mb-13 bg-body rounded'>";
        $user_email = $_SESSION['email'];
        // $img_comment_id = $_POST['id'];
        $sql = "SELECT *  FROM comments WHERE email = '$user_email' AND img_comment_id = $val[0];";
        $select_query = mysqli_query($db, $sql);
        $results = mysqli_fetch_all($select_query);

        echo "<div>";
        foreach ($results as $val) {
            echo "<div class='comment_button_cont'>";
            echo "<p class='shadow-lg p-2 mb-2  bg-body rounded'>$val[2]</p>";
            echo "<button type='submit' onclick='deleteComment($val[0])' class='btn btn-outline-dark'> Delete Comment</button>";
            echo "</div>";

        }
        echo "</div>";

        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p> No images to view</p>";
}
?>
