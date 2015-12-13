<?php
class DB
{
	var $sql,$result,$con;
	function connect()
	{
		$this->con=mysqli_connect("localhost","iecseman","sierrazulufoxtrotindia","iecseman_app");
	}
	function query($s)
	{
		$this->sql=$s;
		$this->result=mysqli_query($this->con,$s);
	}
	function count()
	{
		return mysqli_num_rows($this->result);
	}
	function row()
	{
		return mysqli_fetch_array($this->result,MYSQL_ASSOC);
	}
}
?>