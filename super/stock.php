<?php
	error_reporting('0');
	session_start();

	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role="super";
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
	
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Abstract </title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/stcok.css">
	<style type="text/css">
		td,th
		{
			padding-left: 10px;
			padding-right: 10px;
			padding-top: 10px;
			padding-bottom: 10px;
			text-align: center;
		}
		.controle-section,.working-section
		{
			height: 1450px;
		}
	</style>
</head>
<body>
	<img src="http://localhost/Current%20Project/mahindra/imgs/logo.png" class="logo">
<div class="title-section">
				<div class="header-area">
			<a href="index.php" style="font-family: rockwell; margin-top:20px;"><?php echo $company_name; ?> </a>
		</div>
	</div>
	<div class="controle-section">
		<div class="links-area">
			<span>
				Control Panel
			</span>
<main class="main-menue">
					<section>
						<a href="index.php">Home</a>
					</section>
					<section id="deliverynote">
						<a href="#deliverynote">Inward Order</a>
						<p>
							<button>
								<a href="create_delivery_order.php">Create</a>
							</button>
							<br>
							<button>
								<a href="manage_deliviray_order.php">Manage</a>
							</button>
							<br>
						</p>
					</section>
					
					<section id="Item">
						<a href="#Item">Item </a>
						<p>
							<button>
								<a href="add_new_item.php">Add</a>
							</button>
							<br>
							<button>
								<a href="manage_item.php">Manage</a>
							</button>
							<br>
						</p>
					</section>
					<section id="invoice">

						<a href="#invoice">Outward Order</a>
						<p>
							<button>
								<a href="create_invoice.php">Create</a>
							</button>
							<br>
							<button>
								<a href="manage_invoice.php">Manage</a>
							</button>
							<br>
						</p>
					</section>
					<section id="newreports">
						<a href="#newreports"> Reports</a>
						<p>
							<button>
								<a href="new_inward_reports.php">Inward</a>
							</button>
							<br>
							<button>
								<a href="new_outward_report.php">Outward</a>
							</button>
							<br>
							<button>
								<a href="new_damage_report.php">Damage</a>
							</button>
							<br>
						</p>
					</section>
					<section id="stock">
						<a href="stock.php">Abstract</a>
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
					<h1 style="text-align:center; font-size:40px; margin-bottom:20px;">Abstract</h1>
					<div class="action-button-section">
						Export
						<button style="margin-bottom: 20px;">
							<a href="download_excel_stock.php">Excel</a>
						</button>
					</div>
				</div>
			</div>
			<div class="table-class">
				<div style="height:1250px; width: 1210px; overflow: auto; padding-left: 20px; padding-top: 10px; padding-bottom: 15px;">
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
							//function for recived quantity
							function in($item_name,$warehouse)
							{
								$item_name;
								$warehouse;
									include 'config.php';
								$sql="SELECT SUM(`Quantity`)as `total` FROM `inward` WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse'";
								$run_query=mysqli_query($conn,$sql);
								while ($row=mysqli_fetch_array($run_query))
								{
									echo $row['total'];
								}
								
							}
							//function issued
							function out($item_name,$warehouse)
							{
								$item_name;
								$warehouse;
									include 'config.php';
								$sql="SELECT SUM(`Quantity`)as `total` FROM `outward` WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse'";
								$run_query=mysqli_query($conn,$sql);
								while ($row=mysqli_fetch_array($run_query))
								{
									echo $row['total'];
								}

							}
							$select_table_data_query="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `warehouse`='$warehouse'";
							$run_table_data=mysqli_query($conn,$select_table_data_query);
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