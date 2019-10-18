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
 background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(course7.jpg);
background-size: cover;
}

ul{
float:right;
list-style-type:none;
margin-top:28px;
}
ul li{
   display: inline-block;
}
ul li a{
text-decoration:none;
color:#fff;
padding:5px 20px;
border:1px solid #fff;
transition: 0.6s ease;
}
ul li a:hover{
background-color:#fff;
color:#000;
}
ul li.active a{
background-color:#fff;
color:#000;
}
.logo img{
float:left;
width:250px;
height:auto;
}
.main{
max-width:1200px;
margin:auto;
}
.title{
position:absolute;
top:50%;
left:52%;
transform:translate(-50%,-50%);
}
.title h1{
color:#fff;
font-size:65px;
}
.button{
position:absolute;
top:62%;
left:53%;
transform:translate(-50%,-50%);
}
.btn{
border:1px solid #fff;
padding:10px 20px;
color:#fff;
text-decoration: none;
transaction: 0.6s;
}
.btn:hover{
background-color:#fff;
color:#000;
}

</style>
</head>
<body>
<div class="main">
  <div class="title">
  <h1>OPT YOUR CHOICE</h1>
  </div>
  <div class="button">
    <a href="enrolledcourses.php"  class='btn'>enrolled courses</a>
    <a href="newcourses.php"  class='btn'>newcourses</a>
    <a href="enrolledprojects.php"  class='btn'>enrolled projects</a>
    <a href="newprojects.php"  class='btn'>newprojects</a>
  </div>
  <ul>
   <li ><a href="index.php">Home</a></li>
     <li><a href="index.php">about</a></li>
     <li><a href="contact.php">contact</a></li>
  </ul>
</div>
</body>
</html>

