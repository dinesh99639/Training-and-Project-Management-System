<?php include ("header.php"); ?>
<?php if ($_SESSION['usertype']=='student') { ?>

<html>

<head>
    <title>COURSE</title>
    <style>
        .card
        {
          margin: auto;
          position: relative;
          margin-top: 30px;
          margin-bottom: 20px;
          /*height: 300px;*/
          width: 350px;
          /*width: 90%;*/
          /*min-width: 300px;*/
          background: white;
          padding: 40px;
          box-sizing: border-box;
          box-shadow: 0 15px 25px rgba(0,0,0,0.5);
          border-radius: 5px;
          /*display: none;*/
        }
        .chead
        {
          position: relative;
          margin-top: 30px;
          font-size: 30px;
          text-align: center;
        }

        .card-head
        {
          text-align: center;
          font-size: 20px;
          margin-bottom: 20px;
        }

        .circle 
        {
          width: 200px;
          margin: 6px 20px 20px;
          display: inline-block;
          position: relative;
          text-align: center;
          vertical-align: top;
        }
        .circle strong 
        {
          position: relative;
          top: 80px;
          left: 0;
          width: 100%;
          text-align: center;
          line-height: 45px;
          font-size: 30px;
        }
        .card .blueround
        {
          position: relative;
          background-color: rgba(25, 181, 254, 1); 
          border-radius: 50%; 
          height: 110px; 
          width: 110px; 
          left: 31.5%;
          /*transform: translate(0,-50%);*/
        }
        .card .whiteround
        {
          position: absolute;
          background-color: white;
          margin-left: 4.6%;
          margin-top: 5px; 
          border-radius: 50%; 
          height: 100px; 
          width: 100px;
        }
        .whiteround .percentage
        {
          text-align: center;
          font-size: 23px;
          position: relative;
          top: 33%;
        }
        .card .certificate-btn
        {
          text-align: center;
          margin-top: 30px;
        }
        .certificate-btn button
        {
          color: white;
          border-radius: 30px;
          outline: none;
          background-color: hsla(187, 100%, 40%,1);
          border: none;
          height: 30px;
          width: 100px;
        }

        .lecturer-details
        {
          text-align: center;          
        }
    </style>
</head>

<body>
    <script type="text/javascript">
    	
    </script>
    <?php

    if (isset($_GET['cid'])) $cid=$_GET ['cid'];

    include("database.php");

    $qry = "SELECT * FROM courses where cid='$cid'";
    $res = mysqli_query ($db, $qry);
    $row = $res->fetch_assoc();

    $uid = $_SESSION['userid'];
    $cid = $row['cid'];
    $lid = $row['lid'];

    $qry = "SELECT * FROM lecturer where lid='$lid'";
    $res = mysqli_query ($db, $qry);
    $lrow = $res->fetch_assoc();

    $qry = "SELECT * FROM enrolledcourses WHERE cid='$cid' and userid='$uid'";
    $res = mysqli_query ($db, $qry);
    $encount = mysqli_num_rows($res);
    $ec = $res->fetch_assoc();


    if (isset ($_GET['per']) and $ec['percomp']<100)
    {
      $inc=$ec['percomp']+1;
      $qry = "UPDATE enrolledcourses SET percomp='$inc' WHERE cid='$cid' and userid='$uid'";
      $res = mysqli_query ($db, $qry);
      ?> <script type="text/javascript">window.location.replace("course.php?cid=<?php echo $cid; ?>");</script>  <?php
    }
    if (isset($_GET['join']))
    {
      $qry = "INSERT INTO `enrolledcourses`(`userid`, `cid`, `percomp`) VALUES ('$uid', '$cid', 0)";
      $res = mysqli_query ($db, $qry);
      ?> <script type="text/javascript">window.location.replace("course.php?cid=<?php echo $cid; ?>");</script>  <?php
    }
    ?>



    <div class="container">
      <div class="row">

        <div class="col-sm-7">
          <div class="chead"><p><?php echo $row['cname']; ?></p></div>
          <div class="cdetails">
            <p><?php echo $row['cdesc']; ?></p>
          </div>
        </div>

        <div class="col-sm-1"></div>


        <div class="col-sm-4">

          <div class="card">
            <div class="card-head">Course Status</div>
            <div class="blueround"><div class="whiteround"><div class="percentage"><?php echo $ec['percomp']; ?>%</div></div></div>
            <?php 
            if ($encount!=0)
            {
              if ($ec['percomp']==100) 
              { ?>
                <div class="certificate-btn"><a href="certificate.php?cid=<?php echo $ec['cid']; ?>"><button>Certificate</button></a></div>
        <?php } 
              else 
              { ?>
                <div class="certificate-btn"><a href="course.php?cid=<?php echo $ec['cid']; ?>&per=inc"><button>Today task</button></a></div> 
        <?php } 
            }
            else
            { ?>
              <div class="certificate-btn"><a href="course.php?cid=<?php echo $cid; ?>&join=true"><button>Join</button></a></div>
      <?php } ?>
          </div>

          <div class="card">
            <div class="card-head">Lecturer</div>
            <div class="lecturer-details">
              <p>Name: <?php echo $lrow['lname']; ?></p>
              <p><?php echo $lrow['lprofession']; ?></p>
              <p>at <?php echo $lrow['at']; ?></p>
              <p>Qualifications: <?php echo $lrow['lqual']; ?></p>
              <p>Subjects: <?php echo $lrow['lsub']; ?></p>
              <p>Email: <?php echo $lrow['lemail']; ?></p>
              <p>Phone: <?php echo $lrow['lphone']; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>

</html>

<?php } else header("Location:login.php?error=autherror"); ?>
