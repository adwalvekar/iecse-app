<?php
if(isset($_POST['month'])){
	$month=$_POST['month'];
	$cal = new calendar();
	$cal->read_events($month);
}
else echo json_encode(array('status'=>'602'))