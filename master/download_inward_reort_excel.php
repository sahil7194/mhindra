<?php
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role="master";
	if ($username !="" && $password !="") 
	 {
		$query = "SELECT `username`, `password`, `role` FROM `login_details` WHERE `username`='$username' AND`password` ='$password' AND `role`='$role'";
		$run = mysqli_query($conn, $query);

		$count = mysqli_num_rows($run);

		if ($count == 1)
		 {
		 	
		 }
		 else
		 {
		 	header('Location:http://localhost/Current%20Project/mahindra/index.php');
		 }
		}
		else
		 {
		 	header('Location:http://localhost/Current%20Project/mahindra/index.php');
		 }
	
  ?><?php 
	include 'config.php';
 	$select="SELECT `id`, `InvoiceNumber`, `ItemName`, `SerialNumber`, `CreateDate`, `WorkDoneBy` FROM `temp_inward` ORDER BY `CreateDate` DESC";
 	$row = mysqli_query($conn, $select);
 	$table ="<table width=500px>
 				<tr>
 				<th>Invoice Number</th>
 				<th>Item Name</th>
 				<th> Serial Number</th>
 				<th>Date</th>
 				</tr>";
 	while ($run = mysqli_fetch_assoc($row)) 
 	{
 		$table.="<tr><td>".$run['InvoiceNumber']."</td><td>".$run['ItemName']."</td><td>".$run['SerialNumber']."</td><td>".$run['CreateDate']."</td></tr>";
 	}
 	$table.="</table>";
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=inward_report.xls');
 	echo $table;
 ?>