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
	
  
  $tabel="<table border=1>
					<tr>
						<th>
							Sr.No
						</td>
						<th width=250px>
							Installer Name
						</th>
						<th width=100px>
							Mobile Number
						</th>
						<th width=250px>
							Address	
						</th>
						<th>
							Created Date
						</th>
					</tr>";
					error_reporting('0'); 
						$sql_for_select="SELECT `id`, `Name`, `Mobile`, `Address`, `CreatedDate` FROM `installer` ORDER BY `CreatedDate` DESC";
						$run_select=mysqli_query($conn,$sql_for_select);
						while ($row_warehouse=mysqli_fetch_array($run_select))
						{
							$counter=$counter+1;
						
							$tabel.="<tr><td>".$counter."</td>
								<td>".$row_warehouse['Name']."</td>
								<td>".$row_warehouse['Mobile']."</td>
								<td>".$row_warehouse['Address']."</td>
								<td>".$row_warehouse['CreatedDate']."</td>
							</tr>";
						}
					
				$tabel.="</table>";
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=Installer list.xls');
				echo $tabel;
?>