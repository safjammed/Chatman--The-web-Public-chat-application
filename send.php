<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
include("db.php");
if(isset($_POST['name'])){
	$name=$_POST['name'];
	$message=$_POST['msg'];
	$query ="insert into chat1 (name, message) values('$name','$message')";
	$run = $db->query($query);
	if($run){
		echo "<embed loop='false' src='chat.ogg' hidden='true' autoplay='true'>";
	}
}
mysqli_close($db);
?>