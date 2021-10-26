<?php
session_start();
include 'server.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Log in!</title>
        <?php include './partials/head.php'?>
    </head>
<body>

<div class="bg-image"></div>

    <main class='sign_in-main'>

        <form method="POST" action="login.php" class="sign-in">
            <div class="header">
                <h2>Login</h2>
            </div>

            <div class="log_in_fields">
                <div >
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter Your Email.." >
                    <?php echo "<p class='err_p'>$err_email </p>" ?>
                </div>

                <div >
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Your Password.." >
                    <?php echo "<p class='err_p'>$err_password  </p>"; ?>
                </div>

            </div>
            <div class="reg_signIn_btns dis-f-c" style="margin-top: 1rem;">
                <button type="submit" class="btn btn-outline-success" name="sign-in">Login</button>
                <p>Not yet a member? <a href="reg.php" class="signUp-link">Sign up</a></p>
            </div>
        </form>


	</main>
<?php include './partials/scripts.php'?>

</body>
</html>