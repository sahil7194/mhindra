<?php
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role=$_SESSION['role'];
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
	<meta charset="utf-8">
	<title>Manage Item</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/manage_item.css">
	<style type="text/css">
		th,td
		{
			padding-left: 8px;
			padding-top: 8px;
			padding-right: 8px;
			padding-bottom: 8px;
		}
		.controle-section, .working-section
		{
			height: 750px;
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
			</span><main class="main-menue">
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
			<h1 style="text-align: center; font-size:40px; margin-bottom:10px;"> Manage Item</h1>
			<div style=" margin-left:100px;">
				Export	<br>	
				<button name="excel" style="margin-bottom:10px; margin-left:30px;">
					<a href="dwonload_item_excel.php">Excel</a>
				</button>
				<div style="height: 580px; overflow:auto; margin-top:20;">
					<table border="1">
						<tr>
							<th>
								Sr.no
							</th>
							<th>
								Item Code
							</th>
							<th>
								Item Name
							</th>
							<th>
								UOM
							</th>
							<th>
								Average Value
							</th>
							<th>
								Fixed Quantity(to out automatic)
							</th>
							<th> 
								Scanble Status
							</th>
							<th>
								Note
							</th>
							<th>
								Edit
							</th>
							<th>
								 View QR code
							</th>							
						</tr>
						<?php 
						error_reporting('0');

						$select_query="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `warehouse`='POLESTAR'";
						$run = mysqli_query($conn,$select_query);
						while ($row = mysqli_fetch_assoc($run)) 
						{
							$counter=$counter+1;
							?>
							<tr>
								<td>
									<?php echo $counter; ?>
								</td>
								<td>
									<?php echo $row['ItemCode'];?>
								</td>
								<td>
									<?php echo $row['ItemName'];?>
								</td>
								<!--
								<td>
									<?php echo $row['ItemValue'];?>
								</td>
							-->
								<td>
									<?php echo $row['UOM'];?>
								</td>
								<td>
									<?php echo $row['FixedValue'];?>
								</td>
								<td>
									<?php echo $row['FixedQuantity'];?>
								</td>
								<td>
									<?php echo $row['Sacnable']; ?>
								</td>
								<td width="200px">
									<?php echo $row['Note'] ?>
								</td>
								
								<td>
									<button>
										<a href='item_edit.php?id=<?php echo $row['id'];?>'>Edit</a>
									</button>
									<button>
										<a href='item_delete.php?id=<?php echo $row['id'];?>'>Delete</a>
									</button>
								</td>
								<td align="center">
									<button style="">
										<a target="_blank" href='item_qr.php?id=<?php echo $row['id'];?>'>QR Code</a>
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
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>