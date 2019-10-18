<?php 
session_start(); 

if (isset($_SESSION['userid']))
{
    include("database.php");

    $userid = $_SESSION['userid'];
    $qry = "SELECT * FROM `users` WHERE userid='$userid'";
    $users = mysqli_query ($db, $qry);
    $userdata = mysqli_fetch_assoc($users);
}
if (isset($_GET['update']))
{
    $userid = mysqli_escape_string($db,$_GET['userid']);
    $username = mysqli_escape_string($db,$_GET['username']);
    $name = mysqli_escape_string($db,$_GET['name']);
    $email = mysqli_escape_string($db,$_GET['email']);
    $phone = mysqli_escape_string($db,$_GET['phone']);

    $qry = "UPDATE `users` SET name='$name', email='$email', phone_no='$phone' WHERE userid = '$userid'";
    mysqli_query($db, $qry);
}

?>

<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="js/jquery.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<script src="js/bootstrap.js"></script>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
            <a class="navbar-brand" href="index.php">TPM Solutions</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active navclick"><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="navclick"><a href="#">Training</a></li>
                        <li class="navclick"><a href="#">Certification</a></li>
                        <li class="navclick"><a href="#">Projects</a></li>
                    </ul>
                </li>
                <li class="navclick"><a href="student.php">Student</a></li>
                <li class="navclick"><a href="manager.php">Manager</a></li>
                <li class="navclick"><a href="admin.php">Admin</a></li>
                <li class="navclick"><a href="contactus.php">Contact us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['userid']))
                { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $userdata['name']; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="navclick"><a href="#" data-toggle="modal" data-target="#myModal<?php echo $userdata['userid']; ?>">Profile</a></li>
                            <li class="navclick"><a href="#">Extras</a></li>
                            <li class="navclick"><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php }
                else
                { ?>
                <li class="navclick"><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li class="navclick"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<!-- modal -->
<div class="modal" id="myModal<?php echo $userdata['userid']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center;">Edit User</h4>
        <button type="button" class="close" data-dismiss="modal" style="margin-top: -25px; opacity: 1;">&times;</button>
      </div>

      <div class="modal-body">
        <form>
          <div class="container">
            <div class="row">
                <div class="col-sm-6 input">
                   <div class="col-sm-5">Userid : </div>
                   <div class="col-sm-7"><input type="text" name="userid" value="<?php echo $userdata['userid']; ?>" readonly></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 input">
                   <div class="col-sm-5">Username : </div>
                   <div class="col-sm-7"><input type="text" name="username" value="<?php echo $userdata['username']; ?>" readonly></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 input">
                   <div class="col-sm-5">Name : </div>
                   <div class="col-sm-7"><input type="text" name="name" value="<?php echo $userdata['name']; ?>"></div>
                </div>  
            </div>
            <div class="row">
                <div class="col-sm-6 input">
                   <div class="col-sm-5">Email : </div>
                   <div class="col-sm-7"><input type="email" name="email" value="<?php echo $userdata['email']; ?>"></div>
                </div>  
            </div>
            <div class="row">
                <div class="col-sm-6 input">
                   <div class="col-sm-5">Phone no : </div>
                   <div class="col-sm-7"><input type="number" name="phone" value="<?php echo $userdata['phone_no']; ?>"></div>
                </div>  
            </div>
            <div class="row">
                <div class="col-sm-6 input" style="margin-top: 30px;">
                   <div class="col-sm-3"></div>
                   <div class="col-sm-3"><input class="btn btn-primary" type="submit" name="update" value="Update"></div>
                </div>  
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>