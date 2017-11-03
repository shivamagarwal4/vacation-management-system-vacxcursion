<?php require_once('conn.php');
?>
<!-- This file takes the user to the home page after a successful login through the google account-->
<?php
error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['google_data']))
    {
        header("Location:index1.php");
}
?>

 
<?php require_once('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>VacXcursion</title>
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
							
							<li class="head-dpdn">
								<a href="offers.php"><i class="fa fa-gift" aria-hidden="true"></i> New Offers</a>
							</li> 
<li class="head-dpdn">
								<a href="account.php"><i class="fa fa" aria-hidden="true"></i>Home</a>
							</li> 
							
							
							<li>
							<?php
							
							
							echo "Welcome"." ".$_SESSION['google_data']['name'];
							?>
							</li>
							<li class="head-dpdn">
							<a href="glogin/logout.php?logout"><i class="fa fa-sign-in" aria-hidden="true"> Logout</i></a>
								
							</li>
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
								<li><a href="index1.php" class="active">Home</a></li>	
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
				<h2>Travel....... <br> <span>Before you run out of time!!!</span></h2>
				
			</div>
		</div>
	</div>
	

	<br>
	<br>
	<br>
	<br>
	<br>

<?php
//session_start();
$em=$_SESSION['google_data']['email'];

$x=new Connect;
$c=$x->getconnect();

$res=$c->query("select bt.book_id,bd.vehicle_id,bd.s_count,bd.d_count,bd.m_count,bd.no_of_vehicle,bt.first_name,bt.last_name,bt.contact,bt.booked_date,bt.time_booking,bd.price,bd.dest,bd.no_of_days,bd.hotel_id from book_trip as bt,book_detail as bd where bt.email='$em' and bt.book_id=bd.book_id");
if($res)
{
?>

<div class="container">
<div class="table-responsive">
<table  class="table table-hover">
<tr>
<td align="center" colspan="16"><h1 style="color:black">Booking Details</h1></td>
</tr>


<tr  class="success" align="center">

<th  style="color:black">S.No</th>
<th style="color:black">BOOKING ID</th>
<th  style="color:black">FIRST NAME</th>
<th  style="color:black">LAST NAME</th>
<th  style="color:black">DESTINATION</th>
<th  style="color:black">HOTEL</th>
<th  style="color:black">SINGLE ROOMS</th>
<th  style="color:black">DOUBLE ROOMS</th>
<th  style="color:black">MINI SUITEs</th>
<th  style="color:black">NO OF DAYS</th>
<th  style="color:black">VEHICLE</th>
<th  style="color:black">No OF VEHICLE</th>
<th  style="color:black">No OF PERSON</th>
<th  style="color:black">BOOKED DATE</th>
<th  style="color:black">PRICE</th>
<th  style="color:black">BOOKING DATE & TIME</th>

</tr>

<?php
$i=1;
while($row=$res->fetch_assoc())
{
$temp=$row['book_id'];
$tm=$row['hotel_id'];
$th=$row['vehicle_id'];
$res2=$c->query("select hotel_name from hotel where hotel_id='$tm'");
$row2=$res2->fetch_assoc();
$res3=$c->query("select vehicle_type from vehicle where vehicle_id='$th'");
$row3=$res3->fetch_assoc();
$res4=$c->query("select adul_count from book_member where book_id='$temp'");
$row4=$res4->fetch_assoc();

?>

<tr align="center">
<td  style="color:black"><?php echo $i++;?></td>
<td  style="color:black"><?php echo $row['book_id'];?></td>
<td  style="color:black"><?php echo $row['first_name'];?></td>
<td  style="color:black"><?php echo $row['last_name'];?></td>
<td  style="color:black"><?php echo $row['dest'];?></td>
<td  style="color:black"><?php echo $row2['hotel_name'];?></td>
<td  style="color:black"><?php echo $row['s_count'];?></td>
<td  style="color:black"><?php echo $row['d_count'];?></td>
<td  style="color:black"><?php echo $row['m_count'];?></td>
<td  style="color:black"><?php echo $row['no_of_days'];?></td>
<td  style="color:black"><?php echo $row3['vehicle_type'];?></td>
<td  style="color:black"><?php echo $row['no_of_vehicle'];?></td>
<td  style="color:black"><?php echo $row4['adul_count'];?></td>
<td  style="color:black"><?php echo $row['booked_date'];?></td>
<td  style="color:black"><?php echo $row['price'];?></td>
<td  style="color:black"><?php echo $row['time_booking'];?></td>

</tr>
<?php
}}
else{
echo "<h1>
NO BOOKING HISTORY
</h1>";
}	
?>
</table>
</div>
</div>

	
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br> 


	<div class="copyw3-agile"> 
		<div class="container">
			<p>All rights reserved | Design by <a href="https://vacxcursion.herokuapp.com">vacXcursion</a></p>
		</div>
	</div>
	<!-- //footer --> 
	<!-- cart-js -->
	<!-- //Owl-Carousel-JavaScript -->  
	<!-- start-smooth-scrolling -->
	<script src="js/SmoothScroll.min.js"></script>  
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>	
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->	  
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<script src="js/bootstrap.js"></script>
</body>
</html>
