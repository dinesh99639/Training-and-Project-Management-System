<?php include("header.php"); ?>
<?php
	if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        include ("database.php");
        $qry = "INSERT INTO contact_us(`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";
        mysqli_query($db, $qry);
    }
?>	

<!DOCTYPE html>
<html>

<head>
    <title>Contact us</title>
    <link href="css/robotfont.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            text-align: center;
            background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url(background.jpg);
            background-attachment: fixed;
            background-size: cover;
            font-family: sans-serif;
            border-radius: 50px;
        }
        
        .card {
            font-family: 'Open Sans', sans-serif;
            width: 400px;
            margin: auto;
            margin-top: 140px;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
        }
        .card:hover
        {
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }
        
        .contact-title {
            color: #fff;
            text-transform: uppercase;
            text-align: center;
        }
        
        .contact-title h1 {
            font-size: 32px;
            /*line-height: 10px;*/
        }
        
        .contact-title h2 {
            font-size: 16px;
            margin-bottom: 30px;
        }
        
        .form-control2 {
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 1px solid white;
            color: #fff;
            font-size: 18px;
            margin-bottom: 16px;
        }
        
        .input {
            margin-top: 20px;
            margin-right: 15px;
        }
        
        .input input,
        .input textarea {
            font-family: 'Open Sans', sans-serif;
            width: 100%;
            padding: 0 10px;
            font-weight: 10px;
            /*border-radius: 10px;*/
        }
        
        .input textarea {
            height: 90px;
        }
        
        .input input::placeholder,
        .input textarea::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        .submit {
            font-family: 'Open Sans', sans-serif;
            background: #ff5722;
            border: none;
            color: #fff;
            height: 40px;
            marker-top: 20px;
            /*border-radius: 30px;*/
            transition:  300ms;
            padding: 10px;
        }
        
        .submit:hover {
            cursor: pointer;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="contact-title">
            <h1>
            say hello
            <h1>
            <h2>we are always ready to serve you!</h2>
         </div>
         <div class="contact-form">
            <form id="contact-form" method="post" action="">
               <div class="input"><input type="text" name="name" class="form-control2" placeholder="Your name" required></div>
               <div class="input"><input type="email" name="email" class="form-control2" placeholder="Your email" required></div>
               <div class="input"><textarea name="message" class="form-control2" placeholder="Message" row="4" required></textarea></div>
               <input type="submit" name="submit" class="form-control2 submit" value="Send Message">
            </form>
         </div>
      </div>
   </body>
   </htnl>