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
	

$data="<html>
<head>
	<title>Manage Warehouse</title>
	<style type=text/css>
		h1
		{
			margin-left: 80px;
		}
		table
		{
			margin-left: 90px;
			margin-top: 20px;
		}
		th,td
		{
			padding-left: 15px;
			padding-top: 15px;
			padding-right:  15px;
			padding-bottom:  15px;
		}
	</style>
</head>
<body>
	<table border=1>
					<tr>
						<th>
							Sr.No
						</th>
						<th width=250px>
							Name
						</th>
						<th width=100px>
							Incharge
						</th>
						<th width=350px>
							Location	
						</th>
						<th>
							Created Date
						</th>
					</tr>";
					error_reporting('0'); 
						$sql_for_select="SELECT `id`, `name`, `incharge`, `location`, `CreatedDate` FROM `warehous` ORDER BY `CreatedDate` DESC";
						$run_select=mysqli_query($conn,$sql_for_select);
						while ($row_warehouse=mysqli_fetch_array($run_select))
						{
							$counter=$counter+1;
							
							$data.="<tr><td>".$counter."</td>
								<td>".$row_warehouse['name']."</td>
								<td>".$row_warehouse['incharge']."</td>
								<td>".$row_warehouse['location']."</td>
								<td>".$row_warehouse['CreatedDate']."</td>
							</tr>";
							
						}
		

				$data.="</table>
						</body>
					</html>";
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=warehouse list.xls');
echo $data;