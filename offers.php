<!DOCTYPE html>
<?php include_once('conn.php'); 
include_once('classpackage.php');
require_once('classhotel.php');
require_once('classvehicle.php');
$packobj=new Package;
$b=array();
$b=$packobj->getoffer();
?>

<html lang="en">
<head>
<title>vacXcursion:Offers</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">  
<link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons --> 
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
	<div class="banner about-w3bnr">
		<!-- header -->
		<div class="header">
			<div class="w3ls-header"><!-- header-one --> 
				<div class="container">
					<div class="w3ls-header-right">
						<ul> 
							<li class="head-dpdn">
								<i class="fa fa-phone" aria-hidden="true"></i> Call us: +8893791709
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
							<img src="log.png" alt="logo" >
						</div> 
						<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="index.php">Home</a></li>	
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
				<h2>Travel... <br> <span>Along with us.</span></h2> 
			</div>
		</div>
	</div>
	<!-- //banner -->    
	<!-- breadcrumb -->  
	<div class="container">	
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="index1.php"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Offers</li>
		
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- offers-page -->
	<div class="offers about"> 
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Our New Offers</h3>  
		</div>
	</div>
			<!-- //banner -->   
	<!-- add-products -->
	
		<div class="products">	 
		<div class="container">
		<div class="clearfix"> </div>
				</div>
				<?php for($k=0;$k<$b[1];$k++)
                  {
					  $packid=$b[0][$k][0];
	                ?>
				<div class="products-row">
					<div class="col-sm-6 col-sm-4 product-grids">
						<div class="flip-container">
							<div class="flipper agile-products">
								<div class="front"> 
								  <img src="<?php echo $b[0][$k][8]?>" class="img-responsive" alt="img">
									<div class="agile-product-text">              
										<h5>Destination:<?php echo $b[0][$k][1]?></h5>  
									</div>
								</div>
								<div class="back">
									<h4><?php $hid= $b[0][$k][2];
									$hotelobj=new Hotel;
									$y=array();
									$y=$hotelobj->gethotelDetails($hid);
									$star=$y[0][3];
									echo $y[0][2].'<br>';?> <img src="images/star<?php echo $star?>.png" width="75" height="20">
									</h4>
								    <p><?php $vid= $b[0][$k][3];
									$vehicleobj=new Vehicle;
									$x=array();
									$x=$vehicleobj->getvehicleDetails($vid);?>Vehicle in package:
									<?php echo $x[0][2];?></p>
									<p><?php echo $b[0][$k][7]?> Nights and <?php echo $b[0][$k][6]?> Days.</p>
								   <p><?php echo $b[0][$k][5]?></p>
									 <a href="#" data-toggle="modal" data-target="#<?php echo $packid?>">View Details</a>
									  
									
								</div>
							</div>
						</div> 
						<br>
					<br>
					<br>
					<br>
					<br>
					</div> 
					<div class="modal video-modal fade" id="<?php echo $packid?>" tabindex="-1" role="dialog" aria-labelledby="myModal1">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
				</div>
				<section>
		 <div class="row equal">
          <div class="col-xs-6 col-sm-4">
         </div>
		 <div class="col-xs-6 col-sm-4">
        <h3>Details of package </h3>
		<br>
		<br>
		<h4><?php echo $b[0][$k][6]?> days and <?php echo $b[0][$k][7]?> nights package</h4>
		<br>
	    <h4>Destination Name:&nbsp <?php echo $b[0][$k][1]?></h4>
		<br>
		<h4>Hotel Name:&nbsp <?php echo $y[0][2]?></h4>
		<br>
		<h4>Rooms in package:&nbsp <?php $a=array();
		 $a=$packobj->getpackage_room($packid);?>
		  <?php if($a[0][1]!=0) {echo $a[0][1]." "."Single Room"."<br>";}?>
		  <?php if($a[0][2]!=0) {echo $a[0][2]." "."Double Room"."<br>";}?>
		  <?php if($a[0][3]!=0) {echo $a[0][3]." "."Mini Suite"."<br>";}?>
		  </h4>
		<br>  
        <h4>Contact Number:&nbsp <?php echo $y[0][4]?></h4>		 
		<br>
		<h4> vehicle included: <?php echo $b[0][$k][4]." ". $x[0][2];?> </h4>		 
		<br>
		<h4>Worth:&nbsp Rs &nbsp<?php echo $b[0][$k][5]?>/-</h4>	
        <br>
		
		<br>
		<br>
		
	 </div>
    <div class="col-xs-6 col-sm-4">
      </div>
     </div>
	
	</div>
	</div>
	</div>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$(document).ready(function(){
		
		$("#<?php echo $k?>").hide();
		$("#<?php echo $packid ?>").hide();
	$("#bu<?php echo $k ?>").click(function(){
			$("#<?php echo $k?>").show();
			});
			$( function() {
    $( "#datepicker<?php echo $k?>" ).datepicker();
  } );
  $("#view").click(function(){
        $("#<?php echo $packid?>").show();
        });
		
		
	});
		</script>
			<?php }
                
				
				  ?>
					<div class="clearfix"> </div>
				</div>
		 <div class="clearfix"> </div> 
	</div>
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
						<h5>Search Destination</h5>
						<span>1</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids"> 
					<div class="order-w3text"> 
						<i class="" aria-hidden="true"></i> 
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
				<div class="clearfix"> </div><br><br><br>
			<div class="copyw3-agile"> 
		<div class="container">
			<p>All rights reserved | Design by <a href="https://vacxcursion.herokuapp.com">vacXcursion</a></p>
		</div>
	</div>
	<!-- //footer -->
	<!-- cart-js -->
	
	
    </script>  
	<!-- //cart-js -->	
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
