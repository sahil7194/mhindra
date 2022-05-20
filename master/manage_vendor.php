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
	<title>Manage Vendor</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<style type="text/css">
		td,th
		{
			padding-left: 10px;
			padding-top: 10px;
			padding-right: 10px;
			padding-bottom: 10px;
		}
	</style>
	<style type="text/css">
		h1
		{
			margin-left: 80px;
		}
		table
		{
			margin-left: 90px;
			margin-top: 20px;
		}
		th
		{
			border-bottom:  1px solid black;
			padding-left: 15px;
			padding-top: 15px;
			padding-right:  15px;
			padding-bottom:  15px;
		}
		td
		{
			padding-left: 15px;
			padding-top: 15px;
			padding-right:  15px;
			padding-bottom:  15px;
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
	</div>	<div class="controle-section">
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
			<span>
				<h1 style="text-align:center; font-size: 40px;">Manage Vendor</h1>
				<div class="export" style="margin-left: 80px; margin-top: 20px;">
					Export
					<a href="download_vendor.php">Excel</a>
				</div>
				<div style="height: 500px; overflow: auto;">
					<table border="1">
					<tr>
						<th>
							Sr.No
						</td>
						<th width="250px">
							Vendor Name
						</th>
						<th width="100px">
							Mobile Number
						</th>
						<th width="250px">
							Address	
						</th>
						<th>
							Created Date
						</th>
					</tr>
					<?php
					error_reporting('0'); 
						$sql_for_select="SELECT `id`, `Name`, `Mobile`, `Addres`, `CreatedDate` FROM `vendor` ORDER BY `CreatedDate` DESC";
						$run_select=mysqli_query($conn,$sql_for_select);
						while ($row_warehouse=mysqli_fetch_array($run_select))
						{
							$counter=$counter+1;
							?>
							<tr><td><?php echo $counter; ?></td>
								<td><?php echo $row_warehouse['Name']; ?></td>
								<td><?php echo $row_warehouse['Mobile']; ?></td>
								<td><?php echo $row_warehouse['Addres']; ?></td>
								<td><?php echo $row_warehouse['CreatedDate']; ?></td>
							</tr>
							<?php
						}
					 ?>
				</table>
				</div>
				
			</span>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>