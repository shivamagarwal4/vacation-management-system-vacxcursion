<!--This file is used for establishing the connection between php and mysql database
-->
<?php

class Connect{
/* for connection */
public $servername;
public $username;
public $pass;
public $dbname;
public  function getconnect()
{
	
 $servername = "localhost";
 $username = "id1021231_root";
 $pass = "12345";
 $dbname="id1021231_saamp";
 $conn=new mysqli($servername, $username, $pass,$dbname);
    if ($conn->connect_error) 
	{
    die("Connection failed: " . $conn->connect_error);
    } 
   
return $conn;
}
}



?>