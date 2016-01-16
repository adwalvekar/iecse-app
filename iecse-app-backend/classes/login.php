<?php
 require 'db/init.php';
 class Login
 {
 	var $username,$password;
 	function __construct($u,$p)
 	{
 		$this->username=$u;
 		$this->password=md5($p);
 	}
 	function check_login()
 	{
 		$db=new DB;
 		$db->connect();
 		$sql="select * from registered_users where Username='$this->username' and Password='$this->password'";
 		$db->query($sql);
 		$count=$db->count();
 		if($count==1)
 			return 1;
 		else
 			return 0;
 	}
 }