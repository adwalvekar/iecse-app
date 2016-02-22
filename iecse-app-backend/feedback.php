<?php
include_once('dbcon.php');
if(isset($_POST['username'])&&isset($_POST['feedback'])){
	$username=$_POST['username'];
	$feedback=$_POST['feedback'];
	$q= "INSERT INTO feedback(username, feedback) VALUES ('$username','$feedback');";
	$r= mysqli_query($link,$q);
	if($r)echo json_encode(array("status"=>'111',"description"=>"Success"));
	else echo json_encode(array("status"=>'000',"description"=>"Insertion Failure"));
}else echo json_encode(array("status"=>'000',"description"=>"No Data Recieved"));
?>