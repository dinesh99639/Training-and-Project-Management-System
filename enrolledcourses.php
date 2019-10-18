<?php include ("header.php"); ?>
<?php if ($_SESSION['usertype']=='student') { ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="student.css">
</head>

<body>


    <?php

    include("database.php");

    $userid = $_SESSION['userid'];
    $qry = "SELECT * FROM courses WHERE cid IN (SELECT cid FROM enrolledcourses WHERE userid='$userid')";
    $res = mysqli_query ($db, $qry);

    ?>


    <h1 style="text-align:center;color:white;font-size:43px;">Enrolled courses</h1>
    <br><br>
    <h1 style="text-align:center;color:white;font-size:19px;"><br>(Hello students....! these are your enrolled courses please verify your enrolled courses)</h1><br>


    <?php
    while ($row = $res->fetch_assoc()) {
    ?>
    <div class="div1" onclick="window.location='course.php?cid=<?php echo $row['cid']; ?>'">
        <h1 style="font-size:25px; text-align: center;"><?php echo $row['cname']; ?><br></h1>
        <h1 style="font-size:25px;">course info:<br></h1>
        <p style="font-size:17px;font-family:italic;color:black"><?php echo $row['cdesc']; ?></p>
    </div>
    <?php } ?>

</body>

</html>

<?php } else header("Location:login.php?error=autherror"); ?>
