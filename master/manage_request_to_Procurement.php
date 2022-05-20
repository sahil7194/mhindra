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
	<title>Manage Request To Procurement</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<style type="text/css">
		th,td
		{
			padding-left: 5px;
			padding-right: 5px;
			padding-top: 5px;
			padding-bottom: 5px;

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
				<div><h1 style="text-align: center; font-size:40px; margin-bottom:15px;">Manage Request To Procurement</h1></div>
			</span>
			<div style="overflow: auto; height:500px; width: 1200px; margin-left: 80px; margin-right:17px;">
				<table style="margin-top: 10px;" border="1">
					<tr>
						<th>
							Procurement Id	
						</th>
						<th>
							State	
						</th>
						<th>
							Dist
						</th>
						<th width="160px">
							WareHouse Location
						</th>
						<th width="160px">
							Govt Customer Name	
						</th>
						<th width="160px">
							Address
						</th>
						<th>
							Motor HP
						</th>
						<th>
							Pump Type
						</th>
						<th>
							Motor Type
						</th>
						<th>
							Module - Watt Peak	
						</th>
						<th>
							Order Quantity	
						</th>
						<th>
							Create BOM
						</th>
						<th>
							View BOM
						</th>
						<th>
							Action
						</th>
					</tr>
					<?php 
						$sql_for_select_pro="SELECT `id`, `procurement_id`, `State`, `dist`, `WareHouse_location`, `Govt_Customer_Name`, `Address`, `Motor HP`, `Pump_Type`, `Motor_Type`, `Module`, `Order_Quantity`, `CreateDate` FROM `procurement` ORDER BY `CreateDate` DESC";
						$run=mysqli_query($conn,$sql_for_select_pro);
						while($row_pro=mysqli_fetch_array($run))
						{
							?>
							<tr>
						<td>
							<?php echo $row_pro['procurement_id']; ?>	
						</td>
						<td>
							<?php echo $row_pro['State']; ?>	
						</td>
						<td>
							<?php echo $row_pro['dist']; ?>
						</td>
						<td>
							<?php echo $row_pro['WareHouse_location']; ?>
						</td>
						<td>
							<?php echo $row_pro['Govt_Customer_Name']; ?>	
						</td>
						<td>
							<?php echo $row_pro['Address']; ?>
						</td>
						<td>
							<?php echo $row_pro['Motor HP']; ?>
						</td>
						<td>
							<?php echo $row_pro['Pump_Type']; ?>
						</td>
						<td>
							<?php echo $row_pro['Motor_Type']; ?>
						</td>
						<td>
							<?php echo $row_pro['Module']; ?>	
						</td>
						<td>
							<?php echo $row_pro['Order_Quantity']; ?>	
						</td>
						<td>
							<a target="_blank" href="create_bom.php?id=<?php echo $row_pro['procurement_id']; ?>&hp=<?php echo $row_pro['Motor HP']; ?>">Create BOM</a>
						</td>
						<td>
							<a target="_blank" href="view_bom.php?id=<?php echo $row_pro['procurement_id']; ?>&hp=<?php echo $row_pro['Motor HP']; ?>">View BOM</a>
						</td>
						<td>
							<a href="delete_procument.php?id=<?php echo $row_pro['id']; ?>	">Delete</a>
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