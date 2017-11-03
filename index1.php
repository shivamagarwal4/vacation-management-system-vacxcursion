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
								<a href="login.html"><i class="fa fa-sign-in" aria-hidden="true"></i>Administrator Login</a>
							</li>
							<?php
								error_reporting(E_ALL);
								include_once("glogin/config.php");
								include_once("glogin/includes/functions.php");

								if(isset($_REQUEST['code'])){
									$gClient->authenticate();
									$_SESSION['token'] = $gClient->getAccessToken();
									header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
								}

								if (isset($_SESSION['token'])) {
									$gClient->setAccessToken($_SESSION['token']);
								}

								if ($gClient->getAccessToken()) {
									echo "<script>alert('i got access token ');</script>";
									$userProfile = $google_oauthV2->userinfo->get();
									//DB Insert
									$gUser = new Users();
									$gUser->checkUser('google',$userProfile['id'],$userProfile['given_name'],$userProfile['family_name'],$userProfile['email'],$userProfile['gender'],$userProfile['locale'],$userProfile['link'],$userProfile['picture']);
									$_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
										header("location: account.php");
									$_SESSION['token'] = $gClient->getAccessToken();
								} else {
									$authUrl = $gClient->createAuthUrl();
								}

								if(isset($authUrl)) {
									echo '<li><a href="'.$authUrl.'">Login with Google</a></li>';
								} else {
									echo '<a href="logout.php?logout">Logout</a>';
								}

								?>
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
				<div class="agileits_search">
					<form action="index1.php" method="GET">
					<input name="destination" type="text" placeholder="Enter Destination Name" > 
						<select id="agileinfo_search" name="agileinfo_search" >
						<option value="">Enter budget </option>
							<?php 
							  class Budget extends Connect{
								public function display()
								{								
								  $x=new Connect;
							      $sql = "SELECT * FROM budget";
								  $c= $x->getconnect();
		                          $result = $c->query($sql);
								  if ($result->num_rows > 0) {
								  while($row = $result->fetch_assoc()) 
								  {
									 ?>
								    <option value="<?php echo $row['price']?>">within &nbsp &nbsp<?php echo $row['price']; ?></option>
								    <?php 
								  }
								  }
								  }
							      }
								  $obj=new Budget;
								  $obj->display();
								  ?>
							
						   </select>
						<input type="submit" name="vsub" value="Search">
					</form>
				</div> 
			</div>
		</div>
	</div>
	

	
	
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<div class="wthree-order">  
		
		<div class="container">
			<h3 class="w3ls-title">How To book package online </h3>
			<p class="w3lsorder-text">Get to your favourite destination in just 4 steps.</p>
			<div class="order-agileinfo">  
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids"> 
					<div class="order-w3text"> 
						<i class="fa fa-map" aria-hidden="true"></i> 
						<h5>Search Area</h5>
						<span>1</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids"> 
					<div class="order-w3text"> 
						 
						<h5>Choose Package</h5>
						<span>2</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids"> 
					<div class="order-w3text"> 
						<i class="fa fa-credit-card" aria-hidden="true"></i>
						<h5>confirm booking</h5>
						<span>3</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids"> 
					<div class="order-w3text"> 
						<i class="fa fa-truck" aria-hidden="true"></i>
						<h5>just travel</h5>
						<span>4</span>
					</div>
				</div>
				<div class="clearfix"> </div> 
			</div>
		</div>
	</div>
	<!-- //order -->   <br>
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
<?php
if(isset($_GET['vsub']))
{
	$a=$_GET['agileinfo_search'];
	$b=$_GET['destination'];
	if($_GET['agileinfo_search'] or $_GET['destination'])
	{
		echo "<script>window.open('view.php?destination=$b&agileinfo_search=$a','_self')</script>";
	}
	else
	{
		echo "<script>alert('Enter some Field')</script>";
	}
}
?>