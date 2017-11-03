<!--This file gives the backend code for inserting the details of the added package to the database-->
<?php
session_start();
require_once('conn.php');
include_once('classdest.php');
date_default_timezone_set('UTC');

class Admin extends Connect{
	private $email_id;
	private $password;
    public function addpackage()
{
   $x=new Connect;
   $c= $x->getconnect();
   $var=$_POST['destname'];
  if($var==='other')	
  {
	$destid=rand(1,9999999);
	$file_get=$_FILES['foto']['name'];
	$roomcount=1;
	$room=$_POST['typeroom'];
			for($i=0;$i<count($room);$i++)
			    {
					if($room[$i]==="Null")
					{
						$roomcount=0;
					}
				}
//echo $_POST['destname1'];
// echo $roomcount;
	if(!$_POST['destname1'] or !$_POST['hotel'] or !$_POST['hoteltype'] or !$_POST['snr'] or !$_POST['psnr'] or !$_POST['dnr'] or !$_POST['pdnr'] or !$_POST['mns']
	or !$_POST['pmns'] or !$_POST['hcon'] or !$_POST['tsnr'] or !$_POST['ctsnr'] or !$_POST['tsenr'] or !$_POST['ctsenr']
	or !$_POST['tsuv'] or !$_POST['ctsuv']  or !$_POST['typevehicle'] or !$_POST['day'] or !$file_get or ($roomcount==0))
	{
		
		echo "<script type='text/javascript'>alert('All fields not added');</script>";
        echo"<script>window.open('adminadd.php','_self')</script>";
	}
	else
	{
		
    $tmp=$_FILES['foto']['tmp_name'];
    $file_to_saved="images/".$file_get;
    move_uploaded_file($tmp,$file_to_saved);
	$destobj= new Destination;
	$dest=$_POST['destname1'];
	$check=$destobj->checkdest($_POST['destname1']);
        
	if($check)		
	{
		$insertdest=$destobj->insertdest($destid,$_POST['destname1']);
	    if($insertdest)
	    {
		     $hotelid=rand(1,9999999);
			 $sql1="insert into hotel values('$hotelid','".$_POST['destname1']."','".$_POST['hotel']."','".$_POST['hoteltype']."','".$_POST['hcon']."');";
			 $res=$c->query($sql1);
			 if($res)
			 {
				if(($_POST['snr']) && ($_POST['dnr']) && ($_POST['mns']))
				{
					$sql2="insert into hotel_room values('$hotelid','single','".$_POST['psnr']."','".$_POST['snr']."')
					,('$hotelid','double','".$_POST['pdnr']."','".$_POST['dnr']."'),
					('$hotelid','minisuite','".$_POST['pmns']."','".$_POST['mns']."');";
					if($c->query($sql2))
					{
						if(($_POST['tsnr']) && ($_POST['tsenr']) && ($_POST['tsuv']))
					    {
						$vehicleid1=rand(5,600);
					    $vehicleid2=rand(700,1000);
						$vehicleid3=rand(1000,2000);
						$sql3="insert into vehicle values('$vehicleid1','".$_POST['destname1']."','scooty','2','".$_POST['ctsnr']."','".$_POST['tsnr']."')
						,('$vehicleid2','".$_POST['destname1']."','sedan','5','".$_POST['ctsenr']."','".$_POST['tsenr']."'),
						('$vehicleid3','".$_POST['destname1']."','SUV','7','".$_POST['ctsuv']."','".$_POST['tsuv']."');";
						if($c->query($sql3))
						{
							$packageid=rand(10000,400000);
							$typrm=$_POST['typeroom'];
							$s=$d=$m=0;
							
							for($i=0;$i<count($typrm);$i++)
							{
								 if($typrm[$i]==='single')
								{     $s=1; }
								if($typrm[$i]==='double')
								{     $d=1; }
								if($typrm[$i]==='minisuite')
							    {	$m=1;   }
							}
							$sql4="insert into package_room values('$packageid','$s','$d','$m');";
							if($c->query($sql4))
							{
								$priceroom=0;
								for($i=0;$i<count($typrm);$i++)
								{
									$res=$c->query("Select price_room_day from hotel_room where room_type='$typrm[$i]' and hotel_id='$hotelid';");
									if($row=$res->fetch_assoc())
									{
										
										$priceroom=$priceroom+$row['price_room_day'];
									}
								}
								$pricevehicle=0;
								$res=$c->query("Select price_day from vehicle where dest_name='".$_POST['destname1']."' and vehicle_type='".$_POST['typevehicle']."';");
							   if($row=$res->fetch_assoc())
									{
									   $pricevehicle+=$row['price_day'];
									}
									$as=$_POST['day'];
								$price=((($priceroom +$pricevehicle)*$as)+500);
							}
							$res=$c->query("select vehicle_id from vehicle where dest_name='".$_POST['destname1']."' and vehicle_type='".$_POST['typevehicle']."';");
							$row=$res->fetch_assoc();
							$vehicleid=$row['vehicle_id'];
							$date= date('Y-m-d H:i:s');
							$night=$_POST['day']-1;
							$sql6="insert into package values('$packageid','".$_POST['destname1']."','$hotelid','$vehicleid','1','$price','".$_POST['day']."','$night','$file_to_saved','$date');";
						    if($c->query($sql6))
							{
							   echo "<script>alert('Package successfully added')</script>";
				               echo"<script>window.open('adminadd.php','_self')</script>";
							 }
						}
					  }
				    }
				}					
			}
		}
	}  
	  else
	       {
			   echo "<script>alert('Destination already exists')</script>";
		        echo"<script>window.open('adminadd.php','_self')</script>";
				
			}
  }
  }
  else
  {
	  $var2=$_POST['ehname'];
	  $packageid=rand(10000,400000);
	  $file_get=$_FILES['foto1']['name'];
      $roomcount=1;
	  if($var2==='hother')
		{
			$room=$_POST['typeroom1'];
			for($i=0;$i<count($room);$i++)
			    {
					if($room[$i]==="Null")
					{
						$roomcount=0;
					}
				}
			if(!$_POST['hotel1'] or !$_POST['hoteltype1'] or !$_POST['snr1'] or !$_POST['psnr1'] or !$_POST['dnr1'] or !$_POST['pdnr1'] or !$_POST['mns1']
	       or !$_POST['pmns1'] or !$_POST['hcon1'] or !$_POST['tsnr1'] or !$_POST['ctsnr1'] or !$_POST['tsenr1'] or !$_POST['ctsenr1']
	        or !$_POST['tsuv1'] or !$_POST['ctsuv1']  or !$_POST['typevehicle1'] or !$_POST['day1'] or !$file_get or ($roomcount==0))
	       {
		
		               echo "<script type='text/javascript'>alert('All fields not added');</script>";
				                echo"<script>window.open('adminadd.php','_self')</script>";
	      }
	else
	{
		
		$tmp=$_FILES['foto1']['tmp_name'];
       $file_to_saved="images/".$file_get;
	    move_uploaded_file($tmp,$file_to_saved);
			$resu=$c->query("select hotel_id from hotel where hotel_name='".$_POST['ehname']."';");
			if($resu->num_rows==0)		
	       { 
	            
			   $hotelid=rand(1,999999);
			   
				   $sql1="insert into hotel values('$hotelid','$var','".$_POST['hotel1']."','".$_POST['hoteltype1']."','".$_POST['hcon1']."');";
				   if($c->query($sql1))
				   {
					   if(($_POST['snr1']) && ($_POST['dnr1']) && ($_POST['mns1']))
				      {
					  $sql2="insert into hotel_room values('$hotelid','single','".$_POST['psnr1']."','".$_POST['snr1']."'),
					    ('$hotelid','double','".$_POST['pdnr1']."','".$_POST['dnr1']."'),
					    ('$hotelid','minisuite','".$_POST['pmns1']."','".$_POST['mns1']."');";
						if($c->query($sql2))
					  {
						
						    $typrm=$_POST['typeroom1'];
							$s=$d=$m=0;
							
							for($i=0;$i<count($typrm);$i++)
							{
								if($typrm[$i]==='single')
								{     $s=1;  }
								if($typrm[$i]==='double')
								{     $d=1;  }
								if($typrm[$i]==='minisuite')
							    {	$m=1;   }
							}


							$sql4="insert into package_room values('$packageid','$s','$d','$m');";
							if($c->query($sql4))
							{
								$priceroom=0;
								for($i=0;$i<count($typrm);$i++)
								{
									$res=$c->query("Select price_room_day from hotel_room where room_type='$typrm[$i]' and hotel_id='$hotelid';");
									if($row=$res->fetch_assoc())
									{
										$priceroom=$priceroom+$row['price_room_day'];
									}
								}
								$pricevehicle=0;
								
								$res=$c->query("Select price_day from vehicle where dest_name='$var' and vehicle_type='".$_POST['typevehicle1']."';");
							   if($row=$res->fetch_assoc())
									{
										$pricevehicle+=$row['price_day'];
									}
								   $as=$_POST['day1'];
								   $price=((($priceroom +$pricevehicle)*$as)+500);
								   $res=$c->query("select vehicle_id from vehicle where dest_name='$var' and vehicle_type='".$_POST['typevehicle1']."';");
							       $row=$res->fetch_assoc();
								   $vehicleid=$row['vehicle_id'];
								$date= date('Y-m-d H:i:s');
								$night=$_POST['day1']-1;
							$sql6="insert into package values('$packageid','$var','$hotelid',
							'$vehicleid','1','$price','".$_POST['day1']."',$night,'$file_to_saved','$date');";
                          
							if($c->query($sql6))
							{
								 echo "<script>alert('Package successfully added')</script>";
				                 echo"<script>window.open('adminadd.php','_self')</script>";
							}
							}
					    }
					   }
				}
			  }
		   else
		   {
			   echo "<script type='text/javascript'>alert('Hotel already exists in destination');</script>";
			   include('adminadd.php');
			}
		}
		}
		else
		{
			//echo $var2;
			$file_get=$_FILES['foto2']['name'];
			$room=$_POST['typeroom2'];
			$roomcount=1;
			for($i=0;$i<count($room);$i++)
			    {
					if($room[$i]==="Null")
					{
						$roomcount=0;
					}
				}
			
			if(  !$_POST['typevehicle2'] or !$_POST['day2'] or !$file_get or ($roomcount==0))
			{
				echo "<script type='text/javascript'>alert('All fields not added');</script>";
				                echo"<script>window.open('adminadd.php','_self')</script>";
			}
			else
			{
				
            $tmp=$_FILES['foto2']['tmp_name'];
            $file_to_saved="images/".$file_get;
            move_uploaded_file($tmp,$file_to_saved);
			$resu=$c->query("select hotel_id from hotel where hotel_name='$var2';");
			$row=$resu->fetch_assoc();
			$hotelid=$row['hotel_id'];
			$res1=$c->query("select vehicle_id from vehicle where vehicle_type='".$_POST['typevehicle2']."' and dest_name='$var';");
			$row1=$res1->fetch_assoc();
			$vehicleid=$row1['vehicle_id'];
			$typrm=$_POST['typeroom2'];
		    $s=$d=$m=0;
			for($i=0;$i<count($typrm);$i++)
		    {
				if($typrm[$i]==='single')
				{     $s=1; }
			    if($typrm[$i]==='double')
			    {     $d=1;  }
				if($typrm[$i]==='minisuite')
				{	$m=1;    }
			}
			$sql1="insert into package_room values('$packageid','$s','$d','$m');";
			if($c->query($sql1))
			{
				$priceroom=0;
				for($i=0;$i<count($typrm);$i++)
			    {
				  $res=$c->query("Select price_room_day from hotel_room where room_type='$typrm[$i]' and hotel_id='$hotelid';");
				  if($row=$res->fetch_assoc())
				  {
					  $priceroom=$priceroom+$row['price_room_day'];
				   }
				}
				$pricevehicle=0;
				$res=$c->query("Select price_day from vehicle where dest_name='$var' and vehicle_type='".$_POST['typevehicle2']."';");
				if($row=$res->fetch_assoc())
				{
					$pricevehicle+=$row['price_day'];
				}
				$as=$_POST['day2'];
				$price=((($priceroom +$pricevehicle)*$as)+500);
				$date= date('Y-m-d H:i:s');
				$night=$_POST['day2']-1;
			    $sql2="insert into package values('$packageid','$var','$hotelid','$vehicleid','1','$price','".$_POST['day2']."',$night,'$file_to_saved','$date');";
				if($c->query($sql2))
			    {               echo "<script>alert('Package successfully added')</script>";
				                 echo"<script>window.open('adminadd.php','_self')</script>";
				}
		    }
		   }
    }
}
}
public function checkadmin()
	{
        $x=new connect;
		$sql="Select * from  admin";
		$c= $x->getconnect();
		$result = $c->query($sql);
                $_SESSION['Username']=$_POST['Username'];
		if ($result->num_rows > 0) 
	   {
       while($row = $result->fetch_assoc()) 
	   {
       
	   if(($_POST['Username']===$row['admin_id']) && ($_POST['password']===$row['password']))
	   { 
         
		   header('location:admin.php');
		   
	   }
	    else 
	   {
		
		 echo "<script>alert('Login Failed')</script>";
		  echo "<script>window.open('login.html','_self')</script>";
       
	   }
	   }
	   }
    }
}	


$obj=new Admin();
if(isset($_POST['submit']))
{

$obj->checkadmin();
}
else if(isset($_POST['add']))
{
 if($_POST['destname'] == "NULL")
 {
   		echo "<script>alert('ENTER VALID VALUE')</script>";
   		echo "<script>window.open('adminadd.php','_self')</script>";

 }
 else
 {

  $obj->addpackage();
 }
}
 ?>