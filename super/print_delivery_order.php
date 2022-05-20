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
	
  ?>
<table style="margin-left: 20px; margin-right: 20px;">
	<tr>
		<td>
			<img src="http://localhost/Current%20Project/mahindra/imgs/logo.png" height="50px;" width="50px;">
		</td>
		<td>
			<a href="index.php"><h1 style=""><?php echo $company_name;?></h1> </a>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<hr style="color: black;">
		</td>
	</tr>
	 <?php
	 $id=$_GET['id'];
	$conn = mysqli_connect("localhost","root","","mahindra_susten");
	$select_delivery_note="SELECT `id`, `DeliveryNote`, `SuplierName`, `SuplierMobileNumber`, `SSN`, `SSMN`, `Workassign`, `status`, `CreateDate` FROM `delivaerynote` WHERE `id`='$id'";
	$run_query = mysqli_query($conn,$select_delivery_note);
	while ($row_delivery_note = mysqli_fetch_assoc($run_query))
		{
			
		}
	?>
</table>
<button onclick="window.print()">Print this page</button>