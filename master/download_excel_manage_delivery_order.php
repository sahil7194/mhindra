<?php
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role=$_SESSION['role'];
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

$table_data="<table>
						<tr>
							<th>
								Delivery Note Number
							</th>
							<th>
								Vender Name	
							</th>
							<th>
								Vender Mobile Number
							</th>
							<th>
								Transporter Sender's Name
							</th>
							<th>
								Transporter Sender's Mobile Number	
							</th>
							<th>
								Work Assign to	
							</th>
							<th>
								Status
							</th>
							<th>
								Date & Time
							</th>
							<th>
								Action
							</th>
						</tr>";

						 	$conn = mysqli_connect("localhost","root","","mahindra_susten");

						 	$select_delivery_note="SELECT `id`, `DeliveryNote`, `SuplierName`, `SuplierMobileNumber`, `SSN`, `SSMN`, `Workassign`, `WorkStatus`, `SupDoc`, `CreateDate` FROM `delivaerynote` ORDER BY `CreateDate` DESC";
						 	$run_query = mysqli_query($conn,$select_delivery_note);
						 	while ($row_delivery_note = mysqli_fetch_assoc($run_query))
						 	{
		
						 		$table_data.="<tr>
						 			<td>
						 				".$row_delivery_note['DeliveryNote']."
						 			</td>
						 			<td>
						 				".$row_delivery_note['SuplierName']."
						 			</td>
						 			<td>
						 				".$row_delivery_note['SuplierMobileNumber']."
						 			</td>
						 			<td>
						 				".$row_delivery_note['SSN']."
						 			</td>
						 			<td>
						 				".$row_delivery_note['SSMN']."
						 			</td>
						 			<td>
						 				".$row_delivery_note['Workassign']."
						 			</td>
						 			<td>
						 				".$row_delivery_note['WorkStatus']."
						 			</td>
						 			<td>
						 				".$row_delivery_note['CreateDate']."
						 			</td>
						 		</tr>";
								 		
						 	}
$table_data.="</table>";
header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=invoice_detilas.xls');
 	echo $table_data;