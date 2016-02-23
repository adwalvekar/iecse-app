<?php
require 'db/init.php';
class Register
{
	var $name,$username,$password,$email,$mobile,$reg_no;
	function __construct($name,$username,$password,$email,$mobile,$registrationNumber)
	{
		$this->name=$name;
		$this->username=$username;
		$this->password=md5($password);
		$this->email=$email;
		$this->mobile=$mobile;
		$this->regNo=$registrationNumber;
	}
	function usernameExists()
	{
		$dbc=new DB;
		$dbc->connect();
		$sql="select * from registered_users where Username='$this->username'";
		$db->query($sql);
		$count=$db->count();
		if($count==0)
			return 0;
		else 
			return 1;
	}
	function validate()
	{
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
			return 0;
		else
			return 1;

	}
	function insert()
	{
		$dbc=new DB;
		$dbc->connect();
		$sql="insert into registered_users(FullName,Username,Password,Email,Mobile,RegNo) values('$this->name','$this->username','$this->password','$this->email','$this->mobile','$this->regNo')";
		$dbc->query($sql);
	}

}
?>
