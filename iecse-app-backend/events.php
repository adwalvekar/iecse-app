<?php
include_once('calendar.php');
if(isset($_POST['month'])){
	$month=$_POST['month'];
	$dat=$_POST['date'];
	$year=$_POST['year'];
	$cal = new calendar();
	$cal->read_events($dat,$month,$year);
}
 else {
 	echo json_encode(array('status'=>'602'));
}
?>