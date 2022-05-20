<?php 
include 'config.php';
	for ($i=1; $i = 10; $i++) 
	{ 
		$sql="UPDATE `item` SET `warehouse`='pole' WHERE `id`='$i'";
		mysqli_query($conn,$sql);
	}
	echo "done";
 ?>