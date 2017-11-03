<!-- This file is for choosing the destination for which the admin can delete the package-->
<?php
session_start();
if(!$_SESSION['Username'])
{
	header('location:index1.php');
}
?>
<?php include('conn.php');
require_once('classdest.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>vacXcursion:Delete Package</title> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=" Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
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
			<li class="active">Delete Packages</li>
		</ol>
	</div>
	<div class="delete page about">
	<!--	<img class="login-w3img" src="images/img3.jpg" alt=""> -->
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Delete Package</h3>  
			<div class="login-agileinfo">
			
  <div class="form-group">
  <form action="deletepackage.php" method="GET" enctype="multipart/form-data" name="fo">
    
 <br>
  <label for="id">Choose Destination</label>
  &nbsp&nbsp&nbsp&nbsp&nbsp
  <select class="agile-ltext"  id="2304" name="destination" style="width:100px; height:30px;">
                        <option value="NULL">SELECT</option>
                        <?php  $obj=new Destination;
                               $b=$obj->getdest();
                               for($i=0;$i<count($b);$i++)
                               {
								   ?>
	                              <option value="<?php echo $b[$i];?>"><?php echo $b[$i]; ?></option>
							   <?php } ?>
                       
						</select>
<br><br>
  <input type="hidden" name="price" value="">
  <button type="submit" class="btn btn-default" >List Packages</button>
  </div>
</form>
</div></div></div>
	<!-- //banner -->   
	<div class="wthree-order">  
		<!--<img src="images/i2.jpg" class="w3order-img" alt=""/>-->
		<div class="container">
			
		</div>
	</div>
	
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
	<script src="js/minicart.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) { 
        		}
        	}
        });
    </script>  
	<!-- //cart-js -->	
	<!-- Owl-Carousel-JavaScript -->
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel ({
				items : 3,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
			});
		});
	</script>
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
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>