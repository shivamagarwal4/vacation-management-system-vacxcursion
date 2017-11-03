<?php
include_once('conn.php');
include_once('classhotel.php');
include_once('classvehicle.php');
date_default_timezone_set('UTC');
class User extends connect
{

   public function CustomHotel($var)
   {
 	   $x= new Connect;
           $c=$x->getconnect();
    
  	   $sc = $var['noofsingle'];
 	   $dc = $var['noofdouble'];
 	   $mc = $var['noofmini'];
 	   $hn = $var['hotelname'];
 	   $did = $var['did'];        #destination 
 	 
 	   $pr = 0;             #price of different types of rooms
 	 
     $sql  = "select price_room_day from hotel h,hotel_room hr where h.hotel_id=hr.hotel_id and dest_name='$did' and hotel_name='$hn' and room_type='single'";

     
     $result = $c->query($sql);
		 		 	   
     if($result->num_rows>0)
	   {
		
	     while($row=$result->fetch_array())
	    {
              $pr = $row['price_room_day'];
               
          }
     }
     # echo "pr = ".$pr;
     # echo "rrr ".$row['price_room_day'];

      $sql1  = "select price_room_day from hotel h,hotel_room hr where h.hotel_id=hr.hotel_id and dest_name='$did' and hotel_name='$hn' and room_type='double'";

     $pr1 = 0;
     $result = $c->query($sql1);
		 		 	   
	   if($result->num_rows>0)
	   {
	  	
	     while($row=$result->fetch_array())
	     {
         $pr1 = $row['price_room_day'];
                  
       }
     }
     
        
      $sql3  = "select price_room_day from hotel h,hotel_room hr where h.hotel_id=hr.hotel_id and dest_name='$did' and hotel_name='$hn' and room_type='minisuite'";

      $pr2 = 0;
      $result = $c->query($sql3);
		 		 	   
		  if($result->num_rows>0)
		  {
		  	
		      while($row=$result->fetch_array())
		      {
             $pr2 = $row['price_room_day'];
                  
           }
      }
         $hoteltotalprice = 0;
        
         $hoteltotalprice = ($sc * $pr) + ($dc * $pr1) + ($mc * $pr2);
        # var_dump ($hoteltotalprice);         
         #echo "<br><br>hotelperdayprice= ".$hoteltotalprice."<br><br>";        
		     return $hoteltotalprice;            

   }

#getvehicle id
   public function getVehicleId($vtype,$did)
   {

     $x = new Connect;
     $c = $x->getconnect();
    
     $prv="";
    
     $sql = "select vehicle_id from vehicle where vehicle_type='$vtype' and dest_name='$did'";
    
     $result = $c->query($sql);

     if($result->num_rows>0)
     {
    
       while($row=$result->fetch_array())
       {
         $prv = $row['vehicle_id'];
               
       }
     }
    #echo "<br><br>price_day= ".$prv."<br><br>";
    return $prv;
}

#end of 

   public function CustomVehicle($var){



   	 $x= new Connect;
     $c=$x->getconnect();
    
  	 $vtype = $var['vtype']; #vehicle type
     $nov = $var['nov'];     #no. of vehicle 
  	 $did = $var['did'];	 
  	 $sql  = "select price_day from vehicle where vehicle_type='$vtype' and dest_name='$did'";
     $prv = 0;
     
     $result = $c->query($sql);
		 		 	   
     if($result->num_rows>0)
	 {
		
	   while($row=$result->fetch_array())
	   {
         $prv = $row['price_day'];
               
       }
     }

    
   
     $vehicletotalprice = $prv;
         
     #echo "<br><br>vehicletotalprice= ".$vehicletotalprice."<br><br>";        
	 return $vehicletotalprice;            
   }
  

  public function getNoDaysInPkg($var)
  {
    $pid = $var;
    
    $x = new Connect;
    $c = $x->getconnect();
    $prv = 0;
    $sql = "select durationday from package where package_id = '$pid'";
    
    $result = $c->query($sql);

     if($result->num_rows>0)
	 {
		
	   while($row=$result->fetch_array())
	   {
         $prv = $row['durationday'];
               
       }
     }
     #echo "<br><br>durationday= ".$prv."<br><br>";
     return $prv;
  }

#gethotel id
public function gethotelId($hname,$did)
  {

    $x = new Connect;
    $c = $x->getconnect();
    
    $prv="";
    
    $sql = "select hotel_id from hotel where hotel_name='$hname' and dest_name='$did'";
    
    $result = $c->query($sql);

     if($result->num_rows>0)
     {
    
       while($row=$result->fetch_array())
       {
         $prv = $row['hotel_id'];
               
       }
     }
      #echoget "<br><br>price_day= ".$prv."<br><br>";
      return $prv;



  } 








  public function getVehiclePriceInPkg($var)
  {
    $pid = $var;
    
    $x = new Connect;
    $c = $x->getconnect();
    $prv = 0;
    $sql = "select price_day from vehicle,package where vehicle.vehicle_id=package.vehicle_id and package_id = '$pid'";
    
    $result = $c->query($sql);

     if($result->num_rows>0)
	 {
		
	   while($row=$result->fetch_array())
	   {
         $prv = $row['price_day'];
               
       }
     }
    #echo "<br><br>price_day= ".$prv."<br><br>";
     return $prv;
  } 
public function insertdetails($email,$first,$last,$contact,$bookid,$bookeddate,$street,$city,$state,$country,$pin,$noa,$noc)
{
	$x = new Connect;
    $c = $x->getconnect();
	$date= date('Y-m-d H:i:s');
	$sql="insert into book_trip values('$email','$first','$last',$contact,'$bookid','$bookeddate','$date')";
	//var_dump($c->query($sql));
	if($c->query($sql))
	{
		
		$sql1="insert into book_address values('$bookid','$street','$city','$state','$country',$pin)";
		//echo $sql;
		if($c->query($sql1))
		{
			$sql2="insert into book_member values('$bookid',$noa,$noc)";
			if($c->query($sql2))
			{
session_start();
$sendto = $_SESSION['google_data']['email'];
$messa="Congratulation. Your Package has been booked with us";
$less="for further queries contact us at hereinvacxcursion@gmail.com";
mail($sendto,$messa,$less);
				return 1;
			}
		}
	}
	
}
public function getuserdetails($bookid)
{
	$x = new Connect;
    $c = $x->getconnect();
	$res=$c->query("select * from book_trip where book_id='$bookid';");
	$a=array();
    if ($res->num_rows > 0) 
	{
       while($row = $res->fetch_array()) 
	   {
		  $a[]=array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]);
	   }
	   return $a;
    }
} 
public function getuseraddress($bookid)
{
	$x = new Connect;
    $c = $x->getconnect();
	$res=$c->query("select * from book_address where book_id='$bookid';");
	$a=array();
    if ($res->num_rows > 0) 
	{
       while($row = $res->fetch_array()) 
	   {
		  $a[]=array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
	   }
	   return $a;
    }
} 
public function getmember($bookid)
{
	$x = new Connect;
    $c = $x->getconnect();
	$res=$c->query("select * from book_member where book_id='$bookid';");
	$a=array();
    if ($res->num_rows > 0) 
	{
       while($row = $res->fetch_array()) 
	   {
		  $a[]=array($row[0],$row[1],$row[2]);
	   }
	   return $a;
    }
}  
}

?>