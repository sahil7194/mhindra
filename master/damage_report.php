 	<?php
	session_start();
	include 'config.php';
	error_reporting('0');
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
	<title>Damage Reports</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
		<style type="text/css">
	.controle-section,.working-section
	{
		height: 950px;
	}
	td,th
	{
	   padding-left: 10px;
	   padding-top: 10px;
	   padding-right: 10px;
	   padding-bottom: 10px;
	}
	.filtersection
	{
		margin-left: 80px;
		margin-top: 30px;
		margin-bottom: 20px;
	}
	.filtersection input[type='search']
	{
		height: 35px;
		width: 300px;
	}
	.filtersection select
	{
		height: 35px;
		width: 180px;
	}
	.filtersection input[type='submit']
	{
		height: 35px;
		width: 85px;
	}
	</style></head>
<body>
	<div class="title-section">
		<img src="http://localhost/Current%20Project/mahindra/imgs/logo.png">
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
			<span style="margin-left: 90px;">
				<h1 style="text-align: center; font-size: 40px;">Damage Inward Reports</h1>
				<h3 style="margin-left: 90px;">Export	<a href="download_excel_new_damage_report.php">Excel</a></h3>
				<div class="filtersection">
					<form action="" method="get">
						<table>
							<tr>
								<td>
									<input type="search" name="serach_invoice_number" placeholder="Invoice Number">
								</td>
								<td>
									<select name="Warehouse_location">
								<option value="">-- Select Warehouse --</option>
								<?php 
									$select_warhouse="SELECT `id`, `name`, `incharge`, `location`, `CreatedDate` FROM `warehous`";
									$run_warehouse=mysqli_query($conn,$select_warhouse);
									while ($row_warehouse=mysqli_fetch_array($run_warehouse))
									{
										?>
										<option value="<?php echo $row_warehouse['name']?>"><?php echo $row_warehouse['name']?></option>
										<?php
									}
								 ?>
							</select>
								</td>
								<td>
									<input type="submit" name="submit" value="submit">
								</td>
							</tr>
						</table>
					</form>
				</div>
				<div style=" height: 780px; width: 1200px; overflow: auto;">
				<table style="margin-left: 30px; width: 1160px; margin-top: 20px;" border="1">
					<tr style="font-size: 25px; ">
						<th>Invoice Number</th>
						<th>Item Name</th>
						<th>Quantity</th>
						<th>Value</th>
						<th>Serial Number</th>
						<th>Work Done by</th>
						<th>Date</th>
						<th>Details</th>
					</tr>
					<?php 
						$conn = mysqli_connect("localhost","root","","mahindra_susten");
						$invoice_number_1=$_GET['serach_invoice_number'];
						$warehouse=$_GET['Warehouse_location'];
						if ($invoice_number_1!="") 
						{
							$new_1="1";
						}
						else
						{
							$new_2="2";
						}
						if ($warehouse!="")
						 {
							$new="3";
						}
						else
						{
							$new="6";
						}
					
						 $get_24=$new_1+$new;
						switch ($get_24)
						 {
							case '6':
								$get_data_1="SELECT SELECT `id`, `invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `warehouse`, `CreateDate` FROM `damage_quantity` ORDER BY `CreateDate` DESC;";
								break;

							case '7':
								$get_data_1="SELECT * FROM `damage_quantity` WHERE `invoiceNumber`='$invoice_number_1'  ORDER BY  `CreateDate` DESC;";
								break;

							case '3':
								$get_data_1="SELECT * FROM `damage_quantity` WHERE `warehouse`='$warehouse'  ORDER BY  `CreateDate` DESC;";
								break;

							case '4':
								$get_data_1="SELECT * FROM `damage_quantity` WHERE `invoiceNumber`='$invoice_number_1' AND `warehouse`='$warehouse'  ORDER BY  `CreateDate` DESC";
								break;
						}

						$get_data_1;
						//$get_data = "SELECT `id`, `invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `CreateDate` FROM `damage_quantity` ORDER BY `CreateDate` DESC";
						$run_data=mysqli_query($conn,$get_data_1);

						while ($row_data=mysqli_fetch_assoc($run_data))
						{
							?>
								<tr>
									<td><?php echo $row_data['invoiceNumber'];?></td>
									<td><?php echo $row_data['ItemName'];?></td>
									<td><?php echo $row_data['Quantity'];?></td>
									<td><?php echo $row_data['Value'];?></td>
									<td><?php echo $row_data['serialNumber'];?></td>
									<td><?php echo $row_data['WorkDoneBy'];?></td>
									<td><?php echo $row_data['CreateDate'];?></td>
									<td><a href="inward_details.php?id=<?php echo $row_data['invoiceNumber'];?>">Deatils</a></td>
								</tr>
							<?php
						}
					 ?>
				</table>
			</span>
		</div>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>