<?php
session_start();
include './connection.php';
$user_id = $_POST['id'];
$sql = "SELECT * FROM users WHERE id= '$user_id';";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));
$data = mysqli_fetch_assoc($result);
echo "
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Modal title</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <p>Edit User information</p>
                        <form id='update_user_info' action='edit.php' method='GET' class='registrationForm'>
                        <label for='firstName'>First Name</label>
                        <input class='form-control' type='text' id='first_name' name='firstName' value='$data[first_name]'>
                        <input class='form-control' type='hidden' name='userId' value='$data[id]'>
                        <label for='lastName'>last Name</label>
                        <input class='form-control' type='text' name='lastName' value='$data[last_name]'>
                        <label for='userEmail'>Email</label>
                        <input class='form-control' type='Email' name='userEmail' value='$data[email]'>

                        <div class='genderContainer'>
                        <p>Select your gender</p>";
if ($data['gender'] == 'male') {
    echo "<input type='radio' name='gender' value='female'> Female
                              <input type='radio' name='gender' value='male' checked> Male
                              </div>";
} else {
    echo "<input type='radio' name='gender' value='female' checked> Female
                              <input type='radio' name='gender' value='male' > Male
                              </div>";
}

echo "<div class='userTypeContainer'>
                       <p>Select your user type</p>";

if ($data['user_type'] == 'admin') {
    echo " <input type='radio' name='userType' value='admin' checked> Admin
                           <input type='radio' name='userType' value='user'> User ";

} else {
    echo "
                            <input type='radio' name='userType' value='admin'> Admin
                            <input type='radio' name='userType' value='user' checked> User";
}
echo "</div>
                    </form>
                    </div>
                    <div class='modal-footer'>
                        <button type='submit' name= 'updateUser' onclick='updateData()' class='btn btn-primary' data-dismiss='modal'>Save changes</button>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    </div>
                </div>
";
