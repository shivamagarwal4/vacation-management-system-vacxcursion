<?php 
Include('classhotel.php');
Include_once('conn.php');
Include_once('user.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>vacXcursion:Add Package</title> 
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
<div class="banner">
		<!-- header -->
		<div class="header">
			<div class="w3ls-header"><!-- header-one --> 
				<div class="container">
					<div class="w3ls-header-left">
						
					</div>
					<div class="w3ls-header-right">
						<ul> 
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
				<h2>Travel......</h2><br> <span><h2>Along with us!!!</h2></span>
				
			</div>
		</div>
	</div>
	<div class="container">	
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Customize packkage</li>
	</ol>
	</div>
	<div class="login-page about">
	<!--<img class="login-w3img" src="images/img3.jpg" alt=""> -->
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1"><u><b>Customize package</b></u></h3>  
			<div class="login-agileinfo">
			<div class="form-group">
					<script src="jquery.min.js"></script>
					<form action="newcustom1.php" method="get" enctype="multipart/form-data" name="fo">
					<h4>Date:<h4> <input type="text" required name="date" id="datepicker">
					<div id="chotel"><br>
<br>
					<h4>Wish to change Hotel<h4><br> <select class="agile-ltext" name="wanth" id="ihotel" style="width:100px; height:30px;">
&nbsp &nbsp &nbsp

					<option value="">select</option>
					<option value="yes">yes</option>
					<option value="no">No</option>
					</select>
					<br>
					<br>
					<div id="listh">

					<?php 
					  $pid= $_GET['pid'];
					  echo "<br>";

						$hl = new Hotel;
						$did = $_GET['did'];

						$price = $_GET['price'];

						$hotels = $hl->showHotelByDest($did);
						echo '<select name="listofhotel" id="loh">';
						for($i = 0;$i < count($hotels);$i++)
						{?>
							 <option value="<?php echo $hotels[$i][2];?>">
							 <?php echo $hotels[$i][2]." ".$hotels[$i][3]." STAR"; ?>
							 </option>
								
						 <?php
						}
						echo '</select>'; 

					?>   
					<div id="roomtype">
					<br>Single Rooms :<input type="number" min="0" max="10" name="noofsingle" value="0">
					<br><br>Double Rooms :<input type="number" min="0" max="10" name="noofdouble" value="0">
					<br><br>Minisuites :<input type="number" min="0" max="10" name="noofmini" value="0">


					</div>

					</div>

					</div>

					<br><br>
					<div id="cvehicle">
					<h4>Want to Include Vehicle</h4><br><select class="agile-ltext" name="wantv" id="itran" style="width:100px; height:30px;">
                    <option value="">select</option>
					<option value="yes">yes</option>
					<option value="no">No</option>
					</select>
					<div id="itran1">
<br>
<br>
					 <h4>select vehicle</h4><select class="agile-ltext" name="vtype" style="width:100px; height:30px;">
					 <option class="agile-ltext" value="SUV">SUV </option>
					 <option class="agile-ltext" value="Sedan">Sedan </option>
					 <option class="agile-ltext" value="Scooty">Scooty</option> 
					 
					 </select>
					 <br>
					 <br>

					<h4>Choose No Of Vehicles :</h4><input type="number" min="0" name="nov" value="0">

					</div>


					</div>
					<div id="sub">
					<input type="hidden" name="did" value="<?php echo $did;?>">
					<input type="hidden" name="pid" value="<?php echo $pid;?>">
					<input type="hidden" name="price" value="<?php echo $price;?>">
					<input type="hidden" name="pi" value="<?php echo $pid;?>" placeholder="<?php echo $pid;?>">
					<input type="hidden" name="pr" value="<?php echo $price;?>" placeholder="<?php echo $price;?>">
<br>
<br>
<br>
					<button class="btn btn-danger" name="sub" value="<?php echo $did;?>">GET PRICE </button>


					</div>
					</form>
<!--new dev for book-->


   <!--   <form action="customized.php" method="get">
      <input type="hidden" name="date" value="<?php echo $_GET['date'];?>">
      <input type="hidden" name="pid" value="<?php echo $pid;?>">
	 <input type="hidden" name="price" value="<?php echo $price;?>">
	  <input type="hidden" name="hid" value="<?php echo $hid;?>">
	  <input type="hidden" name="vid" value="<?php echo $vid;?>">
	  <input type="hidden" name="did" value="<?php echo $did;?>">
	  <input type="hidden" name="days" value="<?php echo  $noofdays;?>">
	  <input type="hidden" name="nov" value="<?php echo $nov;?>">
	  <input type="hidden" name="scount" value="<?php echo $sc;?>">
	  <input type="hidden" name="dcount" value="<?php echo $dc;?>">
	  <input type="hidden" name="mcount" value="<?php echo $mc;?>">
	   <input type="hidden" name="cprice" value="<?php echo $customizedprice;?>">
<input type="submit" name="fsub" value="Book Now">

      </form>
      -->






<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
					<script>
					$(document).ready(function(){
						$( function() {
    $( "#datepicker" ).datepicker({ minDate: 0 });
  } );
						$("#itran1").hide();
						$("#listh").hide();
						$("#roomtype").hide();
						$('#itran').change(function(){
					if($(this).val()=="yes")
					{
					$("#itran1").show();

					}else{
						$("#itran1").hide();
					}

							});
    
$('#ihotel').change(function(){
if($(this).val()=="yes")
{
$("#listh").show();

}else{
    $("#listh").hide();
}

        });

$('#loh').click(function(){
$("#roomtype").show();
	
});

    
});
</script>




<?php
/*if(isset($_GET['fsub']))
{
	echo $_GET['cprice'];
	if($_GET['cprice']!=0)
	{
      
     $ar = array('pid'=>'$pid','hid'=>'$hid','did'=>'$did','vid'=>'$vid','days'=>$noofdays,'nov'=>$nov,'scount'=>$sc,'dcount'=>$dc,'mcount'=>$mc,'price'=>$customizedprice);
     //echo "<script>window.open('classpackage.php?$ar','_self')";
	}
	else
	{
		//echo "<script>alert('First Customize The Package')</script>";
		//echo "<script>window.open('customized.php?did=$did&pid=$pid&price=$price','_self')";
	}
}*/
?>