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
	<title>Add New Employee</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<style type="text/css">
	.controle-section,.working-section
	{
		height: 770px;
	}
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
		th,td
		{
			padding-left: 9px;
			padding-right: 9px;
			padding-top: 9px;
			padding-bottom: 9px;
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
			<h1 style="text-align: center; font-size:40px;">Manage Employee</h1>
			<div class="data-section" style="margin-bottom:20px;">
				<h3>Export</h3>
				<a href="download_excel_emp.php">
					Excel
				</a>
			</div>
			<div style="overflow:auto; height:580px; width: 1200px; margin-left:70px;" >
			<table  border="1" >
				<tr>
					<th>
						Sr.No
					</th>
					<th width="400px">
						Full Name
					</th>
					<th>
						Address
					</th>
					<th>
						Aadhar Card
					</th>
					<th>
						Warehouse
					</th>
					<th >
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
					<th>
						Action
					</th>
				</tr>
				<?php 
				error_reporting('0');
					$sqlo="SELECT `id`, `FirstName`, `AddharCrad`, `Address`, `MobileNumber`, `Email`, `DateOfBirth`, `username`, `password`, `role`, `warehouse` FROM `login_details` ORDER BY `id` DESC";
					$sqlr = mysqli_query($conn,$sqlo);
					while ($rowr = mysqli_fetch_array($sqlr))
					{
						$co=$co+1;
						?>
						<tr>
							<td>
								<?php echo $co; ?>
							</td>
							<td>
								<?php echo $rowr['FirstName']; ?>
							</td>
							<td>
								<?php echo $rowr['Address']; ?>
							</td>
							<td>
								<?php echo $rowr['AddharCrad']; ?>	
							</td>
							<td>
								<?php echo $rowr['warehouse']; ?>
							</td>
							
							<td>
								<?php echo $rowr['MobileNumber']; ?>
							</td>
							<td>
								<?php echo $rowr['Email']; ?>
							</td>
							<td>
								<?php echo $rowr['DateOfBirth']; ?>
							</td>
							<td>
								<?php echo $rowr['username']; ?>
							</td>
							<td>
								<?php echo $rowr['password']; ?>
							</td>
							<td>
								<?php echo $rowr['role']; ?>
							</td>
							<td>
								<!--<button>
									<a href="edit_emp.php?id=<?php echo $rowr['id']; ?>">
									Edit 
								</a>	
								</button>
							-->
								<button>
									<a href="delete_emp.php?id=<?php echo $rowr['id']; ?>">
									Delete
								</a>	
								</button>								
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