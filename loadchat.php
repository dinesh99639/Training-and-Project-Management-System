<?php
  session_start();
  $pid = $_GET['pid'];

  include("database.php");

  //Get the chat
  $qry = "SELECT * FROM users u,projectchat2 c WHERE c.pid='$pid' and u.userid=c.userid order by time";
  // $qry = "SELECT u.userid,u.name,c.message FROM users u,projectchat c WHERE c.pid='$pid' and u.userid=c.userid order by time";
  $chat = mysqli_query ($db, $qry);

  while ($showchat = mysqli_fetch_assoc($chat))
  {
    if ($_SESSION['userid']!=$showchat['userid'])
    {
?>
  <div class="otherchat">
    <div class="otherchat_head"><?php echo $showchat['name']; ?></div>
    <p><?php echo $showchat['message']; ?></p>
  </div>
<?php
    }
    else 
    { ?>
      <div class="mychat">
        <div class="mychat_head">You</div>
        <p my><?php echo $showchat['message']; ?></p>
      </div>
<?php  
    } 
  }
?>