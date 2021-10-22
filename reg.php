<?php
session_start();
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Now!</title>
    <?php include './partials/head.php'?>
</head>

<body>

  <?php if ($_GET): ?>
    <div class="alert alert-<?php echo $_GET['msg_type'] ?>" style="z-index: 99;">
        <?php echo $_GET['message'] ?>
    </div>
    <?php endif?>

<?php

?>
<div class="bg-image"></div>
  <main class="reg-main ">
    <div class="reg-container shadow bg-body " >
      <h2 class="reg-title">Registration</h2>

    <?php include './errors.php'?>
        <form action="reg.php" method="post" class="registrationForm">
          <div class="name_field dis-f-r" >
            <div style="width: 48%;">
              <label for="firstName">First Name</label>
              <input class="form-control" type="text" name="firstName" value="<?php echo $firstName ?>">
              <?php echo "<p class='err_p'>$err_first_name</p>" ?>
            </div>
            <div style="width: 48%;">
              <label for="lastName">Last Name</label>
              <input class="form-control" type="text" name="lastName" value="<?php echo $lastName ?>">
              <?php echo "<p class='err_p'>$err_last_name</p>" ?>
            </div>
          </div>

          <div class="email_field">
            <label for="userEmail">Email</label>
            <input class="form-control" type="text" name="userEmail" value="<?php echo $userEmail ?>">
            <?php echo "<p class='err_p'>$err_email</p>" ?>
          </div>

          <div class="pass_gender_type_container dis-f-r ">
            <div class="password_field" style="width: 55%;">
              <div >
                <label for="userPass">Password</label>
                <input class="form-control" type="Password" name="userPass" value="<?php echo $userPass ?>">
                <?php echo "<p class='err_p'>$err_password</p>" ?>
              </div>

              <div >
                <label for="confPass">Confirm your password</label>
                <input class="form-control" type="Password" name="confPass">
                <?php echo "<p class='err_p'>$err_conf_pass </p>" ?>

              </div>
            </div>
            <div class="gender_usrType_field" style="width: 40%;">
              <div class="genderContainer">
                <p>Select your gender</p>
                <select name="gender" class="form-control">
                  <option value="" selected>Select Gender</option>
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select>
                <?php echo "<p class='err_p'>$err_gender</p>" ?>
              </div>

              <div class="userTypeContainer">
                <p>Select your user type</p>
                <select name="userType" class="form-control">
                  <option value="">Select User Type</option>
                  <option value="admin">Admin</option>
                  <option value="user">User</option>
                </select>
                <?php echo "<p class='err_p'>$err_user_type</p>" ?>
              </div>
            </div>
          </div>
          <div class="reg_signIn_btns dis-f-r">
            <input class="btn btn-outline-primary" type="submit" value="Sign up" name="submitForm" >
            <a class="btn btn-outline-success" href="login.php">Sign in</a>
          </div>
        </form>
    </div>
  </main>
  <?php include './partials/scripts.php'?>
</body>
</html>
