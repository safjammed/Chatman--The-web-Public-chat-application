<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
include("db.php");
	$password = $_POST['newpass'];
	$username = $_POST['username'];
	$sql="UPDATE `users` SET `password` = '$password' WHERE `users`.`username` = '$username';";
	if(mysqli_query($db,"$sql")){
		echo "Password changed";
	}else{
		echo "something went wrong";
	}
?>