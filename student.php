<?php include("header.php");
if ($_SESSION['usertype']=='student') { ?>

<!DOCTYPE html>
<html>
<head>
  <title>TPM SOLUTIONS</title>
</head>
<style>
* 
{
  font-family:Century Gothic;
}
body{
  background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(background.jpg);
  background-size: cover;
}
.main
{

}
.title
{
  text-align: center;
  color: white;
  font-size: 60px;
  margin-top: 200px;
}
.button
{
  text-align: center;
}
.button a
{
  border: 1px solid white;
  color: white;
}
.button a:hover
{
  color: black;
  background-color: white;
}
</style>
</head>
<body>

<div class="main">
  <div class="title">OPT YOUR CHOICE</div>
  <div class="button">
    <a href="enrolledcourses.php"  class='btn'>enrolled courses</a>
    <a href="newcourses.php"  class='btn'>newcourses</a>
    <a href="enrolledprojects.php"  class='btn'>enrolled projects</a>
    <a href="newprojects.php"  class='btn'>newprojects</a>
  </div>
</div>
</body>
</html>

<?php } else {?><script type="text/javascript">window.location.href="login.php?error=autherror"</script><?php } ?>