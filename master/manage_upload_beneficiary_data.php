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

<!DOCTYPE html>
<html>
<head>
	<title> Manage Beneficiary Data</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<style type="text/css">
		label
		{
			font-size: 30px;
			line-height: 40px;
		}
		select
		{
			width: 280px;
			height: 40px;
			font-size: 25px;
		}
		.controle-section
		{
			height: 750px;
		}
		.working-section
		{
			height: 750px;
		}
		table
		{
			line-height: 40px;
		}
		td
		{
			margin-right: 25px;
			margin-left: 20px;
		}
		.upload_file
		{
			margin-left: 70px;
		}
		.upload_file h1
		{
			margin-left: 20px;
			margin-bottom: 30px;
		} 
		.upload_file table	
		{
			margin-left: 10px;
		}
		.upload_file input[type='file']
		{
			margin-left: 20px;
		}
		.upload_file input[type='submit']
		{
			margin-left: 40px;
			margin-top: 20px;
			font-size: 15px;
			height: 30px;
			width: 90px;
		}
		.controle-section
		{
			height: 1200px;
		}
		.working-section
		{
			height: 1200px;
		}
		td,th
		{
			padding-left: 20px;
			padding-right: 20px;
			padding-top: 7px;
			padding-bottom: 7px;
		}
		.mmanage h1
		{
			margin-left: 90px;
		}
	</style>
</head>
<body>
	<img src="http://localhost/Current%20Project/mahindra/imgs/logo.png" class="logo">
<div class="title-section">
		<div class="header-area">
			<a href="index.php" style="font-family: rockwell; margin-top:20px;"><?php echo 	$company_name; ?> </a>	
		</div>
</div>
	</div>
	<div class="controle-section">
		<div class="links-area">
			<span>
				Control Panel
			</span>
<main class="main-menue">
					<section id="Home">
						<a href="index.php">Home</a>
					</section>
							
					<section id="Procurement">
						<a href="#Procurement">Request To Procurement</a>
						<p>
							<button>
								<a href="add_request_to_Procurement.php">Add</a>
							</button>
							<br>
							<button>
								<a href="manage_request_to_Procurement.php">Manage</a>
							</button>
							<br>
						</p>
					</section>
					<section id="emp">
						<a href="#emp">Empolyee</a>
						<p>
							<button>
								<a href="add_new_emp.php">Add </a>
							</button>
							<br>
							<button>
								<a href="manage_emp.php">Manage</a>
							</button>
							<br>
						</p>
					</section>
					<section id="Notification">
						<a href="#Notification">Notification</a>
						<p>
							<button>
								<a href="add_new_notification.php">Add </a>
							</button>
							<br>
							<button>
								<a href="manage_notification.php">Manage </a>
							</button>
							<br>
						</p>
					</section>
					<section id="reports">
						<a href="#reports">Reports</a>
						<p>
							<button>
								<a href="inward_reports.php">Inward</a>
							</button>
							<br>
							<button>
								<a href="outward_reports.php">Outward</a>
							</button>
							<button>
								<a href="damage_report.php">Damage</a>
							</button>
							<br>
						</p>
					</section>
					<section id="warehouse">
						<a href="#warehouse">WareHouse</a>
						<p>
							<button>
								<a href="add_new_warehouse.php">Add</a>
							</button>
							<br>
							<button>
								<a href="manage_warehouse.php">Manage</a>
							</button>						
						</p>
					</section>
					</section>
					<section id="Vendor">
						<a href="#Vendor">Vendor</a>
						<p>
							<button>
								<a href="add_vendor.php">Add</a>
							</button>
							<br>
							<button>
								<a href="manage_vendor.php">Manage</a>
							</button>						
						</p>
					</section>
					<section id="Installer">
						<a href="#Installer">Installer</a>
						<p>
							<button>
								<a href="add_installer.php">Add</a>
							</button>
							<br>
							<button>
								<a href="manage_installer.php">Manage</a>
							</button>						
						</p>
					</section>
					<section id="uploaddata">
						<a href="#uploaddata">Beneficiary Data</a>
						<p>
							<button>
								<a href="upload_beneficiary_data.php">Upload</a>
							</button>
							<br>
							<button>
								<a href="manage_upload_beneficiary_data.php">Manage </a>
							</button>						
						</p>
					</section>

					<section id="stock">
						<a href="stock.php">
							Abstract
						</a>
					</section>
					<section id="logout">
						<a href="http://localhost/Current%20Project/mahindra/logout.php">
							Logout
						</a>
					</section>
				</main>	

		</div>
	</div>
	<div class="working-section">
		<div class="data-section">
			<div style="margin-left:90px; margin-bottom: 20px;">
				<h1 style="text-align:center; font-size:40px;">Manage Beneficiary Data</h1>
			</div>
			<div style="height: 1100px; margin-left: 80px; width:1190px; overflow: auto;">
				<p id="demo"></p>
			<table border="1">
					<tr>
					<th>
						Sr No.
					</th>
					<th>
						Beneficiary Id
					</th>
					<th>
						Beneficiary Name
					</th>
					<th>
						Aadhar NO
					</th>
					<th>
						Mobile Number
					</th>
					<th>
						Water Source
					</th>
					<th>
						Land Address
					</th>
					<th>
						Category
					</th>
					<th>
						Circle Name
					</th>
					<th>
						Division Name
					</th>
					<th>
						Pump Load
					</th>
					<th>
						Work Order No
					</th>
					<th>
						Invoice Date
					</th>
					<th>
						CONTRACT NO
					</th>
					<th>
						Invoice No
					</th>
					<th>
						DC Date
					</th>
					<th>
						Action
					</th>
				</tr>
				<?php
				error_reporting('0'); 
					$sql_for_get_data="SELECT `id`, `Beneficiary_Id`, `Beneficiary_Name`, `Aadhar_NO`, `Mobile_Number`, `Water_Source`, `Land_Address`, `Category`, `Circle_Name`, `Division_Name`, `Pump_Load`, `Work_Order_No`, `Invoice_Date`, `CONTRACT_NO`, `Invoice_No`, `DC_Date`, `CreateDate` FROM `benifiry_data` ORDER BY `CreateDate` DESC";
					$run_data_query=mysqli_query($conn,$sql_for_get_data);
					while ($row_data_for=mysqli_fetch_array($run_data_query))
					{
						$counter=$counter+1;
						?>
						<tr>
							<td>
								<?php echo $counter; ?>
							</td>
							<td>
								<?php echo $row_data_for['Beneficiary_Id'] ?>
							</td>
							<td>
								<?php echo $row_data_for['Beneficiary_Name'] ?>
							</td>
							<td>
								<?php echo $row_data_for['Aadhar_NO'] ?>
							</td>
							<td>
								<?php echo $row_data_for['Mobile_Number'] ?>
							</td>
							<td>
								<?php echo $row_data_for['Water_Source'] ?>
							</td>
							<td>
								<?php echo $row_data_for['Land_Address'] ?>
							</td>
							<td>
								<?php echo $row_data_for['Category'] ?>
							</td>
							<td>
								<?php echo $row_data_for['Circle_Name'] ?>
							</td>
							<td>
								<?php echo $row_data_for['Division_Name'] ?>
							</td>
							<td>
								<?php echo $row_data_for['Pump_Load'] ?>
							</td>
							<td>
								<?php echo $row_data_for['Work_Order_No'] ?>
							</td>
							<td>
								<?php echo $row_data_for['Invoice_Date'] ?>
							</td>
							<td>
								<?php echo $row_data_for['CONTRACT_NO'] ?>
							</td>
							<td>
								<?php echo $row_data_for['Invoice_No'] ?>
							</td>
							<td>
								<?php echo $row_data_for['DC_Date'] ?>
							</td>
							<td>
								<a href="delete_beneficiary_data.php?id=<?php echo  $row_data_for['id']; ?>">Delete</a>
							</td>
						</tr>
						<?php
					}
				 ?>
				 
				</table>
			</div>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>