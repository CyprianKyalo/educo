<?php 
    session_start();

    if (!isset($_SESSION['email'])){
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    if (isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Test Auth</title>
        <link rel="stylesheet" href="static/css/style.css">
    </head>

    <body>
        <div class="header">
            <h2>Auth Works!</h2>
        </div>

        <div class="content">

            <?php if(isset($_SESSION['success'])) :?>
                <div class="error success">
                    <h3>
                        <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </h3>                
                </div>
            <?php endif ?>

            <?php if(isset($_SESSION['email'])) : ?>
                <p>
                    Welcome, <?php echo $_SESSION['email'];?>
                </p>
                <p>
                    <a href="auth_test?logout='1" style="color:red;">
                        Logout
                    </a>
                </p>
            <?php endif ?>
        </div>
    </body>
</html>