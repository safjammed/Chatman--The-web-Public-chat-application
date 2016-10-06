<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
include("db.php");
	$username=$_POST['username'];
	$sql="SELECT * FROM `users` WHERE `username` = '$username'";
	if($query = mysqli_query($db, $sql)){
		$rowcount = mysqli_num_rows($query);
		mysqli_free_result($query);
		if($rowcount != 0 || $rowcount != NULL){

			echo "<b>Username not available</b>";
		}else{
			echo "<b>Username Available</b>";
		}
	}
mysqli_close($db);
?>