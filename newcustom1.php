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
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">

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
								<a href="login.html"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
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
	
	<div class="login-page about">
	  <div class="container">
				<h3 class="w3ls-title w3ls-title1"><u><b>Details</b></u></h3>  
        <div class="login-agileinfo">
<?php require_once('conn.php');
Include_once('classhotel.php');
Include_once('conn.php');
Include_once('user.php');

    if(isset($_GET['sub']))
    {
		$sc = $_GET['noofsingle'];
 		$dc = $_GET['noofdouble'];
 		$mc = $_GET['noofmini'];
		$hotelname = $_GET['listofhotel'];
		$did = $_GET['sub'];

		$pid = $_GET['pi'];
		$pkgprice = $_GET['pr'];
		
		$customizedprice = 0;
		
		$vtype = $_GET['vtype'];
		$nov = $_GET['nov'];
		
		$hotelchoice = $_GET['wanth']; 
		$vehiclechoice = $_GET['wantv'];
			    
	    $hotelarray = array('noofsingle' => $sc,'noofdouble' => $dc,'noofmini' => $mc,'did' => $did,'hotelname'=>$hotelname);
	    
	    $vehiclearray = array('vtype' => $vtype,'nov' => $nov,'did'=>$did);

	    $ob = new user;
	    
	    $hid = $ob->gethotelId ($hotelname,$did);
	    $vid = $ob->getVehicleId($vtype,$did);
       # echo "hotel".$hid;
        #echo " veererv ".$vid;
        $noofdays = $ob->getNoDaysInPkg($pid); 
        
       # echo "<br/><br/>".$hid."<br/><br/>"; 
        #echo "<br/><br/>".$hid."<br/><br/>";
       # echo "<br/><br/>".$hid."<br/><br/>";
	   
	    if($hotelchoice !='yes' && $vehiclechoice !='yes')
	    {
	      echo "<script>alert('no change')</script>";
	      echo "<script>window.open('customized.php?did=$did&pid=$pid&price=$pkgprice','_self')</script>";	
	    }
	    else if($hotelchoice =='yes' && $vehiclechoice !='yes')
	    {
                if($sc <=0 && $dc <= 0 && $mc <= 0)
                {
                	 
     			 echo "<script>alert('select at least one room')</script>";
                  echo "<script>window.open('customized.php?did=$did&pid=$pid&price=$pkgprice','_self')</script>";
                }
                else
                {?>

			
	
	
	        <h2><u>Hotel Name</u></h2><h3><br>&nbsp&nbsp&nbsp<?php
				echo $hotelname;?></h3>
				<div>
							<?php
							 
							 $updatedhotelprice = $ob->CustomHotel($hotelarray);

							  $noofdays = $ob->getNoDaysInPkg($pid); 
							  $priceperdayv = $ob->getVehiclePriceInPkg($pid);
							  
							 # $customizedprice = 500 + ($noofdays * $updatedhotelprice);
							
 			$customizedprice = (500 + ($noofdays * $priceperdayv))+($noofdays * $updatedhotelprice);
			# echo "<br><br><br>"."updatedprice".$customizedprice."<br><br>";
							 
							  #updated new package price

							  
							}  	           
					}
						   else if($hotelchoice !='yes' && $vehiclechoice =='yes') 
						   {   
							 
							 #echo "<br><br>"."condition 2"."<br><br>"; 
							 
							# echo $vtype;
							 
							 $noofdays = $ob->getNoDaysInPkg($pid); 
							 $priceperdayv = $ob->getVehiclePriceInPkg($pid);

							 $updatedvehicleprice = $ob->CustomVehicle($vehiclearray);
							  
							 
							 
							 $pkgprice = $pkgprice -($noofdays*$priceperdayv);
							 
							 #$pkgprice is price which coming from view.php

							 $customizedprice = ($nov * $noofdays * $updatedvehicleprice) + $pkgprice;

							 #echo "<br/><br/>";


							 #new package price
							 #echo "<br><br><br>"."updatedprice".$customizedprice."<br><br>";

						  }
						  else
						  {
								

								if($sc <=0 && $dc <= 0 && $mc <= 0)
							   {
								echo "<script>alert('select at least one room')</script>";
							  echo "<script>window.open('customized.php?did=$did&pid=$pid&price=$pkgprice','_self')</script>";

							   }
							   else
							   {

								 $customizedhotelprice = $ob->CustomHotel($hotelarray);
								 $customizedvehicleprice = $ob->CustomVehicle($vehiclearray); 

								 $noofdays = $ob->getNoDaysInPkg($pid); 
								
								 $customizedprice = 500 +($noofdays * $customizedhotelprice)+($noofdays*$customizedvehicleprice*$nov);
							 
								
								 #echo "<br><br><br>"."updatedprice".$customizedprice."<br><br>";
							  }
						  }
						
						if($customizedprice != 0)
						{ ?><br><br>
						<h2><u>Final Price</u></h2><br>	
						&nbsp&nbsp&nbsp
						<h3><?php echo $customizedprice; ?> </h3>	
				 
						<?php }
						 }?>
						 <form action="classpackage2.php" method="get">
							 <input type="hidden" name="date" value="<?php echo $_GET['date'];?>">
								  <input type="hidden" name="pid" value="<?php echo $pid;?>">
								
								  <input type="hidden" name="hid" value="<?php echo $hid;?>">
								  <input type="hidden" name="vid" value="<?php echo $vid;?>">
								  <input type="hidden" name="dest" value="<?php echo $did;?>">
								  <input type="hidden" name="days" value="<?php echo  $noofdays;?>">
								  <input type="hidden" name="nov" value="<?php echo $nov;?>">
								  <input type="hidden" name="scount" value="<?php echo $sc;?>">
								  <input type="hidden" name="dcount" value="<?php echo $dc;?>">
								  <input type="hidden" name="mcount" value="<?php echo $mc;?>">
								   <input type="hidden" name="price" value="<?php echo $customizedprice;?>">
								  <br><br> <input type="submit" name="book" value="Book Now">
						  </form>

	            </div>
	      </div>
	   </div>
	</div>
	  <br>
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
