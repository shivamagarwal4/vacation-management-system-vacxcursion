<!--This file is for getting the values of destination based on the various conditions--> 
<?php
require_once('conn.php');
class Destination extends Connect
{
	//This function is for retrieving all the destination names from the destination table
	public function getdest()
	{
		
		$x=new Connect;
		$sql="Select dest_name from destination";
		$c= $x->getconnect();
		$result = $c->query($sql);
		if ($result->num_rows > 0) 
	   {
       while($row = $result->fetch_assoc()) 
	   {
		$a[]=$row['dest_name'];
		}
	  }
		return $a;
    }
//This function is used for getting the destination id given the destination name
	public function checkdest($dest)
	{
		$x=new Connect;
		$c = $x->getconnect();
		#echo $dest;
		$res=$c->query("select dest_id from destination where dest_name= '$dest';");
		#var_dump($res);
              if($res->num_rows<=0)
		return	1;
			else return 0;
	}
//This function is used to insert the values to the destination table
	public function insertdest($destid,$dest)
	{
		
		
		$sql="insert into destination values('$destid','$dest');";
		 #echo $sql;
		$x=new Connect;
		$c = $x->getconnect();
                
		if($c->query($sql))
		return 1; 
	}
}	

?>