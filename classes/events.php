<?php
require 'db/init.php';
class Events
{
	function __construct()
	{
		$db=new DB;
		$db->connect();
		$sql="select * from events order by Timestamp DESC";
		$result=$db->query($sql);
		while($row=$db->row())
		{
		 $event_name=$row['Event_Name'];
		 $date=$row['Date'];
		 $details=$row['Details'];
		 $venue=$row['Venue'];
		 $send=array(
		 "event_name"=>$event_name,
		 "date"=>$date,
		 "details"=>$details,
		 "venue"=>$venue,
		  );
		 echo json_encode($send);
		}
	}
}