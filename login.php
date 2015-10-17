<?php
require_once("dbconnection.php");
$username=mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$password=md5($password);
$sql="select * from member_details where Username='$username' and Password='$password'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count==1)
{
	$send=array(
	"status"=>"222");
	echo json_encode($send);
}
else
{
	$send=array(
	"status"=>"200");
	echo json_encode($send);
}
?>