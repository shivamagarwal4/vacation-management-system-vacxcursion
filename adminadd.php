<!-- This file gives the package adding form to the admin-->
<?php
session_start();
if(!$_SESSION['Username'])
{
	header('location:index1.php');
}
?>

<?php
require_once('conn.php');
require_once('classdest.php');
 ?>
 <!DOCTYPE html>
<html lang="en">
<head runat="server">
 <title>vacXcursion:Add Package</title> 
 <script src="Scripts/jquery-1.4.1-vsdoc.js" type="text/javascript"></script>
    <script src="Scripts/jquery-1.4.1.js" type="text/javascript"></script>
    
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
<SCRIPT language=Javascript>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;
          return true;
       }
       //-->
    </SCRIPT>
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
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Add package</li>
	</ol>
	</div>
	<br>
	<div class="login-page about">
	<!--<img class="login-w3img" src="images/img3.jpg" alt=""> -->
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1"><u><b>Add Package</b></u></h3>  
			<div class="login-agileinfo">
			
  <div class="form-group">
  <form action="classadmin.php" method="POST" enctype="multipart/form-data" name="fo" runat="server">
    
 <br>
  <label for="id" id="dest">Choose Destination</label>
  &nbsp&nbsp&nbsp&nbsp&nbsp
  <select class="agile-ltext"  id="2304" name="destname" style="width:100px; height:30px;">
                        <option value="NULL">SELECT</option>
                        <?php  $obj=new Destination;
                               $b=$obj->getdest();
                               for($i=0;$i<count($b);$i++)
                               {
								   ?>
	                              <option value="<?php echo $b[$i];?>"><?php echo $b[$i]; ?></option>
							   <?php } ?>
                        <option value="other">other</option>
						</select>
						<br>
						<br>
						
				        <div id="form1">
						<label for="id"><h3>Enter new destination</h3></label>
						<input class="form-control" type="text" name="destname1" placeholder="name of destination"  pattern="[a-zA-Z]*" />
						<br>
						<h3>Enter Hotel Details </h3>
						<br>
						<label for="id">Enter Hotel name </label>
						<input class="form-control" type ="text" name="hotel" placeholder="Hotel Name" pattern="[a-zA-Z ]*"  />
						<br>
						<label for="id">Enter Hotel type</label> &nbsp &nbsp &nbsp
                        <select class="agile-ltext"  name="hoteltype" style="width:100px; height:30px;">
                        <option value="NULL">SELECT</option>
						<option value="2">two star</option>
                        <option value="3">three star</option>
						<option value="4">four star</option> 
						<option value="5">five star</option>
						</select>
						<br>
						<br>
						
                        <label for="id">Enter Number of single rooms </label> &nbsp &nbsp &nbsp
						<input input class="form-control" type ="number" min="0" name="snr" placeholder="" >
	                    <br>
						
						<label for="id">Price of a single room/day </label>&nbsp &nbsp &nbsp
						<INPUT class="form-control" id="txtChar" onkeypress="return isNumberKey(event)" 
           type="text" name="psnr">
						
						<br>
						
						<label for="id">Enter Number of double rooms </label>&nbsp &nbsp &nbsp
						<input input class="form-control" type ="number" min="0" name="dnr" placeholder="" >
						<br>
						<label for="id">Price of a double room/day </label> &nbsp &nbsp &nbsp
						<INPUT class="form-control" id="txtChar" onkeypress="return isNumberKey(event)" 
           type="text" name="pdnr">
						 <br>
						
						<label for="id">Enter Number of minisuites </label> &nbsp &nbsp &nbsp
						<input input class="form-control" type ="number" min="0" name="mns" placeholder="" >
						<br>
						<label for="id">Price of a minisuite/day </label> &nbsp &nbsp &nbsp
						<INPUT class="form-control" id="txtChar" onkeypress="return isNumberKey(event)" 
           type="text" name="pmns">
						
						<br>
						<label for="id">Contact Details: </label> &nbsp &nbsp &nbsp
						<INPUT class="form-control" maxlength="10" pattern="^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$" 
           type="text" name="hcon" placeholder="9876543210">
						<br>
						<br>
					    <h3> Enter Vehicle Details </h3><br>
						<label for="id">Enter Number of Scooty </label> &nbsp &nbsp &nbsp
						<input input class="form-control" type ="number" min="0" name="tsnr" placeholder=""  >
	                    <br>
						<label for="id">Price of a scooty/day </label> &nbsp &nbsp &nbsp
						<INPUT class="form-control" id="txtChar" onkeypress="return isNumberKey(event)" 
           type="text" name="ctsnr">
						<br>
                        <label for="id">Enter Number of Sedan </label> &nbsp &nbsp &nbsp
						<input input class="form-control"type ="number" min="0" name="tsenr" placeholder="" >
						<br>
						<label for="id">Price of a sedan/day </label> &nbsp &nbsp &nbsp
						<INPUT class="form-control" id="txtChar" onkeypress="return isNumberKey(event)" 
           type="text" name="ctsenr">
						<br>
						<label for="id">Enter Number of SUV </label> &nbsp &nbsp &nbsp
						<input input class="form-control"type ="number" min="0" name="tsuv" placeholder="" >
						<br>
						<label for="id">Price of a SUV/day </label> &nbsp &nbsp &nbsp
						<INPUT class="form-control" id="txtChar" onkeypress="return isNumberKey(event)" 
           type="text" name="ctsuv">
						<br><br>
						<h3> Insert Package Information </h3><br> 
					    <label for="id">Select type of room in package </label> 
						<br>&nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp
<select name="typeroom[]" multiple="multiple" size="3"> &nbsp &nbsp &nbsp
<option value="Null" selected>select type of room</option>	
						  <option value="single">Single room</option>
						  <option value="double">Double room</option>
						  <option value="minisuite">Minisuite</option>
						</select>
						<br>
						<br>
						
						<label for="id">Select type of vehicle in package </label> &nbsp &nbsp &nbsp
						<select name="typevehicle">
						<option value="scooty">Scooty</option>
						<option value="Sedan">Sedan</option>
						<option value="SUV">SUV</option>
						</select>
						<br>
						<br>
						<label for="id">Enter number of days in package</label> &nbsp &nbsp &nbsp
						<input class="form-control" class="form-control" name="day" type="number" min="2" >
						
						<br><label for="id">Upload Image</label> &nbsp &nbsp &nbsp
						<input class="form-control" type="file" name="foto" accept=".jpg,.png,.jpeg">
						<br>
						

						
	</div>
	<div id="form2">
	<label for="id" id="dest">Choose Hotels </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<select class="agile-ltext"  id="hchoose" name="ehname" style="width:100px; height:30px;">
                        
						</select><br><br>
						
						<div id="form2nh">
						<h3>Enter Hotel Details </h3>
						<br>
						<label for="id">Enter Hotel name </label>
						<input class="form-control" type ="text" name="hotel1" placeholder=""  pattern="[a-zA-Z ]*"/>
						<br>
						<label for="id">Enter Hotel type</label> &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp
                        <select class="agile-ltext"  name="hoteltype1" style="width:100px; height:30px;">
                        <option value="NULL">SELECT</option>
						<option value="2">two star</option>
                        <option value="3">three star</option>
						<option value="4">four star</option> 
						<option value="5">five star</option>
						</select>
						<br>
						<br>
                        <label for="id">Enter Number of single rooms </label> &nbsp &nbsp &nbsp
						<input class="form-control" type ="number"  min="0" name="snr1" placeholder="" >
	                    <br>
						<br>
						<label for="id">Price of a single room/day </label>&nbsp &nbsp &nbsp
						<INPUT class="form-control" id="txtChar" type="text" name="psnr1">
						<br>
						<br>
                        <label for="id">Enter Number of double rooms </label>&nbsp &nbsp &nbsp
						<input class="form-control" type ="number" min="0" name="dnr1" placeholder="" >
						<br>
						<br>
						<label for="id">Price of a double room/day </label> &nbsp &nbsp &nbsp
						<INPUT class="form-control" id="txtChar" type="text" name="pdnr1">
	                    <br>
						<br>
						<label for="id">Enter Number of minisuites </label> &nbsp &nbsp &nbsp
						<input class="form-control" type ="number" min="0" name="mns1" placeholder="" >
						<br>
						<br>
						<label for="id">Price of a minisuite/day </label> &nbsp &nbsp &nbsp
						<INPUT class="form-control" id="txtChar" type="text" name="pmns1">
						<br>
						<br>
						<label for="id"> Enter Contact Number: </label> &nbsp &nbsp &nbsp
						<INPUT class="form-control" maxlength="10" pattern="^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$" type="text" name="hcon1">
						
						<br><br>
						<br>
						<br><h3> Insert package information </h3> <br>
					    <label for="id">select type of room in package </label> 
						<br><select name="typeroom1[]" multiple="multiple" size="3"> &nbsp &nbsp &nbsp
<option value="Null" selected>select type of room</option>							  
<br><br><option value="single">Single room</option>
						  <option value="double">Double room</option>
						  <option value="minisuite">Minisuite</option>
						</select>
						<br>
						<br>
						<label for="id">Select type of vehicle in package </label> &nbsp &nbsp &nbsp
						<select name="typevehicle1">
						<option value="scooty">Scooty</option>
						<option value="Sedan">Sedan</option>
						<option value="SUV">SUV</option>
						</select>
						<br>
						<br>
						<label for="id">Enter no of days in package </label> &nbsp &nbsp &nbsp
						<input class="form-control" name="day1" placeholder="...." type="number" min="2" >
						<br>
						<label for="id">Upload Image</label> &nbsp &nbsp &nbsp
						<input class="form-control"type="file" name="foto1" accept=".jpg,.png,.jpeg">
						<br>
						
						
						
						
						</div>
						<div id="form2eh">
						<br><h3> Insert Package Infomation </h3> <br>
					    <label for="id">Select type of room in package </label>
						<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<select name="typeroom2[]" multiple="multiple" size="3"><br> 
                                                   <option value="Null" selected>select type of room</option>	
						  <option value="single">Single room</option>
						  <option value="double">Double room</option>
						  <option value="minisuite">Minisuite</option>
						</select>
						<br>
						<br>
						<label for="id">Select type of vehicle in package </label> &nbsp &nbsp &nbsp
						<select name="typevehicle2">
						<option value="scooty">Scooty</option>
						<option value="Sedan">Sedan</option>
						<option value="SUV">SUV</option>
						</select>
						<br>
						<br>
						<label for="id">Enter no of days in package </label> &nbsp &nbsp &nbsp
						<input class="form-control" min="2" name="day2" placeholder="...." type="number"  >
<br>
						<label for="id">Upload Image</label> &nbsp &nbsp &nbsp
						<input class="form-control"type="file" name="foto2" accept=".jpg,.png,.jpeg">
						<br>
						
						
</div>					
	</div>
	<br><br>
  <button type="submit" class="btn btn-default" name="add">Submit</button>
  </div>
</form>



  	<script>
  
    $(document).ready(function(){
		
		$("#form2eh").hide();
		$("#form2nh").hide();
		$("#form1").hide();
		$("#form2").hide();
		
		
		$("#2304").change(function(){
			$.post("submit.php", 
			{fname: $(this).val()}, 
			function(data){
				$('#hchoose').html(data);
			}
		);
			if($(this).val()=='NULL')
			{
				$("#form1").hide();
		$("#form2").hide();
			}
		if(($(this).val()=='other')&& ($(this).val()!='NULL'))
		{
			$("#form2").hide();
			$('#form1').show();
		}else if(($(this).val()!='NULL')&& ($(this).val()!='other'))
		{
			$('#form1').hide();
			$('#form2').show();
		}
		
		});
		
		
		$("#hchoose").click(function(){
			if($(this).val()=='NULL')
			{
				$("#form2nh").hide();
				$("#form2eh").hide();
		
			}
			
			if($(this).val()=='hother'&& ($(this).val()!='NULL'))
			{
        $("#form2nh").show();
		$("#form2eh").hide();
			}
			else if(($(this).val()!='NULL')&& ($(this).val()!='hother'))
		{
			$('#form2nh').hide();
			$('#form2eh').show();
		}
				});
	});
  
  </script>
  
	  
			
  
  	

		</div></div>
	</div>
	<!-- //banner -->   
	
	<br><br><br><br><br><br><br><br>
	<div class="copyw3-agile"> 
		<div class="container">
			<p>All rights reserved | Design by <a href="https://vacxcursion.herokuapp.com">vacXcursion</a></p>
		</div>
	</div>
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
	<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<script src="js/bootstrap.js"></script>
</body>
</html>