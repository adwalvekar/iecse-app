
<?php
 require 'classes/db/init.php';
 $db=new DB;
 $db->connect();
 $username=$_POST['username'];
 $target_dir = "uploads/";
 $target_file = $target_dir . basename($_FILES["dp"]["name"]);
 $uploadOk = 1;
 $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 $check = getimagesize($_FILES["dp"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $status="101";//file not an image
        $uploadOk = 0;
    }

if ($_FILES["dp"]["size"] > 5000000) {
	$status="102"; //file too large
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
	$status="103";//only jpeg png allowed
    $uploadOk = 0;
}
    if (move_uploaded_file($_FILES["dp"]["tmp_name"], $target_file)) {
        $filename=$_FILES['dp']['name'];
		$path="http://iecsemanipal.com/app/uploads/$filename";
		$sql="update registered_users set DP='$path' where Username='$username'";
		$db->query($sql);
		$status="111";//successful upload
    } 
    else {
    	$status="104"; //server error
    }
    $send=array();
    array_push($send,$status);
    echo json_encode($send);
?>
