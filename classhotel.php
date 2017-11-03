<?php
require_once('conn.php');
class Hotel extends Connect
{
	
	public function gethotelDetails($var)
	{
		
		$x=new Connect;
		$sql="Select * from hotel where hotel_id='$var'";
		$c= $x->getconnect();
		$result = $c->query($sql);
		$a=array();
		if ($result->num_rows > 0) 
	   {
       while($row = $result->fetch_array()) 
	   {
		
				$a[]=array($row[0],$row[1],$row[2],$row[3],$row[4]);
		}
       }
	  // var_dump($a);
		return $a;
    }
//This function is used to get the details of the hotel from the hotel table based on the destination name
	public function showHotelByDest($var)
	{
		
		$x=new Connect;
		$sql="Select * from hotel where dest_name='$var'";
		$c= $x->getconnect();
		$result = $c->query($sql);
		$a=array();
		if ($result->num_rows > 0) 
	   {
       while($row = $result->fetch_array()) 
	   {
		
				$a[]=array($row[0],$row[1],$row[2],$row[3],$row[4]);
		}
       }
	  // var_dump($a);
		return $a;
    }

	
	public function getAvailability($hid,$date,$days,$number,$dest,$price,$typeof)
	{
		$x=new Connect;
		$c=$x->getconnect();
		if($typeof=='sc')
		{
		  if($res=$c->query("Select s_count from book_detail where hotel_id='$hid' order by date desc;"))
		 {
			 if($res->num_rows>0)
			 {
				 $total_sroom=0;
				 while($row=$res->fetch_assoc())
				{
					$total_sroom+=$row['s_count'];	
				}
				 
                if($res1=$c->query("Select capacity from hotel_room where hotel_id='$hid' and room_type='single';"))
				{
					if($row1=$res1->fetch_assoc())
					{  
						if(($row1['capacity']-$total_sroom)>=$number)
						{
							return 1;
						}
						else{
							//echo $date;
							$date1= new DateTime($date);
							//echo $date1->format('Y-m-d');
							$room_occupied=0;
							if($result=$c->query("Select date,s_count from book_detail where hotel_id='$hid';"))
							{
							  while($row=$result->fetch_assoc())
							  {
		                       $date2=new DateTime($row['date']);
							  //echo $date2->format('Y-m-d');
		                      $interval = $date1->diff($date2);
							  //echo $interval->d;
							  //echo $days;
							  if(($interval->d)<$days)
							  {
								  $room_occupied+=$row['s_count'];
							  }
							  }
							}
							if(($row1['capacity']-($room_occupied))>=$number)
							{
								return 1;
							}
							else
							{
								//echo "<script type='text/javascript'>alert('sorry!!!!single Room is not available');</script>";
								return 0;
							}
							
						}
					}
				}
				
			}
			else
			 {
				 
				 return 1;
			 }
		 }
	    
	    }
	    
		else if($typeof=='dc')
		{
			
			if($res=$c->query("Select d_count from book_detail where hotel_id='$hid' order by date desc;"))
		 {
			 if($res->num_rows>0)
			 {
				  $total_droom=0;
			    while($row=$res->fetch_assoc())
				{
				    $total_droom+=$row['d_count'];	
				}	
                if($res1=$c->query("Select capacity from hotel_room where hotel_id='$hid' and room_type='double';"))
				{
					if($row1=$res1->fetch_assoc())
					{
						if(($row1['capacity']-$total_droom)>=$number)
						{
							return 1;
						}
						else{
							
							$date1= new DateTime($date);
							$room_occupied=0;
							if($result=$c->query("Select date,d_count from book_detail where hotel_id='$hid';"))
							{
							while($row=$res->fetch_assoc())
							{
								
		                    $date2=new DateTime($row['date']);
		                    $interval = $date1->diff($date2);
							if(($interval->d)<$days)
							  {
								$room_occupied+=$row['d_count'];
							  }
							}
							}
							if(($row1['capacity']-($room_occupied))>=$number)
							{
								return 1;
							}
							else{
								//echo "<script type='text/javascript'>alert('sorry!!!!Double Room  not available');</script>";
		                        return 0;
							}
							
						}
					}
				}
				 
				 
			 }else
			 {
				 return 1;
			 }
		 }
			
		}
		
		else if($typeof=='mc')
		{
			
			if($res=$c->query("Select m_count from book_detail where hotel_id='$hid' order by date desc;"))
		 {
			 if($res->num_rows>0)
			 {
				 
				  $total_mroom=0;
			    while($row=$res->fetch_assoc())
				{
				    $total_mroom+=$row['m_count'];	
				}	
                if($res1=$c->query("Select capacity from hotel_room where hotel_id='$hid' and room_type='minisuite';"))
				{
					if($row1=$res1->fetch_assoc())
					{
						if(($row1['capacity']-$total_mroom)>=$number)
						{
							return 1;
						}
						else{
							
							$date1= new DateTime($date);
							$room_occupied=0;
							if($result=$c->query("Select date,m_count from book_detail where hotel_id='$hid';"))
							{
							while($row=$res->fetch_assoc())
							{
							
		                    $date2=new DateTime($row['date']);
		                    $interval = $date1->diff($date2);
							if(($interval->d)<$days)
							  {
								$room_occupied+=$row['m_count'];
							  }
							}
							}
							if(($row1['capacity']-($room_occupied))>=$number)
							{
								return 1;
							}
							else{
								//echo "<script type='text/javascript'>alert('sorry!!!!Mini Suite  not available')</script>";
		                        return 0;
							}
							
						}
					}
				}
			}
			  else
			 {
				 return 1;
			 }
		 }
			
		}
	}
		
	
	
}	 
?>