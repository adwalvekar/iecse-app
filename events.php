<?php
include_once('calendar.php');
if(isset($_POST['month'])){
	$month=$_POST['month'];
	$cal = new calendar();
	$cal->read_events($month);
}
 echo json_encode(array('status'=>'602'));

?>