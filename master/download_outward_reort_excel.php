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
	
  ?>
<?php 
 	$select = "SELECT `id`, `InvoiceNnumber`, `ItemName`, `Serialnumber`, `CreateDate`, `WorkDoneBy` FROM `temp_outward` ORDER BY `CreateDate` DESC";
 	$row = mysqli_query($conn, $select);
 	$table ="<table>
 				<tr>
 				<th>Invoice Number</th>
 				<th>Item Name</th>
 				<th> Serial Number</th>
 				<th>Create Date</th>
 				</tr>";
 	while ($run = mysqli_fetch_array($row)) 
 	{
 		$table .="<tr><td>".$run['id']."</td><td>".$run['InvoiceNnumber']."</td><td>".$run['Serialnumber']."</td><td>".$run['CreateDate']."</td></tr>";
 		
 	}
 	 $table .="</table>";
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=outward_report.xls');
 	echo $table;
 ?>