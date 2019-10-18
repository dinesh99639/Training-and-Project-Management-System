<?php include ("header.php");
if ($_SESSION['usertype']=='manager') {
include ("database.php");

$qry = "SELECT * FROM projectbid INNER JOIN projects ON projectbid.pid=projects.pid";
$res = mysqli_query ($db,$qry);
?>

<html>
<head>
    <link rel="stylesheet" href="student.css">
</head>

<body>


    <h1 style="text-align:center;color:white;font-size:43px;">Projects</h1><br>

    <?php
    while ($row = $res->fetch_assoc()) {
    ?>
    <div class="div1" onclick="window.location='bidding.php?pid=<?php echo $row['pid']; ?>'">
        <h1 style="font-size:25px; text-align: center;"><?php echo $row['phead']; ?><br></h1>
        <h1 style="font-size:25px;">Project info:<br></h1>
        <p style="font-size:17px;font-family:italic;color:black"><?php echo $row['pdesc']; ?></p>
        <p style="font-size:17px;font-family:italic;color:black">BID VALUE : <?php echo $row['bid']; ?>/-</p>
    </div>
    <?php } ?>

</body>
</html>

<?php } else {?><script type="text/javascript">window.location.href="login.php?error=autherror"</script><?php }
#header("Location:login.php?error=autherror"); 
 ?>
