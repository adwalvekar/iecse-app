<?php 
include_once('dbaccess.php');


class calendar{
	public $conn, $dbaccess;
	public function __construct(){
		require_once(__DIR__.'/dbconnection.php');
 		global $conn, $dbaccess;
 		$conn= new mysqli('localhost','iecse_app','sierrazulufoxtrotindia','iecseman_app');
	}

	public function readEvents($dat,$month,$year){
		global $conn;
		$que="SELECT * FROM events WHERE month>=$month AND date>=$dat AND year>=$year";
		$re1=mysqli_query($conn,$que);
		if(mysqli_num_rows($re1)>=1){
		echo '{';
		echo '"status":"611",';
		echo '"events":';
		echo '[';
		$num=mysqli_num_rows($re1);
		$count=0;
		while($q1Arr=mysqli_fetch_assoc($re1)){
			$arrFinal=array('name'=>$q1Arr['name'],'date'=>$q1Arr['date'],'month'=>$q1Arr['month'],'year'=>$q1Arr['year'],'location'=>$q1Arr['location'],'description'=>$q1Arr['description'],'imageURL'=>$q1Arr['imgURL'],'Type'=>$q1Arr['type']);
			echo json_encode($arrFinal);
			if($num-$count!=1){
				echo ',';

			}
			$count++;
		}
		echo ']';
		echo'}';
		
	}
	else echo json_encode(array('status'=>'604'));

	}
}