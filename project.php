<html>

<head>
    <title>COURSE</title>
    <link rel="stylesheet" type="text/css" href="project.css">
</head>

<body>
    <?php 

    include ("header.php");

    if (isset($_GET['pid'])) $pid=$_GET['pid'];

    include("database.php");

    $qry = "SELECT * FROM projects where pid='$pid'";
    $res = mysqli_query ($db, $qry);
    $row = $res->fetch_assoc();

    $uid = $_SESSION['userid'];

    $qry = "SELECT * FROM enrolledprojects WHERE pid='$pid' and userid='$uid'";
    $res = mysqli_query ($db, $qry);
    $encount = mysqli_num_rows($res);

    $qry = "SELECT * FROM enrolledprojects WHERE pid='$pid'";
    $res = mysqli_query ($db, $qry);
    $memcount = mysqli_num_rows($res);
    $ec = $res->fetch_assoc();

    //user Joined the project or not
    $qry = "SELECT * FROM enrolledprojects WHERE pid='$pid' and userid='$uid'";
    $res = mysqli_query ($db, $qry);
    $project_joined = mysqli_num_rows($res);

    if (isset ($_GET['per']) and $row['percomp']<100)
    {
      $inc=$row['percomp']+1;
      $qry = "UPDATE projects SET percomp='$inc' WHERE pid='$pid'";
      $res = mysqli_query ($db, $qry);
      ?> <script type="text/javascript">window.location.replace("project.php?pid=<?php echo $pid; ?>");</script>  <?php
    }
    if (isset($_GET['join']))
    {
      $qry = "INSERT INTO `enrolledprojects`(`userid`, `pid`) VALUES ('$uid', '$pid')";
      $res = mysqli_query ($db, $qry);
      ?> <script type="text/javascript">window.location.replace("project.php?pid=<?php echo $pid; ?>");</script>  <?php
    }

    

    if (isset($_GET['send']) and $project_joined!=0)
    {
      $msg = $_GET['msg'];
      $time = date("Y-m-d H:i:s");
      $qry = "INSERT INTO `projectchat2`(`pid`, `userid`, `time`, `message`) VALUES ('$pid', '$uid', '$time', '$msg')";
      mysqli_query ($db, $qry);
      ?> <script type="text/javascript">window.location.replace("project.php?pid=<?php echo $pid; ?>");</script>  <?php
    }

    ?>



    <div class="container">
      <div class="row">

        <div class="col-sm-7">
          <div class="chead"><p><?php echo $row['phead']; ?></p></div>
          <div class="cdetails">
            <p><?php echo $row['pdesc']; ?></p>
          </div>

          <h3>Chat with your Colleagues</h3>
          <div class="projectchat">
            <div class="chat"></div>
          </div>
          <div class="msgbox">

            <input type="text" class="msg" name="msg">
            <button class="send">Send</button>
            <script>
              $('.send').click(()=>{
                var app = $('.msg').val();
                window.location.replace("project.php?pid=<?php echo $pid; ?>"+"&msg="+app+"&send=true");
              });
            </script>
          </div>
        </div>

        <div class="col-sm-1"></div>


        <div class="col-sm-4">

          <div class="card">
            <div class="card-head">Course Status</div>
            <div class="blueround"><div class="whiteround"><div class="percentage"><?php echo $row['percomp']; ?>%</div></div></div>
            <div class="members">Members : <?php echo $memcount."/".$row['members']; ?></div>
            <?php 
            if ($encount!=0)
            {
              if ($row['percomp']==100) 
              { ?>
                <div class="certificate-btn">Project Completed</div>
        <?php } 
              else 
              { ?>
                <div class="certificate-btn"><a href="project.php?pid=<?php echo $ec['pid']; ?>&per=inc"><button>Today task</button></a></div> 
        <?php } 
            }
            else
            { ?>
              <div class="certificate-btn"><a href="project.php?pid=<?php echo $pid; ?>&join=true"><button <?php if ($memcount==$row['members'] or $row['percomp']==100) echo "disabled style='background-color: red;'" ?>>Join</button></a></div>
      <?php } ?>
          </div>

      </div>
    </div>
    <script type="text/javascript">
      var down = 1;
      $('.chat').load("loadchat.php?pid=<?php echo $pid; ?>");

      var chat_refresh = setInterval(() => 
      {
        if (down==1) {down=0; $('.projectchat').scrollTop($('.projectchat')[0].scrollHeight);}
        $('.chat').load("loadchat.php?pid=<?php echo $pid; ?>");
      },1000);

    </script>
</body>

</html>