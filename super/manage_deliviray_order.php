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
<!DOCTYPE html>
<html>
<head>
	<title>Manage Delivery </title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/manage_deliviray_order.css">
	<style type="text/css">
		.table-view
		{
			margin-right: 15px;
			height: 430px;
			overflow: auto;
		}
		
		.manage-table
		{
			width: 1500px;
		}
		td,th
		{
			padding-top: 9px;
			padding-bottom: 9px;
			padding-right: 9px;
			padding-left: 9px;
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
			<span>
				<div class="data-view">
					<h1 style="text-align: center; font-size:40px;">Manage Inward</h1>
					<div class="action-button-section">
						Export
						<form action="" method="post">
								<button name="excel">
									<a href="download_excel_manage_delivery_order.php">Excel</a>
								</button>
						</form>
					</div>
					<div class="table-view">
					<table class="manage-table" border="1">
						<tr>
							<th>
								PO NO
							</th>
							<th>
								PO Date
							</th>
							<th>
								Invoice Number
							</th>
							<th>
								Vendor Name
							</th>
							<!--

							<th>
								Vendor Mobile Number
							</th>
														<th>
								Transporter Sender's Name	
							</th>
							<th>
								 Vehicle NO.	
							</th>
						
							<th>
								Work Assigned
							</th>
						-->
							<th>
								Add Materil
							</th>
							<th>
								Date & Time
							</th>
							<th>
								Action
							</th>
						</tr>
						<?php

						 	$conn = mysqli_connect("localhost","root","","mahindra_susten");

						 	$select_delivery_note="SELECT `id`, `DeliveryNote`, `SuplierName`, `SuplierMobileNumber`, `SSN`, `SSMN`, `Workassign`, `WorkStatus`, `SupDoc`, `CreateDate`,`PoNumber`,`PoDate` FROM `delivaerynote` ORDER BY `CreateDate` DESC";
						 	$run_query = mysqli_query($conn,$select_delivery_note);
						 	while ($row_delivery_note = mysqli_fetch_assoc($run_query))
						 	{
						 		?>
						 		<tr>
						 			<td>
						 				<?php echo $row_delivery_note['PoNumber'];?>
						 			</td>
						 			<td>
						 				<?php echo $row_delivery_note['PoDate'];?>
						 			</td>
						 			<td>
						 				<a href="inward_details.php?id=<?php echo $row_delivery_note['DeliveryNote'];?>">
						 				<?php echo $row_delivery_note['DeliveryNote'];?>
						 				</a>
						 			</td>
						 			<td>
						 				<?php echo $row_delivery_note['SuplierName'];?>
						 			</td>
						 			<!--
						 			<td>
						 				<?php echo $row_delivery_note['SuplierMobileNumber'];?>
						 			</td>
						 			<td>
						 				<?php echo $row_delivery_note['SSN'];?>
						 			</td>
						 			<td>
						 				<?php echo $row_delivery_note['SSMN'];?>
						 			</td>
						 		
						 			<td>
						 				<?php echo $row_delivery_note['Workassign'];?>
						 			</td>
						 		-->
						 			<td>
						 				<a target="_blank" href="inward.php?invoice_number=<?php echo $row_delivery_note['DeliveryNote']; ?>" >Add Material</a>
						 			</td>
						 			<td>
						 				<?php echo $row_delivery_note['CreateDate'];?>
						 			</td>
						 			<td>
						 				<a target="_blank" href="<?php echo $row_delivery_note['SupDoc']; ?>" ><?php echo $row_delivery_note['SupDoc']; ?></a>
						 			</td>
						 		</tr>
						 		<?php						 		
						 	}
						 ?>
					</table>
					</div>
				</div>
			</span>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>


	</table>
</body>
</html>