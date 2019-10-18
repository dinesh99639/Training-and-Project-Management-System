<?php include ("header.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Certificate</title>
	<style type="text/css">
		body
		{
			background-color: rgba(238, 238, 238, 1) !important;  
		}
		.certificate
		{
			text-align: center;
			min-width: 707px;
			/*max-width: 800px;*/
		}
		.certificate img
		{
			margin-left: auto;
			height: 960px;
			z-index: -1;
		}
		@font-face 
		{
		 	font-family: 'Tangerine', cursive;
		 	src: url(Tangerine-Regular.tiff);
		}
		.certificate .certi_title p
		{
			position: relative;
			font-family: 'Great Vibes', cursive;
			font-size: 40px;
			margin-top: -800px;
			z-index: 1;
		}
		.certificate .certi_details p
		{
			position: relative;
			font-family: 'Great Vibes', cursive;
			font-size: 20px;
			/*margin-top: -700px;*/
			z-index: 1;
		}
		.certificate .name p
		{
			position: relative;
			font-family: 'Great Vibes', cursive;
			font-size: 25px;
			/*margin-top: -700px;*/
			z-index: 1;
		}
		.print
		{
			text-align: center;
			margin-top: 500px;
			/*bottom:10px;*/
		}
		.print button
		{
			position: relative;
			/*text-align: center;*/
			/*margin-top: 400px;*/
			/*left: 45%;*/
			width: 15%;
			margin-bottom: 20px;
			background-color: rgba(0, 181, 204, 1);
			height: 30px;
			border-radius: 30px;
			border: none;
			outline: none;
		}
		@media print {
		  .print {
		    display: none;
		    margin: 0;
		  }
		}

	</style>
</head>
<body>
	<?php

	include ("database.php");

	if (isset($_GET['cid'])) $cid=$_GET ['cid'];
	$qry = "SELECT * FROM courses where cid='$cid'";
    $res = mysqli_query ($db, $qry);
    $row = $res->fetch_assoc();

	?>	


	<div class="certificate">
		<img src="images/certificate.jpg">
		<!-- <div class="certi_title"><p>TPM Solutions</p></div> -->
		<div class="certi_title"><p>TPM Solutions<br><label style="font-size: 35px;">Certificate</label></p></div>
		<div class="certi_details"><p>This certificate is awarded to</p></div>
		<div class="name"><p><?php echo $_SESSION['name']; ?></p></div>
		<div class="certi_details"><p>for successfully completing the course</p></div>
		<div class="name"><p><?php echo $row['cname']; ?></p></div>
		<!-- <div class="certi_details"><p>three week course completed on (28-08-2019)</p></div> -->
		<div class="certi_details"><p>Provided by TPM Solutions</p></div>
	</div>
	<div class="print"><button onClick="window.print();">Print</button></div>
</body>
</html>