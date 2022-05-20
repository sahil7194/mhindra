<?php
error_reporting('0');
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role=$_SESSION['role'];
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

		 							$excel_data =" <!DOCTYPE html><html>
										 <head>
										 	<title></title>
										 </head>
										 <body>
										 <table>
										 	<tr>
										 	<th>
										 	Sr.No
										 	</th>
										 		<th>
										 			Item code
										 		</th>
										 		<th>
										 			Item Name
										 		</th>
										 		<th>
										 			Note
										 		</th>
										 	</tr>";
						$select_query="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `hp`, `ItemValue`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse` FROM `item` WHERE `warehouse`='$warehouse'";
						$run = mysqli_query($conn,$select_query);
						
 							while ($row_excel = mysqli_fetch_assoc($run)) 
						{
							$counter=$counter+1;
							$excel_data.='<tr><td>'.$counter.'</td><td>'.$row_excel["ItemCode"].'</td><td>'.$row_excel["ItemName"].'</td><td>'.$row_excel["Note"].'</td></tr>';
						}

						$excel_data.="</table>
									 </body>
									 </html";
						header('Content-Type:application/xls');
						header('Content-Disposition:attachment;filename=item_report.xls');
						echo $excel_data;

 ?>
