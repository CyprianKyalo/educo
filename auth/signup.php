<?php if(!isset($_SESSION)) {session_start();}?>
<!DOCTYPE html>
<html>
    <head>
        <title>Onboard</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>

    <body>
        <div class="header">
            <h2>Sign Up</h2>
        </div>

        <form action="server_auth.php" method="POST">
            <div class="input-group">
              <p style="color:brown"><?php if(isset($_SESSION['msg'])) {echo $_SESSION['msg']; unset($_SESSION['msg']);}?></p>

                <label for="f-name">First Name</label>
                <input type="text" name="fname" id="f-name" required placeholder="Enter your first name">
            </div>

            <div class="input-group">
                <label for="l-name">User Name</label>
                <input type="text" name="uname" id="u-name" required placeholder="Enter your last name">
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" required placeholder="Enter your email">
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="pwd" required placeholder="Enter your password">
            </div>

            <div class="input-group">
                <label for="password_conf">Confirm Password</label>
                <input type="password" name="cpwd" required placeholder="Re-enter your password">
            </div>

            <p>
                By signing up, you agree to our <a href="#">TOS and Privacy Policy</a>
            </p>

            <div class="input-group">
                <input type="submit" name="sub" value="Submit" class="btn">
            </div>

            <p>
                Already have an account? <a href="login.php">Sign In</a>
            </p>
        </form>
    </body>
</html>
