<?php
class dbcon{

	public function __construct($server,$database,$username,$password){
		$conn= new mysqli($server,$username,$password,$database);
		if (!$conn){
			echo json_encode("status : 504");
		}
	}

}