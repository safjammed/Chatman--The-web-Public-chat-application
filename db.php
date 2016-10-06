<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
$host="localhost";
$user="root";
$password="";
$db_name="chat";
$db=new mysqli($host,$user,$password,$db_name);
if(!$db){
	die("Server error <br>".mysqli_connect_error());
}
?>