<?php
include_once('conn.php');
include_once('classhotel.php');
include_once('classvehicle.php');
include_once('user.php');
$userobj= new User;
echo $_GET['contact'];
$userobj->insertdetails($_GET['email'],$_GET['first'],$_GET['last'],$_GET['contact'],$_GET['bookid'],$_GET['bookeddate'],$_GET['street'],$_GET['city'],$_GET['state'],$_GET['country'],$_GET['pin'],$_GET['noa'],$_GET['noc']); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>VacXcursion booking</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>
<style type="text/css">
        
    @import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700);
    body {
      margin:40px;
        font-family: 'Roboto Condensed', sans-serif;
        background-color: #16A085;
    
        }
 
        .head {
        color: #ECF0F1;
        margin-bottom: 40px;
    }

    .container  {
        background-color: #ECF0F1;
        padding: 30px;
    }

    .stepwizard-step p {
        margin-top: 10px;   
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;     
        width: 100%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        background: #888;
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .stepwizard-row:before {
        top: 50px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 3px;
        background-color: #BDC3C7;
        z-order: 0;
        
    }

    .stepwizard-step {    
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .stepwizard-step p {
        margin-top:10px;
        
    }



    .btn-success .glyphicon {
        color: #fff;
        
        font-size: 40px;
    }

    .btn-circle {
      width: 100px;
      height: 100px;
      text-align: center;
      padding: 25px 25px;
      font-size: 40px;
      line-height: 1.428571429;
      border-radius: 50px;
      
      
    }

    /* 
    // Listrap v1.0, by Gustavo Gondim (http://github.com/ggondim)
    // Licenced under MIT License
    // For updates, improvements and issues, see https://github.com/inosoftbr/listrap
    */

    .listrap {
                list-style-type: none;
                margin: 0;
                padding: 0;
                cursor: default;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .listrap li {
                margin: 0;
                padding: 10px;
            }

            .listrap li.active, .listrap li:hover {
                background-color: #d9edf7;
            }

            .listrap strong {
                margin-left: 10px;
            }

            .listrap .listrap-toggle {
                display: inline-block;
                width: 60px;
                height: 60px;
            }

            .listrap .listrap-toggle span {
                background-color: #428bca;
                opacity: 0.8;
                z-index: 100;
                width: 60px;
                height: 60px;
                display: none;
                position: absolute;
                border-radius: 50%;
                text-align: center;
                line-height: 60px;
                vertical-align: middle;
                color: #ffffff;
            }

            .listrap .listrap-toggle span:before {
                font-family: 'Glyphicons Halflings';
                content: "\e013";
            }

            .listrap li.active .listrap-toggle span {
                display: block;
            }
    }



    .dropdown.dropdown-lg .dropdown-menu {
        margin-top: -1px;
        padding: 6px 20px;
    }
    .input-group-btn .btn-group {
        display: flex !important;
    }
    .btn-group .btn {
        border-radius: 0;
        margin-left: -1px;
    }
    .btn-group .btn:last-child {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        
    }
    .btn-group .form-horizontal .btn[type="submit"] {
      border-top-left-radius: 4px;
      border-bottom-left-radius: 4px;
    }
    .form-horizontal .form-group {
        margin-left: 0;
        margin-right: 0;
    }
    .form-group .form-control:last-child {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }



    @media screen and (min-width: 768px) {
        #adv-search {
            width: 500px;
            
        }
        .dropdown.dropdown-lg {
            position: static !important;
        }
        .dropdown.dropdown-lg .dropdown-menu {
            min-width: 500px;
        }
    }

    .panel-pricing {
      -moz-transition: all .3s ease;
      -o-transition: all .3s ease;
      -webkit-transition: all .3s ease;
    }
    .panel-pricing:hover {
      box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.7);
    }
    .panel-pricing .panel-heading {
      padding: 20px 10px;
    }
    .panel-pricing .panel-heading .fa {
      margin-top: 10px;
      font-size: 58px;
    }
    .panel-pricing .list-group-item {
      color: #777777;
      border-bottom: 1px solid rgba(250, 250, 250, 0.5);
    }
    .panel-pricing .list-group-item:last-child {
      border-bottom-right-radius: 0px;
      border-bottom-left-radius: 0px;
    }
    .panel-pricing .list-group-item:first-child {
      border-top-right-radius: 0px;
      border-top-left-radius: 0px;
    }
    .panel-pricing .panel-body {
      background-color: #f0f0f0;
      font-size: 40px;
      color: #777777;
      padding: 20px;
      margin: 0px;
    }

    </style>
        <script type="text/javascript">
            $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                    $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });

    // Listrap v1.0, by Gustavo Gondim (http://github.com/ggondim)
    // Licenced under MIT License
    // For updates, improvements and issues, see https://github.com/inosoftbr/listrap

    jQuery.fn.extend({
        listrap: function () {
            var listrap = this;
            listrap.getSelection = function () {
                var selection = new Array();
                listrap.children("li.active").each(function (ix, el) {
                    selection.push($(el)[0]);
                });
                return selection;
            }
            var toggle = "li .listrap-toggle ";
            var selectionChanged = function() {
                $(this).parent().parent().toggleClass("active");
                listrap.trigger("selection-changed", [listrap.getSelection()]);
            }
            $(listrap).find(toggle + "img").on("click", selectionChanged);
            $(listrap).find(toggle + "span").on("click", selectionChanged);
            return listrap;
        }
    });
    $(document).ready(function () {
        $(".listrap").listrap().on("selection-changed", function (event, selection) {
            console.log(selection);
        });
    });
        </script>

</head>
    <body>


    <div class="head">
        <h1>Booking Details</h1>
    </div>
     
    <div class="container">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">
                    <i class="glyphicon glyphicon-plus"></i></a>    
                </div>
               
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">
                    <i class="glyphicon glyphicon-ok"></i></a> 
                </div>
                
            </div>
        </div>
		</div>
<div class="row setup-content" id="step-1">
    <div class="col-xs-12">
    <div class="col-md-12">
                <div class="container">
				<div>
					<div class="row">
                        <div class="col-md-6">
							<h3>DETAILS OF PACKAGE</h3>
										  <div class="row">
										  <div class="col-md-6"><h4>Booking ID:&nbsp &nbsp<?php echo $_GET['bookid']?></h4></div>
										  <div class="col-md-6"></div></div>
										  <div class="row">
										   <div class="col-md-6"><h4>Destination name:&nbsp &nbsp<?php echo $_GET['dest']?></h4></div>
										  <div class="col-md-6"></div></div>
										  <div class="row">
										  <?php $hotelobj=new Hotel;
										  $y=array();
										     $y= $hotelobj->gethotelDetails($_GET['hid']);
											 $star=$y[0][3];?>
											 
										  <div class="col-md-6"><h4>Hotel Name:<?php echo $y[0][2]?></h4></div><br>
										 <div class="col-md-6"></div>
										  </div>
										  <div class="row">
										 <div class="col-md-6">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										 <img src="images/star<?php echo $y[0][3]?>.png" width="75" height="20"></div><br>
										 <div class="col-md-6"></div>
										  </div>
									    <div class="row">
										
										<div class="col-md-6"><h4>Rooms in the package:<?php if($_GET['scount']){echo $_GET['scount']."single room"."<br>&nbsp &nbsp &nbsp &nbsp &nbsp&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";} 
										  if($_GET['dcount']){echo $_GET['dcount']."double room"."<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
										  if($_GET['mcount']){echo $_GET['mcount']."mini suite"."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
										 ?>
										  </h4></div>
										<div class="col-md-6"></div>
										</div>
									    <div class="row">
										<div class="col-md-6"><h4>Contact No:<?php echo $y[0][4]?></h4></div>
										</div>
									  <div class="row">
									  <?php  
									$vehicleobj=new Vehicle;
									$x=array();
									$x=$vehicleobj->getvehicleDetails($_GET['vid']);?>
									  <div class="col-md-6"><h4>Vehicle in the package:<?php echo $x[0][2]?></h4></div>
									<div class="col-md-6"></div>
									</div>
									<div class="row">
									  <div class="col-md-6"><h4>Capacity of vehicle:&nbsp &nbsp<?php echo $_GET['nov']?></h4></div>
									<div class="col-md-6"></div>
									</div>
									</div>
									
				 <div class="col-md-6">

                <h3>BOOKING DETAILS</h3>
                    </br>
					<div class="row">
										  <?php $userobj=new User;
										   $x=array();
										   $x=$userobj->getuserdetails($_GET['bookid']);
										  
										  ?>
										  <div class="col-md-6"><h4>First Name:&nbsp &nbsp<?php echo $x[0][1]?></h4></div>
										  <div class="col-md-6"></div></div><div class="row">
										  
										  <div class="col-md-6"><h4>Last Name:&nbsp &nbsp<?php echo $x[0][2]?> </h4></div>
										  <div class="col-md-6"></div></div><div class="row">
										  
										  <div class="col-md-6"><h4>Contact:&nbsp &nbsp<?php echo $x[0][3]?></h4></div>
										  <div class="col-md-6"> </div></di7nbv><div class="row"></div>
										  
										  <div class="col-md-6"><h4>Email:&nbsp &nbsp<?php echo $x[0][0]?></h4></div>
										  <div class="col-md-6"> </div></div><div class="row">
										  
										  <div class="col-md-6"><h4>Booking Date:&nbsp &nbsp<?php echo $x[0][5]?></h4></div>
										  <div class="col-md-6"> </div></div><div class="row">
                                          <?php $y=array();
										  $y=$userobj->getuseraddress($_GET['bookid']);?>
										  <div class="col-md-6"><h4>Street:&nbsp &nbsp<?php echo $y[0][1]?></h4></div>
										  <div class="col-md-6"></div></div><div class="row">
										  
										  <div class="col-md-6"><h4>City:&nbsp &nbsp<?php echo $y[0][2]?></h4></div>
										  <div class="col-md-6"> </div></div><div class="row">
										  
										  <div class="col-md-6"><h4>PIN Code:&nbsp &nbsp<?php echo $y[0][5]?> </h4></div>
										  <div class="col-md-6"></div></div><div class="row">
										  
										  <div class="col-md-6"><h4>State:&nbsp &nbsp<?php echo $y[0][3]?></h4></div>
										  <div class="col-md-6"> </div></div><div class="row">
										  
										  <div class="col-md-6"><h4>Country:&nbsp &nbsp<?php echo $y[0][4]?></h4></div>
										  <div class="col-md-6"></div></div><div class="row">
										  <?php 
										  $z=array();
										  $z=$userobj->getmember($_GET['bookid']);?>
										  <div class="col-md-6"><h4>No. Of Adults:&nbsp &nbsp<?php echo $z[0][1]?></h4></div>
										  <div class="col-md-6"></div></div><div class="row">
										  
										  <div class="col-md-6"><h4>No. Of Children:&nbsp &nbsp<?php echo $z[0][2]?></h4></div>
										  <div class="col-md-6"></div></div></div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" name="sendmail">Next</button> 
					</form>
                </div>
            </div>
        </div>
      </div>
    </div>
	</div>
	</div>
        <div class="row setup-content" id="step-3">
           <div class="col-xs-12">
            <div class="col-md-12">
                <div class="container">
				<div>
					<div class="row">
                   <div class="col-md-6">
							<h3>Congratulations!!!   Package Booked Successfully. Check your Email For confirmation details...</h3>
							<a href="index1.php"> HOME </a>
            </div>
        </div>
    </div>
    </div>
	</div>
	</div>
	</div>

    </body>
</html>