<?php 
include 'config.php';

$id = $_GET['id'];
	$del="DELETE FROM `invoice` WHERE `id`='$id'";
	mysqli_query($conn,$del);
	header('Location:http://localhost/Current%20Project/mahindra/super/manage_invoice.php');
 ?>