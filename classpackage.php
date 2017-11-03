<?php
require_once('conn.php');
require_once('classhotel.php');
require_once('classvehicle.php');
class Package extends Connect
{
	
	public function displayPackageDetails($destname,$price)
	{
		
		$x= new Connect;
        $c=$x->getconnect();
		$var=0;
		$sql;
		if($destname!="" && $price!="" && !$var)
		{
		$sql="select * from package where dest_name='$destname' and price<$price order by price asc";
	    $var=1;
		}
		else if($destname && !$var)
		{
		    $sql="select * from package where dest_name='$destname' order by price asc";
			$var=1;
		}
		else if($price)
		{
			$sql="select * from package where price<$price order by price asc";
		     $var=1;
		}
		
			$packarray=array();
			$result=$c->query($sql);
		    if($result->num_rows>0)
			{
			  while($row=$result->fetch_array())
		     {
			  $packarray[]=array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);
			  }
			   return array($packarray,count($packarray));
		   }
			else
		   {
			   echo "<script>alert('sorry!!!! no package available..for your choices')</script>";
		       echo "<script>window.open('admin.php','_self')</script>";
		   }
		   
	}
	public function getoffer()
	  {
		  
		$x= new Connect;
        $c=$x->getconnect();
		$date = date('Y-m-d');
		$day_before = date( 'Y-m-d', strtotime( $date . ' -1 day' ) );
		$sql= "select * from package where date(time_of_pack)='$day_before' or date(time_of_pack)='$date'";
		$packarray=array();
		$res=$c->query($sql);
                if($res->num_rows>0)
		{ 
			while($row= $res->fetch_array())
			{
				$packarray[]=array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);
			}
                        return array($packarray,count($packarray));
		}
else
{
echo "<script>alert('No new offers')</script>";
echo "<script>window.open('index1.php','_self')</script>";
}
		 
	  }	
	  public function getpackage_room($var)
	  {
		  $x= new Connect;
          $c=$x->getconnect();
		  $sql="select * from package_room where package_id='$var';";
		  if($result=($c->query($sql)))
		{ 
			while($row1= $result->fetch_array())
			{
				$packroom[]=array($row1[0],$row1[1],$row1[2],$row1[3]);
			}
			
			return $packroom;
			
		}

	  }
	  public function checkpackage($pid,$hid,$vid,$dest,$days,$date,$nov,$s_count,$d_count,$m_count,$price)
	  {
		  $x= new Connect;
          $c=$x->getconnect();
		  $status1=0;$status2=0;$status3=0;
		  $hotelobj=new Hotel;
		  $vehicleobj=new Vehicle;
		  if($s_count)
		  {
			 $checkhotel1=$hotelobj->getAvailability($hid,$date,$days,$s_count,$dest,$price,'sc');
			 
			 if($checkhotel1)
			 {
				 $status1=1;
			 }
		  }
		  else
		  {
			  $status1=1;
		  }
		  if($d_count)
		  {
			 $checkhotel2=$hotelobj->getAvailability($hid,$date,$days,$d_count,$dest,$price,'dc');
			
			 if($checkhotel2)
			 {
				 $status2=1;
			 }
		  }
		  else
		  {
			   $status2=1;
		  }
		  if($m_count)
		  {
			 $checkhotel3=$hotelobj->getAvailability($hid,$date,$days,$d_count,$dest,$price,'mc');
			
			 if($checkhotel3)
			 {
				 $status3=1;
			 }
		  }
		   else
		  {
			   $status3=1;
		  }
		  if($nov)
		 {
			$checkvehicle=$vehicleobj->getAvailability($vid,$date,$days,$nov,$dest,$price); 
		 }
		 if($nov==0)
		 {
			 $checkvehicle=1;
		 }
		 if($status1 && $status2 && $status3 && $checkvehicle)
		 {
			 return 1;
			 
		  }
		  else return 0;
		 
	  }
	  
	  public function deletepackage($var,$dest)
	  {
		  $x= new Connect;
              $c=$x->getconnect();

                 
		  $sql="delete from package where package_id='$var'";
		  
	           if($c->query($sql))
		     {
		          $sql1="delete from package_room where package_id='$var'";
			  if($c->query($sql1))
			  {
				 
				 
				 echo "<script type='text/javascript'>alert('package succesfully deleted')</script>";
				        echo "<script>window.open('admin.php','_self')</script>";
				 
					  
			  }
		  }
                
	  }
	  public function storepackage($bookid,$vid,$hid,$dest,$scount,$dcount,$mcount,$date,$days,$nov,$price)
	  {
		 
		  $x = new Connect;
          $c = $x->getconnect();
		  
		  $date1=new DateTime($date);
		  $date2= $date1->format('Y-m-d');
		 
		  $sql="insert into book_detail values('$bookid','$vid','$hid','$dest',$scount,$dcount,$mcount,'$date2',$days,$nov,$price)";
		  //echo $sql;
		  //var_dump($sql);
		  if($res=$c->query($sql))
		  {
			  return 1;
		  }
		  
		}
	
}
if(isset($_GET['delete']))
{
	
$obj=new Package;
$packid=$_GET['packid'];
$dest=$_GET['destination'];
$obj->deletepackage($packid,$dest);
}
if(isset($_GET['book']))
{
	
$obj=new Package;
$res=$obj->checkpackage($_GET['pid'],$_GET['hid'],$_GET['vid'],$_GET['dest'],$_GET['days'],$_GET['date'],$_GET['nov'],$_GET['scount'],$_GET['dcount'],$_GET['mcount'],$_GET['price']);

if($res)
{
	$bookid=rand(1,100000);
   $res1=$obj->storepackage($bookid,$_GET['vid'],$_GET['hid'],$_GET['dest'],$_GET['scount'],$_GET['dcount'],$_GET['mcount'],$_GET['date'],$_GET['days'],$_GET['nov'],$_GET['price']);
	if($res1)
	{
		$vid1= $_GET['vid'];
		$hid1=$_GET['hid'];
		$dest1=$_GET['dest'];
		$scount1=$_GET['scount'];
		$dcount1=$_GET['dcount'];
		$mcount1=$_GET['mcount'];
		$date=$_GET['date'];
		$date2=new DateTime($date);
		$date1= $date2->format('Y-m-d');
		$days1=$_GET['days'];
		$nov1=$_GET['nov'];
		$price1=$_GET['price'];
	   echo "<script>alert('Just fill out your form')</script>";
	   echo"<script>window.open('register.php?bookid=$bookid&vid=$vid1&hid=$hid1&dest=$dest1&scount=$scount1&dcount=$dcount1&mcount=$mcount1&date=$date1&days=$days1&nov=$nov1&price=$price1','_SELF')</script>";
	}
}
else
{
	echo"<script>alert('Your package cannot be booked right now')</script>";
	echo"<script>window.open('index1.php','_self')</script>";
}

}


?>