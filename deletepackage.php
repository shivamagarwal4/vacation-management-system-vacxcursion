<!-- This file is for deleting the desired package from the database-->
<?php
session_start();
if(!$_SESSION['Username'])
{
	header('location:index1.php');
}
?>
<?php include_once('conn.php'); 
include_once('classpackage.php');
require_once('classhotel.php');
require_once('classvehicle.php');
$packobj=new Package;
$b=array();
$var1=$_GET['destination'];
$var2=$_GET['price'];
$b=$packobj->displayPackageDetails($var1,$var2);
if(!$b)
{
 echo "<script>alert('sorry!!!! no package available..for your choices')</script>";
		       echo "<script>window.open('admin.php','_self')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>VacXcursion:Admindelete</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">  
<link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
<!-- //Custom Theme files --> 
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script> 
<script src="jquery.min.js"></script>
 
<!-- //js -->
<!-- web-fonts -->   
<link href="//fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"> 
<link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body> 
	<!-- banner -->
	<div class="banner">
		<!-- header -->
		<div class="header">
			<div class="w3ls-header"><!-- header-one --> 
				<div class="container">
					<div class="w3ls-header-left">
						
					</div>
					<div class="w3ls-header-right">
						<ul> 
						<li><a href="alogout.php">Logout</a></li>
						</ul>
					</div>
					<div class="clearfix"> </div> 
				</div>
			</div>
			<!-- //header-one -->    
			<!-- navigation -->
			<div class="navigation agiletop-nav">
				<div class="container">
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header w3l_logo">
							<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>  
							<h1><a href="#"><img src="log.png" /></a></h1>
						</div> 
						<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="admin.php" class="active">Home</a></li>	
								
								<li><a href="about.html">About</a></li> 
								  
								<li><a href="contact.html">Contact Us</a></li>
							</ul>
						</div>
						
					</nav>
				</div>
			</div>
			<!-- //navigation --> 
		</div>
		<!-- //header-end --> 
		<!-- banner-text -->
		<div class="banner-text">	
			<div class="container">
				<h2>Travel......</h2><br> <span><h2>Along with us!!!</h2></span>
				
			</div>
		</div>
	</div>
	<div class="container">	
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="index1.php"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Delete Package</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- offers-page -->
	
	<div class="offers about"> 
		<div class="container">
			<h3 class="w3ls-title w3ls-title1">Packages Available</h3>  
			<div class="offers-wthreerow"> 
			
                 <?php for($k=0;$k<$b[1];$k++)
                  {
					 $packid=$b[0][$k][0]; 
	                ?>	
	      <div class="offers-right"> 
		  
				<form action="classpackage.php" name="formdelete" method="GET">
				
				 <img src="<?php echo $b[0][$k][8]?>" class="img-responsive" alt="img">
					<h5><?php $hid= $b[0][$k][2];
									$hotelobj=new Hotel;
									$y=array();
									$y=$hotelobj->gethotelDetails($hid);
									$star=$y[0][3];
									echo $y[0][2].'<br>';?> <img src="images/star<?php echo $star?>.png" width="75" height="20"></h5>
					<p class="w3ls-offertext"><?php $a=array();
		 $a=$packobj->getpackage_room($packid);?>
		  <?php if($a[0][1]!=0) {echo $a[0][1]." "."Single Room"."<br>";}?>
		  <?php if($a[0][2]!=0) {echo $a[0][2]." "."Double Room"."<br>";}?>
		  <?php if($a[0][3]!=0) {echo $a[0][3]." "."Mini Suite"."<br>";}?>
		  vehicle included: <?php $vid= $b[0][$k][3];
									$vehicleobj=new Vehicle;
									$x=array();
									$x=$vehicleobj->getvehicleDetails($vid);
									echo $b[0][$k][4]." ". $x[0][2];?> </p>
					<br>
					<p><?php echo $b[0][$k][7]?> Nights and <?php echo $b[0][$k][6]?> Days.</p>
					<h5>Rs&nbsp<?php echo $b[0][$k][5]?>/-</h5>
					<br>
					<br>
					<input type="hidden" name="destination" value="<?php echo $var1 ?>">
					<input type="hidden" name="packid" value="<?php echo $packid ?>">
					<button type="submit" class="btn btn-default" name="delete">Delete Package</button>
</form>
				  </div> 
			  
				  <?php } 
                        ?>
			</div>
</div>
</div>
 
	</div>
	<div class="copyw3-agile"> 
		<div class="container">
			<p>&copy;All rights reserved | Design by <a href="https://vacxcursion.herokuapp.com">VacXcursion</a></p>
		</div>
	</div>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	
    <script src="js/bootstrap.js"></script>
</body>
</html>