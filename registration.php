
<?php
require_once("dbconnection.php");
$username=mysqli_real_escape_string($con,$_POST['username']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
$reg_no=mysqli_real_escape_string($con,$_POST['reg_no']);
$mob="/^[789][0-9]{9}$/";
if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
  $send=array(
  	"status"=>"105");
  echo json_encode($send);
  die();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $send=array(
  	"status"=>"103");
  echo json_encode($send);
  die();
}
if(!preg_match($mob, $mobile))
{ 
    $send=array(
  	"status"=>"105"); 
  echo json_encode($send);
        die();
}   
$check=username_check($con,$username);
if($check==1)
{
	insert_entries($con,$username,$email,$password,$mobile,$reg_no);
}
else
{
	$send=array(
		"status"=>"101");
	echo json_encode($send);
	die();
}
function username_check($con,$username)
{
	$sql="select * from member_details where Username='$username'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
	if($count==0)
		return 1;
	else
		return 0;
}
function insert_entries($con,$username,$email,$password,$mobile,$reg_no)
{
	$password=md5($password);
	$sql="insert into member_details(Username,Email,Password,Mobile,Reg_No,Access_Level) 
	values('$username','$email','$password','$mobile','$reg_no','0')";
	$result=mysqli_query($con,$sql) or die(mysqli_error($con));
		$send=array(
			"status"=>"111");
		echo json_encode($send);
}