<?php
session_start();
// include 'server.php';

echo "<pre>";
print_r(count($_SESSION));
echo "</pre>";
if (strtolower($_SESSION['userType']) == strtolower('admin')) {
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Page</title>
        <?php include './partials/head.php'?>
    </head>
<body>
    <main class="admin_page_main">

<div class="sections_container dis-f-r">
            <div class="menu-wrap">
                <input type="checkbox" class="toggler" id="check_box" value="true" onclick="onclick_button()"  >
                <div class="hamburger">
                    <div></div>
                </div>
        </div>
    <section class="dashboard_container dis-f-c" id="dashboard_details_admin">
        <div class="dashboard_details dis-f-c" >
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
    <section class="table_container">
        <div >
            <div id="dialog_box" class="modal" tabindex="-1" role="dialog">
                <div class='modal-dialog' role='document' id="dialog_container">
                    </div>
                </div>
                <div>
                    <p class="table_title" > All Users</p>
                    <form class="form-inline" id="search_box" method="POST" action="adminPage.php">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="search_box" class="sr-only">Search</label>
                            <input type="text" class="form-control" id="inputPassword2" name="search_box_input" placeholder="Start searching...">
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">Go >></button>
                    </form>

                        <div class="form-group">
                            <select class="custom-select" id="drop_list_filter" >
                                <option value = "" selected>Choose ...</option>
                                <option value = "male" onselect="drop_list_search()">Male</option>
                                <option value = "female" onclick="drop_list_search()">Female</option>
                            </select>
                        </div>
                    <div id='user_data'></div>
                </div>
            </div>
    </section>
</div>
    </main>
<?php include './partials/scripts.php'?>

</body>
</html>
<?php
} else {
    header('location:login.php');
}
