<?php include ("header.php"); ?>
<?php if ($_SESSION['usertype']=='manager') { ?>

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
        .cdetails
        {
          text-align: justify;
        }

        .card-head
        {
          text-align: center;
          font-size: 20px;
          margin-bottom: 20px;
        }

        .bid_input
        {
          border-radius: 30px;
          outline: none;
          border: 1px solid gray;
          padding: 4px 11px 4px 11px;
        }
        .bid_btn
        {
          text-align: center;
          margin-top: 10px;
        }
        .bid_btn input[type="submit"]
        {
          border-radius: 30px;
          border: none;
          outline: none;
          background-color: hsla(187, 100%, 40%,1);
          color: white;
          padding: 3px 30px 3px 30px;
        }

        .details
        {
          text-align: center;          
        }
    </style>
</head>

<body>
    <?php
    include ("database.php");

    $pid = $_GET['pid'];

    $qry = "SELECT * FROM projectbid INNER JOIN projects ON projectbid.pid=projects.pid and projects.pid='$pid'";
    $res = mysqli_query ($db, $qry);
    $row = $res->fetch_assoc();

    $qry = "SELECT now() AS cur";
    $now = mysqli_query ($db, $qry);
    $now = $now->fetch_assoc();
    $now = $now['cur'];

    $end = $row['end'];
    $start = $row['start'];
    $qry = "SELECT TIMEDIFF('$end','$now')+0 AS diff";
    $time = mysqli_query ($db, $qry);
    $time = $time->fetch_assoc();

    if (isset($_GET['bids_btn']))
    {
        $ibid= $_GET['ibid'];
        if($ibid < $row['bid'] && $ibid>=0)
        {
          $qry = "UPDATE projectbid SET bid='$ibid' WHERE pid='$pid'";
          mysqli_query ($db,$qry);
        }
        // header("Location:bidding.php?pid=".$pid);
        ?><script type="text/javascript">window.location.href="bidding.php?pid=<?php echo $pid; ?>"</script><?php
    }
    if (isset($_GET['bidcomplete']))
    {
        $ibid= $_GET['ibid'];
        if($ibid < $row['bid'] && $ibid>=0)
        {
          $qry = "UPDATE projectbid SET bid='$ibid' WHERE pid='$pid'";
          mysqli_query ($db,$qry);
        }
        // header("Location:bidding.php?pid=".$pid);
        ?><script type="text/javascript">window.location.href="bidding.php?pid=<?php echo $pid; ?>"</script><?php
    }
    ?>

    <div class="container">
      <div class="row">

        <div class="col-sm-7">
          <div class="chead"><p><?php echo $row['phead']; ?></p></div>
          <div class="cdetails">
            <p><?php echo $row['pdesc']; ?></p>
          </div>
        </div>

        <div class="col-sm-1"></div>

        <div class="col-sm-4">

          <div class="card">
            <div class="card-head">Bid Price</div>

            <div class="details">Time left : <p class="time"><?php echo $time['diff']; ?></div>

            <div class="details"><div class="reg_update"><?php echo $row['bid']; ?>/-</div></div>
            <form>
              <input type="text" name="pid" value="<?php echo $pid; ?>" style="display: none;">
              <div style="text-align: center;"><input class="bid_input" type="number" name="ibid"></div>
              <div class="bid_btn"><input type="submit" name="bids_btn"></div>
            </form>

          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
  var diff = $('.time').text();
  var h,m,s;
  diff = parseInt (diff);

  h = parseInt(diff/10000);
  m = parseInt((diff/100)%100);
  s = diff%100;
  $('.time').text(0+"h "+0+"m "+0+"s");
  if (diff>=0)
  {
    var runtime = setInterval(()=>{

      s=s-1;
      if (s<0) { s=59; m=m-1; }
      if (m<0) { m=59; h=h-1; }

      if (h==0 && m==0 && s==0) 
      {
        $('.bid_input').hide();
        $('.bid_btn').hide();
        clearInterval(runtime);
      }
      $('.time').text(h+"h "+m+"m "+s+"s");

      $('.reg_update').load("bidvalue.php?pid=<?php echo $pid; ?>");

    },1000);
  }
  else
  {
    $('.bid_input').hide();
    $('.bid_btn').hide();
  }
</script>

</body>

</html>

<?php } else header("Location:login.php?error=autherror"); ?>