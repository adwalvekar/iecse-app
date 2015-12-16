<?php
 require 'classes/register.php';
 $db=new DB;
 $db->connect();
 $fullname=mysqli_real_escape_string($db->con,$_POST['name']);
 $username=mysqli_real_escape_string($db->con,$_POST['username']);
 $password=mysqli_real_escape_string($db->con,$_POST['password']);
 $email=mysqli_real_escape_string($db->con,$_POST['email']);
 $mobile=mysqli_real_escape_string($db->con,$_POST['mobile']);
 $regno=mysqli_real_escape_string($db->con,$_POST['registrationNumber']);
 $user=new Register($fullname,$username,$password,$email,$mobile,$regno);
 if(!$user->validate())
 {
 	$send=array(
 		"status"=>"101");//email not valid
 	echo json_encode($send);
 	die();
 }
 if($user->username_exists())
 {
 	$send=array(
 	"status"=>"103");//username already exists.
 	echo json_encode($send);
 	die();	
 }
 else
 {
 	$user->insert();
 	$send=array(
 		"status"=>"111");
 	echo json_encode($send);
 }
?>
