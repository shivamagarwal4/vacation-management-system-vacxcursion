<?php
require_once('conn.php');
class Vehicle extends Connect
{
	
	public function getvehicleDetails($var)
	{
		$x=new Connect;
		$sql="Select * from vehicle where vehicle_id='$var'";
		$c= $x->getconnect();
		$result = $c->query($sql);
		$a=array();
		if ($result->num_rows > 0) 
	   {
       while($row = $result->fetch_array()) 
	   {
	       $a[]=array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
		}
       }
		return $a;
    }
	public function getAvailability($vid,$date,$days,$number,$dest,$price)
	{
		$x=new Connect;
		$c=$x->getconnect();
		if($res=$c->query("Select no_of_vehicle from book_detail where vehicle_id='$vid' order by date desc;"))
		{
			if($res->num_rows>0)
			{
				
				$total_vehicle=0;
			    while($row=$res->fetch_assoc())
				{
				    $total_vehicle+=$row['no_of_vehicle'];	
				}	
				//echo "this is total vehicle".$total_vehicle;
                if($res1=$c->query("Select total_no from vehicle where vehicle_id='$vid' and dest_name='$dest';"))
				{
					if($row1=$res1->fetch_assoc())
					{

						if(($row1['total_no']-$total_vehicle)>=$number)
						{

							return 1;
						}
						else{
							
							$date1= new DateTime($date);
							$vehicle_occupied=0;
							if($res1=$c->query("Select date,no_of_vehicle from book_detail where vehicle_id='$vid';"))
				            {
							while($row=$res1->fetch_assoc())
							{
		                    $date2=new DateTime($row['date']);
		                    $interval = $date1->diff($date2);
		                   // echo "interval".$interval->d;
							if(($interval->d)<$days)
							  {
								$vehicle_occupied+=$row['no_of_vehicle'];
							  }
							}
							}
							//echo "occupied".$vehicle_occupied;
							
							if(($row1['total_no']-($vehicle_occupied))>=$number)
							{
								return 1;
							}
							else{
								//echo "<script type='text/javascript'>alert('sorry!!!!Vehicle is not available')</script>";
		                        return 0;
							}
							
						}
					}
				}
				
			}
			else
			{
				//echo "whyyyyyyyyyy";
				return 1;
			}
		}
		
		
	}	
    
	
}

 
?>