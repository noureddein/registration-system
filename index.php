<?php
session_start();
include 'server.php';
include 'connection.php';
if (count($_SESSION) == 0) {
    header('location:login.php');
} else {
    ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>User Page</title>
    <?php include './partials/head.php'?>
  </head>
  <body>
    <main class="index_main">
      <!-- ======User Dashboard====== -->
      <section class="dashboard_container dis-f-c">
          <div class="dashboard_details dis-f-c">
            <img src="https://via.placeholder.com/150C/O https://placeholder.com/" alt="user profile photo">
            <div class="user_desc dis-f-c">
              <!-- <p>Email: <?php echo $_SESSION['email'] . "<br/>"; ?></p> -->
              <p>Welcome back</p>
              <p class="full_name"><b> <?php echo $_SESSION['full_name']; ?> </b></p>
              <p class="full_name"><b> <?php echo strtoupper($_SESSION['userType']); ?> </b></p>
            </div>
            <form action="login.php" method="POST" class="">
              <input class="btn btn-dark log_out_form" type="submit" name="logOut" value="Logout">
            </form>
            <div class="user_options dis-f-c">
              <button class="btn btn-light"><i class="fas fa-house-user"></i> Dashboard</button>
              <button class="btn btn-light"><i class="fas fa-camera"></i> Photos</button>
            </div>
          </div>
        </section>

      <!-- Upload Images -->
          <section class="imgs_section">
             <div class="menu-wrap">
          <input type="checkbox" class="toggler" id="check_box" value="true" onclick="onclick_button()"  >
          <div class="hamburger">
            <div></div>
          </div>
          </div>
            <form action="upload.php" method="POST" enctype="multipart/form-data" id='upload_form'>
              <div class="upload_form_div_container">
                <input type="file" name="file" class="btn btn-info" required>
                <button type="submit" name="upload_img"  onclick="reload_index()" class="btn btn-info">Upload</button>
              </div>
            </form>
            <div class="imgs_container">
              <div class="uploaded_images"></div>
            </div>
          </section>
    </main>
    <?php include './partials/scripts.php';?>
  </body>
  </html>


<?php
}
