<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
include("db.php");
	$email=$_POST['email'];
	$sql="SELECT * FROM `users` WHERE `email` = '$email'";
	if($query = mysqli_query($db, $sql)){
		$rowcount = mysqli_num_rows($query);
		mysqli_free_result($query);
		if($rowcount != 0 || $rowcount != NULL){

			echo "<b>Email already Exists</b>";
		}else{
			echo "<b>Email OK</b>";
		}
	}
mysqli_close($db);
?>