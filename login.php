<!DOCTYPE html>
<html>

<head>
    <title>Project</title>

    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="login.css">

</head>

<body>
    <?php include ("header.php"); ?>

    

    <div class="login">

        <?php
            if (isset($_GET['error']))
            {
                if ($_GET['error']=="invalid_details") { ?>
                <div class="alert alert-warning alert-dismissible fade in warning">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning!</strong> Incorrect login details
                </div>
            <?php }
                if ($_GET['error']=="autherror") { ?>
                    <div class="alert alert-warning alert-dismissible fade in warning">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Warning!</strong> Access is restricted
                    </div>
            <?php } 
            } ?>

        <?php
            if (isset($_GET['register']))
            if ($_GET['register']=="success") { ?>
            <div class="alert alert-success alert-dismissible fade in warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Registration Success!</strong> Please login
            </div> 
        <?php } ?>

        <p class="text">Login</p>
        <form method="post" action="auth.php">
            <div class="input"><input type="text" name="username" placeholder="Username" required></div>
            <div class="input"><input type="password" name="password" placeholder="Password" required></div>
            <div class="submit"><input type="submit" name="login" value="Login"></div>
        </form>
    </div>



</body>

</html>