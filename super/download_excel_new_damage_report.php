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

 $table_data="<table style='margin-left: 30px; width: 1160px; margin-top: 20px;''>
					<tr style='font-size: 25px; ''>
						<th>Invoice Number</th>
						<th>Item Name</th>
						<th>Quantity</th>
						<th>Value</th>
						<th>Serial Number</th>
						<th>Work Done by</th>
						<th>Date</th>
					</tr>";
 
						$conn = mysqli_connect("localhost","root","","mahindra_susten");

						$get_data = "SELECT `id`, `invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `CreateDate` FROM `damage_quantity` ORDER BY `CreateDate` DESC";
						$run_data=mysqli_query($conn,$get_data);

						while ($row_data=mysqli_fetch_assoc($run_data))
						{
							
								$table_data.="<tr><td>".$row_data['invoiceNumber']."</td><td>".$row_data['ItemName']."</td>
									<td>".$row_data['Quantity']."</td>
									<td>".$row_data['Value']."</td>
									<td>".$row_data['serialNumber']."</td>
									<td>".$row_data['WorkDoneBy']."</td>
									<td>".$row_data['CreateDate']."</td>
								</tr>";
							
						}

	$table_data.="</table>";
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=new_damage_report.xls');
 	echo $table_data;
 	?>