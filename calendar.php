<?php 
include_once('dbaccess.php');

class calendar{
	public $conn, $dbaccess;
	public function __construct(){
		require_once(__DIR__.'/dbconnection.php');
 		global $conn, $dbaccess;
 		$conn= new mysqli('localhost','iecse_app','sierrazulufoxtrotindia','iecseman_app');
	}

	public function read_events($month){
		global $conn;
		$q="SELECT * FROM events WHERE month= $month";
		$r1=mysqli_query($conn,$q);
		if(mysqli_num_rows($r1)>=1){
		$a=array();
		$a[0]=array('status'=>'611');
		$i=1;
		echo '[';
		while($q1_arr=mysqli_fetch_assoc($r1)){
			$a=array('name'=>$q1_arr['name'],'date'=>$q1_arr['date'],'month'=>$q1_arr['month'],'year'=>$q1_arr['year'],'location'=>$q1_arr['location'],'description'=>$q1_arr['description'],'imageURL'=>$q1_arr['imgURL']);
			echo json_encode($a);
		}
		echo ']';
		
	}
	else echo json_encode(array('status'=>'604'));

	}
}