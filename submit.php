<select id="try">
<?php


$fname = $_POST['fname'];

$conn=mysqli_connect("localhost","id1021231_root","12345","id1021231_saamp") or die("error");
$q="select hotel_name from hotel where dest_name='$fname'";
$q1=mysqli_query($conn,$q);
while($row=mysqli_fetch_array($q1))
{
	?>


<option value="<?php echo $row['hotel_name']; ?>"><?php echo $row['hotel_name'];?></option>


<?php
}
?>
<option value="hother">other</option>
</select>