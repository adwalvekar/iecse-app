<?php
require 'classes/login.php';
 $db=new DB;
 $db->connect();
$username=mysqli_real_escape_string($db->con,$_POST['username']);
$password=mysqli_real_escape_string($db->con,$_POST['password']);
$login=new Login($username,$password);
$check=$login->check_login();
if($check==1)
{
	$send=array(
		"status"=>"111");//successful login
	echo json_encode($send);
}
else
{
	$send=array(
		"status"=>"000");//invalid login
	echo json_encode($send);
}
?>