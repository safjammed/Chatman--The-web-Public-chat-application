<?php ob_start();
session_start();
include("db.php");
header('Access-Control-Allow-Origin: *'); ?>
<?php
	$query="select * from chat1 order by id asc";
	$run = $db->query($query);
	while($row= $run ->fetch_array()){
?>
<li class="mar-btm">
<?php
if($row['name'] == $_SESSION['username']){
	echo "<div class='media-body pad-hor speech-right' id='msgblock'>";
}else{
	echo "<div class='media-body pad-hor' id='msgblock'>";
}
?>
    <div class="speech">
			<a href="#" class="media-heading"><b><?= $row['name']; ?>: </b></a>
			<p> <?= $row['message']; ?></p>
			<p class="speech-time">
			<i class="fa fa-clock-o fa-fw"></i><?= date('g:i a', strtotime(($row['date']))); ?>
			</p>
		</div>
	</div>
</li>
<?php }	
mysqli_close($db);
?>
<script type="text/javascript">
	emojify.run();
</script>