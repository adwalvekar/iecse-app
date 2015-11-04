<?php
class dbcon{

	public function __construct(){

		$json=json_decode(__DIR__.'/config.json');
		$username = $json['username'];
		$server = $json['server'];
		$password = $json['password'];
		$database = $json['database'];
		$conn= new mysqli($server,$username,$password,$database);
		if (!$conn){
			echo json_encode("status : 504");
		}
	}

}