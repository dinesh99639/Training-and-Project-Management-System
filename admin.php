<?php
   include("header.php");
   if ($_SESSION['usertype']=='admin') 
   {
     include("database.php");

     if (isset($_POST['course_save']))
     {
        $cname = $_POST['cname'];
        $cdesc = $_POST['cdesc'];
        $lid = $_POST['lid'];

        $qry = "INSERT INTO `courses`(`cname`, `cdesc`, `lid`) VALUES ('$cname', '$cdesc', '$lid')";
        mysqli_query ($db, $qry);
     }

     if (isset($_POST['project_save']))
     {
        $phead = $_POST['phead'];
        $pdesc = $_POST['pdesc'];
        $members = $_POST['members'];
        $bid = $_POST['bid'];
        $start = $_POST['start'];
        $stop = $_POST['stop'];
     
        //Getting last pid
        $qry = "SELECT pid FROM projects ORDER BY pid desc";
        $pcount=mysqli_fetch_assoc(mysqli_query ($db, $qry));
        $pcount=$pcount['pid']+1;
        // echo $pcount;

        $qry = "INSERT INTO `projectbid`(`pid`, `bid`, `start`, `end`) VALUES ('$pcount', '$bid', '$start', '$stop')";
        mysqli_query ($db, $qry);

        $qry = "INSERT INTO `projects`(`phead`, `pdesc`, `members`, `percomp`) VALUES ('$phead', '$pdesc', '$members', 0)";
        mysqli_query ($db, $qry);
     }

     if (isset($_GET['users']))
     {
        $qry = "SELECT * FROM `users` WHERE 1";
        $users = mysqli_query ($db, $qry);
     }

     if (isset($_GET['contactus']))
     {
        $qry = "SELECT * FROM contact_us";
        $res = mysqli_query($db, $qry);
     }

     if (isset($_GET['update']))
     {
        $userid = mysqli_escape_string($db,$_GET['userid']);
        $username = mysqli_escape_string($db,$_GET['username']);
        $name = mysqli_escape_string($db,$_GET['name']);
        $email = mysqli_escape_string($db,$_GET['email']);
        $phone = mysqli_escape_string($db,$_GET['phone']);
        $usertype = mysqli_escape_string($db,$_GET['usertype']);

        $qry = "UPDATE `users` SET name='$name', email='$email', phone_no='$phone', usertype='$usertype' WHERE userid = '$userid'";
        mysqli_query($db, $qry);

        // header("Location:admin.php?users=true");
        ?><script type="text/javascript">window.location.href="admin.php?users=true";</script><?php
     }

     if (isset($_GET['remove']))
     {
        $userid = mysqli_escape_string($db,$_GET['userid']);
        $qry = "DELETE FROM `users` WHERE userid='$userid'";
        mysqli_query($db, $qry);

        // header("Location:admin.php?users=true");
        ?><script type="text/javascript">window.location.href="admin.php?users=true";</script><?php
     }
?>

<html>
   <head>
      <title>Admin</title>
      <style type="text/css">
        body
         {
         /*background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,10)),url(course7.jpg);*/
         background-attachment: fixed;
         background-size: cover;
         }
         .input
         {
            margin-bottom: 10px;
         }
         /*nav
         {
          position: fixed;
         }*/

         .sidebar {
           margin: 0;
           padding: 0;
           width: 200px;
           background-color: #333333;
           /*position: fixed;*/
           height: 100%;
           overflow: auto;
         }

         .sidebar a {
           display: block;
           color: white;
           padding: 16px;
           text-decoration: none;
           margin: 0;
           text-align: center;
         }
          
         .sidebar a.active {
           background-color: rgba(82, 179, 217, 1);
           color: white;
         }

         .sidebar a:hover:not(.active) {
           background-color: #555;
           color: white;
         }

         div.content {
           margin-left: 200px;
           padding: 1px 16px;
           height: 1000px;
         }

         @media screen and (max-width: 700px) {
           .sidebar {
             width: 100%;
             height: auto;
             position: relative;
           }
           .sidebar a {float: left;}
           div.content {margin-left: 0;}
         }

         @media screen and (max-width: 400px) {
           .sidebar a {
             text-align: center;
             float: none;
           }
         }
         .box
         {
          border: 1px solid black;
          border-radius: 10px;
          width: 100%;
          padding: 20px;
          margin-top: 20px;
         }
         .edit_btn button
        {
          border-radius: 30px;
          border: none;
          outline: none;
          background-color: hsla(187, 100%, 40%,1);
          color: white;
          padding: 3px 30px 3px 30px;
        }
        .edit
        {
          display: block;
        }
      </style>
   </head>
   <body>

      <div class="container" style="margin: 0; padding: 0;">
         <div class="row" style="margin: 0;margin-top: -20px;">
            <div class="col-sm-2" style="background-color: gray; height: 100%; padding: 0;">
               <div class="sidebar">
                 <a class="<?php if($_GET['course']) echo "active"; ?>" href="admin.php?course=true">Courses</a>
                 <a class="<?php if($_GET['project']) echo "active"; ?>" href="admin.php?project=true">Projects</a>
                 <a class="<?php if($_GET['users']) echo "active"; ?>" href="admin.php?users=true">Users</a>
                 <a class="<?php if($_GET['contactus']) echo "active"; ?>" href="admin.php?contactus=true">Contact us</a>
               </div>
            </div>
            <div class="col-sm-10">
               <?php if(isset($_GET['course']))  { ?>
                  <form method="post" action="">
                     <div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-6 input">
                           <h3 style="text-align: center; margin-bottom: 40px;">Add Course</h3>
                           <div class="col-sm-5">Course Name :</div>
                           <div class="col-sm-7"><input type="text" name="cname"></div>
                        </div>
                        <div class="col-sm-2"></div>          
                     </div>
                     <div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-6 input">
                           <div class="col-sm-5">Course Description : </div>
                           <div class="col-sm-7"><textarea name="cdesc" rows="6" cols="35"></textarea></div>
                        </div>   
                        <div class="col-sm-2"></div>                           
                     </div>
                     <div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-6 input">
                           <div class="col-sm-5">Lecturer id : </div>
                           <div class="col-sm-7"><input type="text" name="lid"></div>
                        </div>  
                        <div class="col-sm-2"></div>
                     </div>
                     <div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-6 input">
                           <div class="col-sm-5"></div>
                           <div class="col-sm-7"><input type="submit" name="course_save" value="Save"></div>
                        </div> 
                        <div class="col-sm-2"></div>                   
                     </div>
                  </form>

               <?php }
               elseif (isset($_GET['project'])) { ?>
                  <form method="post" action="">                     
                     <div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-6 input">
                           <h3 style="text-align: center; margin-bottom: 40px;">Add Project Bid</h3>
                           <div class="col-sm-5">Project Name :</div>
                           <div class="col-sm-7"><input type="text" name="phead"></div>
                        </div>                    
                     </div>
                     <div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-6 input">
                           <div class="col-sm-5">Project Description : </div>
                           <div class="col-sm-7"><textarea name="pdesc" rows="6" cols="50"></textarea></div>
                        </div>                    
                     </div>
                     <div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-6 input">
                           <div class="col-sm-5">Members : </div>
                           <div class="col-sm-7"><input type="number" min="1" value="1" name="members"></div>
                        </div>                    
                     </div>
                     <div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-6 input">
                           <div class="col-sm-5">Bid Value : </div>
                           <div class="col-sm-7"><input type="text" name="bid"></div>
                        </div>                    
                     </div>
                     <div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-6 input">
                           <div class="col-sm-5">Start time : </div>
                           <div class="col-sm-7"><input type="datetime-local" name="start"></div>
                        </div>                    
                     </div>
                     <div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-6 input">
                           <div class="col-sm-5">Stop time : </div>
                           <div class="col-sm-7"><input type="datetime-local" name="stop"></div>
                        </div>                    
                     </div>
                     <div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-6 input">
                           <div class="col-sm-5"></div>
                           <div class="col-sm-7"><input type="submit" name="project_save" value="Save"></div>
                        </div>                    
                     </div>
                  </form>
               <?php 
                }
                elseif (isset($_GET['contactus'])) 
                {
                  while ($row = mysqli_fetch_assoc($res)) {
                  ?>
                  <div class="box">
                    <p>Name    : <?php echo $row['name']; ?></p>
                    <p>Email   : <?php echo $row['email']; ?></p>
                    <p>Message : <br><?php echo $row['message']; ?></p>
                  </div>
                  <?php
                  }
                }
                elseif (isset($_GET['users'])) 
                {
                  ?>
                    <div class="container" style="margin-left: 40px; padding: 0;width: 100%;">
                    <div class="row" style="font-size: 18px;font-weight: bold; width: 100%;">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2">Username</div>
                        <div class="col-sm-2">Name</div>
                        <!-- <div class="col-sm-2">Email</div> -->
                        <!-- <div class="col-sm-2">Phone no</div> -->
                        <div class="col-sm-2">Usertype</div>
                        <div class="col-sm-2">Action</div>
                    </div>
                  </div>

                    <?php
                    while ($userdata = mysqli_fetch_assoc($users)) {
                    ?>
                    <div class="container" style="margin-left: 40px;padding: 0; width: 100%;">
                    <div class="row" style="padding: 0; margin-top: 10px; width: 100%;">
                      <div class="col-sm-2"></div>
                      <div class="col-sm-2"><?php echo $userdata['username']; ?></div>
                      <div class="col-sm-2"><?php echo $userdata['name']; ?></div>
                      <!-- <div class="col-sm-2"><?php #echo $userdata['email']; ?></div> -->
                      <!-- <div class="col-sm-2"><?php #echo $userdata['phone_no']; ?></div> -->
                      <div class="col-sm-2"><?php echo $userdata['usertype']; ?></div>
                      <div class="col-sm-2">
                        <input type="text" name="userid" style="display: none;">
                        <div class="edit_btn"><button data-toggle="modal" data-target="#myModal<?php echo $userdata['userid']; ?>">Edit</button></div>
                      </div>
                    </div>
                    </div>

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
                                    <div class="col-sm-6 input">
                                       <div class="col-sm-5">Usertype : </div>
                                       <div class="col-sm-7">
                                         <select name="usertype">
                                          <option value="student" <?php if($userdata['usertype']=="student") echo "selected";?>>Student</option>
                                          <option value="manager" <?php if($userdata['usertype']=="manager") echo "selected";?>>Manager</option>
                                          <option value="admin" <?php if($userdata['usertype']=="admin") echo "selected";?>>Admin</option>
                                        </select>
                                       </div>
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 input" style="margin-top: 30px;">
                                       <div class="col-sm-3"></div>
                                       <div class="col-sm-3"><input class="btn btn-primary" type="submit" name="update" value="Update"></div>
                                       <div class="col-sm-3"><input class="btn btn-danger" type="submit" name="remove" value="Remove"></div>
                                    </div>  
                                </div>
                              </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                  <?php } ?>

                  <?php
                }
                else { ?>
                  <div>
                     <div class="col-sm-4"></div>
                     <div class="col-sm-6 input">
                        <h4 style="text-align: center;top: 50%; transform: translateY(50%);">Welcome Admin</h4>
                     </div>                    
                  </div>
               <?php } ?>
            </div>
         </div>
      </div>
   </body>
</html>

<?php } else {?><script type="text/javascript">window.location.href="login.php?error=autherror"</script><?php }
?>