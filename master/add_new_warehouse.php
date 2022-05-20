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
	<title>Add New Warehouse</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<style type="text/css">
		h1
		{
			margin-left: 150px;
		}
		table
		{
			margin-left: 90px;
			line-height: 40px;
			margin-top: 25px;
		}
		label
		{
			font-size:25px;
			margin-right: 20px;
		}
		textarea
		{
			resize: none;
			height: 90px;
			width: 230px;
			font-size: 20px;
		}
		input[type='text']
		{
			width: 230px;
			padding-left: 5px;
			height: 25px;
			font-size: 20px;
		}
		input[type='reset']
		{
			height: 40px;
			width: 80px;
			margin-top: 7px;
			font-size: 20px;
			border: none;
			background-color: #e11d1db5;
			margin-left: 150px;
			margin-right: 40px;
			border-radius: 12px;
		}
		input[type='reset']:hover
		{
			height: 40px;
			width: 80px;
			margin-top: 7px;
			font-size: 20px;
			border: none;
			background-color: #e70a0ad4;
			margin-left: 150px;
			margin-right: 40px;
			border-radius: 12px;
		}
		input[type='submit']
		{
			height: 40px;
			width: 80px;
			margin-top: 7px;
			font-size: 20px;
			border: none;
			background-color: #18d418;
			border-radius: 12px;
		}
		input[type='submit']:hover
		{
			height: 40px;
			width: 80px;
			margin-top: 7px;
			font-size: 20px;
			border: none;
			background-color: #089408;
			border-radius: 12px;
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
				<h1 style="text-align:center; font-size: 40px;">Add Warehouse</h1>
				<div class="from-data">
						<table style="line-height:50px;">
						<form action="" method="post">
						<tr>
							<td>
								<label>Warehouse Name</label>
							</td>
							<td>
								<input type="text" name="warehousename" placeholder="Warehouse Name">
							</td>
						</tr>
						<tr>
							<td>
								<label>Incharge</label>
							</td>
							<td>
								<input type="text" name="incharge" placeholder="Incharge">
							</td>
						</tr>
						<tr>
							<td>
								<label>Location</label>
							</td>
							<td>
								<textarea name="location" placeholder="Location"></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="reset" name="submit" value="reset">
								<input type="submit" name="submit" value="submit">
							</td>
						</tr>
						</form>
					</table>
					<?php 
						if (isset($_POST['submit']))
						 {
							$warehouse=$_POST['warehousename'];
							$incharge=$_POST['incharge'];
							$location=$_POST['location'];
							if ($warehouse!=""&& $location!="")
							{
								$sql_for_insert="INSERT INTO `warehous` (`id`, `name`, `incharge`, `location`, `CreatedDate`) VALUES (NULL, '$warehouse', '$incharge', '$location', current_timestamp());";
								$run_insert=mysqli_query($conn,$sql_for_insert);
								if ($run_insert == true)
								 {
									$sql_for_insert_item="INSERT INTO `item` (`ItemCode`, `ItemName`, `UOM`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue`) VALUES
('ELEC_MODU_000015D', 'PV SOLAR MODULES 310WP', 'NOG', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('ELEC_HDPP_000001D', 'HDPE PIPE', 'MTR', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('ELEC_SCBL_000012D', '3*2.5 Sqmm AC Cable', 'MTR', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('CVIL_AUX2_000830D', 'PP Rope 14 MM Dia with crimp clamp', 'MTR', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('MECH_MMSH_000086D', 'MODULE MOUNTING STRUCTURE for 3 HP Water Pump', 'SET', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('MECH_TRCK_000087D', 'CABLE CONNECTORS FOR TRACKER', 'NOG', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('ADMN_ITAS_0000219', 'PVC CONDUIT', 'MTR', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('MECH_AUX1_000594D', 'Bottom adaptor SS304', 'NOG', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('MECH_AUX1_000596D', 'Pipe bend MS', 'NOG', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('MECH_BOLT_000233D', 'M 10X100 Nut,bolt,washer', 'NOG', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('MECH_BOLT_000234D', 'M 12X60 Nut,bolt,washer', 'NOG', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('ELEC_SCBL_000007D', 'SOLAR CABLE - 1CX4SQMM CU RED', 'MTR', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('ELEC_SCBL_000007D', 'SOLAR CABLE - 1CX4SQMM CU BLACK', 'MTR', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('ELEC_LTCB_000241D', '1CX6SQMM CU EARTHING CABLE', 'MTR', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('CVIL_AUX2_000528D', 'EARTHING CHEMICAL GI', 'SET', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('CVIL_GIPP_000011D', 'GI WIRE', 'MTR', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('ELEC_GISR_000002D', '25 X 3 GI STRIP', 'MTR', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('ELEC_SURG_000006D', 'LIGHTNING ARRESTER', 'NOG', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('ADMN_PLNT_0000048', 'CABLE TIE', 'SET', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('ELEC_LGHT_000007D', 'Home Lighting System', 'NOG', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('MECH_AUX1_000597D', 'Bore cap CI', 'NOG', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('MECH_AUX1_000598D', 'Clamp for pipe', 'NOG', '', '0', '0', '$warehouse', 'no', '0', '0', '0', '', '0'),
('MECH_AUX1_001865D', 'Submersible Water Pump - 3hp 30M', 'SET', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('MECH_AUX1_001866D', 'Submersible Water Pump - 3hp 50M', 'SET', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('MECH_AUX1_001867D', 'Submersible Water Pump - 3hp 70M', 'SET', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('', '75MM/63MM SS REDUCED BUSHING', 'NOG', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('ELEC_SCBL_000017D', '3*4.0 Sqmm AC Cable (7.5HP)', 'MTR', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('MECH_AUX1_001869D', 'Submersible Water Pump - 5hp 50M', 'SET', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('MECH_AUX1_001870D', 'Submersible Water Pump - 5hp 70M', 'SET', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('MECH_AUX1_001871D', 'Submersible Water Pump - 5hp 100M', 'SET', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('ELEC_MODU_000015D', 'PV SOLAR MODULES 310WP (7.5HP)', 'NOS', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('ELEC_MODU_000017D', 'PV SOLAR MODULES 320WP', 'NOS', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0'),
('MECH_MMSH_000087D', 'MODULE MOUNTING STRUCTURE for 5 HP Water Pump', 'NOS', '', '0', '0', '$warehouse', 'yes', '0', '0', '0', '', '0');
";									
			$run_insert_item=mysqli_query($conn,$sql_for_insert_item);
			if ($run_insert_item == true) 
			{
				echo "<script>alert('warehouse added')</script>";
			}
								}
							}
							else
							{
								echo "<script>alert('all field requried')</script>";
							}
						}
					 ?>
				</div>
			</span>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>
