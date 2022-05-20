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
	
 $data="
<!DOCTYPE html>
<html>
<head>
	<title>Add New Emp</title>
	<style ty>
		label
		{
			font-size: 30px;
			line-height: 40px;
		}
		select
		{
			width: 190px;
			height: 40px;
			font-size: 25px;
		}
		table
		{
			margin-right: 20px;
		}
		th
		{
			border-bottom: 1px solid black;
		}
	</style>
</head>
<body>
			<table  style=margin-left: 90px; margin-top: 20px; width: 1200px;>
				<tr>
					<th width=200px>
						Full Name
					</th>
					<th>
						Address
					</th>
					<th>
						Addahar Card
					</th>
					<th>
						Warehouse
					</th>
					<th width=200px>
						Mobile Number	
					</th>
					<th>
						E-mail
					</th>
					<th>
						Date of Birth
					</th>
					<th>
						Username
					</th>
					<th>
						Password
					</th>
					<th>
						Select Role	
					</th>
				</tr>";
					$sqlo="SELECT `id`, `FirstName`, `AddharCrad`, `Address`, `MobileNumber`, `Email`, `DateOfBirth`, `username`, `password`, `role`, `warehouse` FROM `login_details` ORDER BY `id` DESC";
					$sqlr = mysqli_query($conn,$sqlo);
					while ($rowr = mysqli_fetch_array($sqlr))
					{
						
						$data.="<tr>
							<td>
								".$rowr['FirstName']." </td>
							<td>
								".$rowr['Address']." </td>
							<td>
								".$rowr['AddharCrad']." 	</td>
							<td>
								".$rowr['warehouse']." </td>
							
							<td>
								".$rowr['MobileNumber']." </td>
							<td>
								".$rowr['Email']." </td>
							<td>
								".$rowr['DateOfBirth']." </td>
							<td>
								".$rowr['username']." </td>
							<td>
								".$rowr['password']." </td>
							<td>
								".$rowr['role']." </td>
						</tr>";
						
					}
			$data.="</table></body></html>";
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=Employ Information.xls');
	echo $data;
?>