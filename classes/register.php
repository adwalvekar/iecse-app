<?php
require 'db/init.php';
class Register
{
	var $name,$username,$password,$email,$mobile,$reg_no;
	function __construct($n,$u,$p,$e,$m,$r)
	{
		$this->name=$n;
		$this->username=$u;
		$this->password=md5($p);
		$this->email=$e;
		$this->mobile=$m;
		$this->reg_no=$r;
	}
	function username_exists()
	{
		$db=new DB;
		$db->connect();
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
		$db=new DB;
		$db->connect();
		$sql="insert into registered_users(FullName,Username,Password,Email,Mobile,RegNo) values('$this->name','$this->username','$this->password','$this->email','$this->mobile','$this->reg_no')";
		$db->query($sql);
	}

}
?>
