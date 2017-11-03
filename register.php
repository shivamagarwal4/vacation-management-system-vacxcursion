<?php
session_start();
?>
<?php
include_once('conn.php');
include_once('classhotel.php');
include_once('classvehicle.php');
include_once('user.php');
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
        <h1>Fill out your details!!</h1>
    </div>
     
    <div class="container">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">
                    <i class="glyphicon glyphicon-user"></i></a>    
                </div>
                </div>
        </div>
<div class="row setup-content" id="step-1">
		 <div class="col-xs-12">
                <div class="col-md-12">
                    <h3>Personal Info</h3>
                        <div class="col-md-6">
                            <div class="form-group">
							<form action="detail.php" method="GET">
                                <label class="control-label">First Name</label>
                                <input  maxlength="100" name="first" type="text" required placeholder="Enter First Name" class="form-control"   />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Last Name</label>
                                <input  maxlength="10"name="last" type="text"  placeholder="Enter Last Name"class="form-control"   />
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Contact Number</label>
                                <input  maxlength="10" type="text" pattern="^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$" name="contact" required="required" class="form-control" placeholder="contact"  />
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Email Address</label>
                                <!--<input  maxlength="10" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="required" class="form-control" placeholder="Email"  />-->
<?php
echo $_SESSION['google_data']['email'];?>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Book Date</label>
                                <!--<input  maxlength="10" type="text" required="required"  class="form-control" placeholder="$_GET['date']"  />-->
								<?php echo $_GET['date'];?>
                            </div>
                        </div>
						<div class="col-md-6">.</div>
						<div class="col-md-6">.</div>
						<div class="col-md-6">.</div>
						<div class="col-md-6">.</div>
                        <br>
                        <br>
                        <h3>Address Details</h3>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Street Adress</label>
                                <input  maxlength="100" type="text" required="required" name="street" class="form-control" placeholder="Enter Address"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">City</label>
                                <input  maxlength="40" type="text" required="required" name="city" class="form-control" placeholder="Enter City"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Pin Code</label>
                                <input  maxlength="6" type="text" pattern="^([0-9]{6})$" required="required" name="pin" id="txtChar" onkeypress="return isNumberKey(event)"  class="form-control" placeholder="Enter Pin Code"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">State</label>
                                <input  type="text"  required="required" name="state" class="form-control" placeholder="Enter State"  />
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Country</label>
                                <input  type="text"name="country"  required="required" class="form-control" placeholder="Enter Country"  />
                            </div>
                        </div>
							<div class="col-md-6">.</div>
						<div class="col-md-6">.</div>
						<div class="col-md-6">.</div>
						<div class="col-md-6">.</div>
                        <h3>Passengers Travelling</h3>
                        <div class="col-md-6">
                            <div class="form-group">
<?php $maxadul= (($_GET['scount']*1)+($_GET['dcount']*2)+($_GET['mcount']*2)); ?>
                                <label class="control-label">Number Of Adults</label>
                                <input  type="number" min="1" max="<?php echo $maxadul ?>" value="1" required="required"name="noa" class="form-control" placeholder="No. of adults"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
<?php $maxchild= (($_GET['scount']*0)+($_GET['dcount']*1)+($_GET['mcount']*2)); ?>
                                <label class="control-label">Number Of Children</label>
                                <input  type="number" required="required" min="0"  max="<?php echo $maxchild?>" value="0" name="noc" class="form-control" placeholder="No. of children"  />
								<input type="hidden" name="bookeddate" value="<?php echo $_GET['date'];?>">
								<input type="hidden" name="email" value="<?php echo $_SESSION['google_data']['email'];?>">
								<input type="hidden" name="bookid" value="<?php echo $_GET['bookid'];?>">
								<input type="hidden" name="hid" value="<?php echo $_GET['hid'];?>">
								<input type="hidden" name="vid" value="<?php echo $_GET['vid'];?>">
								<input type="hidden" name="dest" value="<?php echo $_GET['dest'];?>">
								<input type="hidden" name="nov" value="<?php echo $_GET['nov'];?>">
								<input type="hidden" name="dcount" value="<?php echo $_GET['dcount'];?>">
								<input type="hidden" name="scount" value="<?php echo $_GET['scount'];?>">
								<input type="hidden" name="mcount" value="<?php echo $_GET['mcount'];?>">
                            </div>
                        </div>
                    </div>
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
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" name="info">Next</button> 
					</form>
                </div>
            </div>
        </div>
      </body>
</html>
