<?php
error_reporting('0');
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role="super";
	$warehouse=$_SESSION['warehouse'];
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
	$table="
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset=utf-8>
		<style>
		*
		{
			font-size:18px;
		}
		td,th
		{
			padding-top: 10px;
			padding-bottom: 10px;
			padding-left: 10px;
			padding-right: 10px;
			text-align:center;

		}
		.dam
		{
			width:200px;
		}
		.mat
		{
			width:350px;
		}
		.not
		{
			width:450px;
		}
		</style>
	</head>
	<body>	
	<table border=1>
					<tr>
						<td>
							Sr. No.
						</td>
						<td >
							Materials Code
						</td>
						<td class=mat>
							Materials Description
						</td>
						<td>
							UOM
						</td>
						<td>
							Recived Quantity
						</td>
						<td>
						Average Value 
						</td>
						<td width=90 class=dam>
							Damaged Quantity
						</td>
						<td>
							Issued Quantity
						</td>
						<td>
							Balance Quantity
						</td>
						<td>
							Balance Value
						</td>
						<td class=not>
							Note
						</td>
					</tr>";
							$select_table_data_query="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `warehouse`='$warehouse'";
							$run_table_data=mysqli_query($conn,$select_table_data_query);
							$cout_table_data_row=mysqli_num_rows($run_table_data);
							while ($row_table_data=mysqli_fetch_assoc($run_table_data)) 
							{
								$counter=$counter+1;	
								$table.="<tr><td>".$counter."</td>
								<td>".$row_table_data['ItemCode']."</td>
								<td>".$row_table_data['ItemName']."</td>
								<td>".$row_table_data['UOM']."</td>
								<td>".$row_table_data['RecivedQuantity']."</td>
								<td>".$row_table_data['FixedValue']."</td>
								<td>".$row_table_data['DamageQuantity']."</td>
								<td>".$row_table_data['IssuedQuantity']."</td>
								<td>".$row_table_data['Qauntity']."</td>
								<td>".$row_table_data['ItemValue']."</td>
								<td>".$row_table_data['Note']."</td>
								</tr>";						
							}
				 $table.="</table>
	</body>
	</html>";
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=stock.xls');
 	echo $table;
?>
