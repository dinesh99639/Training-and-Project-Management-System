<?php 
    include ("header.php"); 
    
    if ($_SESSION['usertype']=='student') 
    {
        include("database.php");
        $userid = $_SESSION['userid'];

        $qry = "SELECT COUNT(*) as count FROM `enrolledcourses` WHERE userid='$userid' and percomp=100";
        $course_count = mysqli_fetch_assoc(mysqli_query ($db, $qry));
        $course_count = $course_count['count'];

?>

<html>
<head>
    <link rel="stylesheet" href="student.css">
</head>

<body>

    <h1 style="text-align:center;color:white;font-size:43px;">New projects</h1>
    <br><br>
    <h1 style="text-align:center;color:white;font-size:19px; margin-top: -40px;"><br>(Hello students...! These are your new projects available please go through them)</h1><br>

    <?php
    if($course_count > 0)
    {
        $qry = "SELECT now() AS cur";
        $now = mysqli_query ($db, $qry);
        $now = $now->fetch_assoc();
        $now = $now['cur'];

        $qry = "SELECT * FROM projects p, projectbid b WHERE p.pid=b.pid and b.end<'$now' and p.pid NOT IN (SELECT e.pid FROM enrolledprojects e WHERE e.userid='$userid')";
        $res = mysqli_query ($db, $qry);

    while ($row = $res->fetch_assoc()) {
    ?>
        <div class="div1" onclick="window.location='project.php?pid=<?php echo $row['pid']; ?>'">
            <h1 style="font-size:25px; text-align: center;"><?php echo $row['phead']; ?><br></h1>
            <h1 style="font-size:25px;">Project info:<br></h1>
            <p style="font-size:17px;font-family:italic;color:black"><?php echo $row['pdesc']; ?></p>
        </div>
    <?php } ?>

</body>
</html>

<?php 
    }
    else
    {
        ?><div style="text-align: center; color: white; border: 1px solid white;width: 500px; margin: auto;margin-top: 100px;font-size: 20px;">You should complete atleast one course to join projects</div><?php
    }
} else header("Location:login.php?error=autherror"); ?>
