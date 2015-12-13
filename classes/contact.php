<?php
require 'db/init.php';
class Contact
{
	var $username,$comments;
	function __constuct($u,$c)
	{
		$this->username=$u;
		$this->comments=$c;
	}
	function insert()
	{
		$db=new DB;
		$db->connect();
		$sql="insert into contact(Username,Comments) values('$this->username','$this->comments')";
		$db->query($sql);

	}
}
?>