<?php 
class calendar{
	public $db, $dbaccess;
	public function __construct(){
		require_once(__DIR__.'/dbconnection.php');
 		global $db, $dbaccess;
 		$db = new dbcon();
 		$dbaccess= new dbaccess();
	}

	public function read_events($month){
		$q="SELECT * FROM events WHERE month= $month";
		$r1=mysqli_query($q);
		if(mysqli_num_rows($r1)>=1){
		$a=array();
		$a[0]=array('status'=>'611')
		$i=1;
		while($q1_arr=mysqli_fetch_assoc($r1)){
			$a[$i]=array('name'=>$q1_arr['name'],'date'=>$q1_arr['date'],'location'=>$q1_arr['location'],'description'=>$q1_arr['description'],'imageURL'=>$q1_arr['imgURL']);
			$i++;
		}
		echo json_encode($a , JSON_FORCE_OBJECT);
	}
	else echo json_encode(array('status'=>'604'));

	}
}