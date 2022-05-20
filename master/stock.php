<?php
error_reporting('0');
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
	<title>Stock </title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
		<style type="text/css">
		.controle-section
		{
			height: 1462px;
		}
		.working-section
		{
			height: 1456px;
		}
		.stock-view
		{
			margin-left: 90px;
		}
		table
		{
			margin-left: 20px;
			margin-top: 25px;
			margin-bottom: 32px;
			margin-right: 40px;
		}
		td
		{
			padding-left: 8px;
			padding-top: 8px;
			padding-bottom:  8px;
			padding-right:  8px;
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
				<div class="stock-view">
					<h1 style="text-align:center; font-size:40px;">Abstract</h1>
					<div class="action-button-section" style="margin-top: 20px;">
						Export
						<button>
							<a href="download_excel_stock.php">Excel</a>
						</button>
					</div>
					<div>
						<form action="" method="get">
							Select warehouse 
						<select name="warehouse">
						<option value="">-- Select Warehouse --</option>	
							<?php 
								$select_warehouse_name="SELECT `name` FROM `warehous`";
								$run_warehouse_name=mysqli_query($conn,$select_warehouse_name);
								while ($row_warehouse_name=mysqli_fetch_array($run_warehouse_name))
								 {
									?>
									<option value="<?php echo $row_warehouse_name['name'];?>"><?php echo $row_warehouse_name['name'];?></option>
									<?php
								}
							 ?>
						</select>
						<button>
							add
						</button>
						</form>
							
						 <div style="height:1250px; overflow: auto; margin-bottom:80px;"> 
					<table border="1">
					<tr>
						<td rowspan="2">
							Sr. No.
						</td>
						<td rowspan="2">
							Materials Code
						</td>
						<td rowspan="2" width="140px;">
							Materials Description
						</td>
						<td colspan="3">
							Received Details
						</td>
						<td rowspan="2">
							Damaged /reject Quantity
						</td>
						<td rowspan="2">
							Issued Quantity
						</td>
						<td rowspan="2">
							Balance Quantity
						</td>
						<td rowspan="2">
							Value
						</td>
						<td rowspan="2" width="140px">
							Note
						</td>
					</tr>
					<tr>
						<td>
							UOM
						</td>
						<td>
							Recived Quantity
						</td>
						<td>
							Average Value
						</td>
					</tr>
					<?php 
							if (isset($_POST['add']))
							 {
								$warehouse_1=$_POST['warehouse'];
							}
								$warehouse_2=$_GET['warehouse'];
							if ($warehouse_2!="") 
							{

								$select_table_data_query_1="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `warehouse`='$warehouse_2'";
							}
							else
							{
								$select_table_data_query_1="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item`";
							}
							$run_table_data=mysqli_query($conn,$select_table_data_query_1);
							$cout_table_data_row=mysqli_num_rows($run_table_data);
							while ($row_table_data=mysqli_fetch_assoc($run_table_data)) 
							{
								$counter=$counter+1;
								
								?>
								
					<tr>
						<td>
							<?php echo $counter; ?>
						</td>
						<td>
							<?php echo $row_table_data['ItemCode'] ?>
						</td>
						<td>
							<?php  echo $row_table_data['ItemName'];?>
						</td>
						<td>
							<?php echo $row_table_data['UOM']; ?>
						</td>
						<td>
							<?php echo $row_table_data['RecivedQuantity']; ?>
						</td>
						<td>
							<?php echo $row_table_data['FixedValue']; ?>
						</td>
						<td>
							<?php echo $row_table_data['DamageQuantity']; ?>
						</td>
						<td>
							<?php echo $row_table_data['IssuedQuantity']; ?>
						</td>
						<td>
							<?php echo $row_table_data['Qauntity']; ?>
						</td>
						<td>
							<?php echo $row_table_data['ItemValue']; ?>
						</td>
						<td>
							<?php echo $row_table_data['Note']; ?>
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