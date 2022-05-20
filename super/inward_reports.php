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
	<title>Inward Reports</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
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
			<span style="margin-left: 90px;">
				<h1 style="margin-left: 100px; font-size: 40px;">Inward Reports</h1>
				<h3 style="margin-left: 90px;">Export	<a href="download_inward_reort_excel.php">Excel</a></h3>
				<table style="margin-left: 90px; width: 1000px; margin-top: 20px;">
					<tr style="font-size: 25px;">
						<th>Invoice Number</th>
						<th>Item Name</th>
						<th>Serial Number</th>
						<th>Work Done by</th>
						<th>Date</th>
						<th>Details</th>
					</tr>
					<?php 
						$conn = mysqli_connect("localhost","root","","mahindra_susten");

						$get_data = "SELECT `id`, `InvoiceNumber`, `BeneficiaryId`, `Circle`, `State`, `Power`, `PumpLoad`, `BeneficiaryName`, `BeneficiaryMobileNumber`, `SuplierName`, `SupplierMobileNumber`, `SRN`, `SRMN`, `WorkAssignTo`, `warehouse`, `WorkStatus`, `SupDoc`, `VechicalNo`, `CreatedDate` FROM `invoice` ";
						$run_data=mysqli_query($conn,$get_data);

						while ($row_data=mysqli_fetch_assoc($run_data))
						{
							?>
								<tr>
									<td><?php echo $row_data['InvoiceNumber'];?></td>
									<td><?php echo $row_data['BeneficiaryId'];?></td>
									<td><?php echo $row_data['State'];?></td>
									<td><?php echo $row_data['WorkAssignTo'];?></td>
									<td><?php echo $row_data['CreatedDate'];?></td>
									<td><a href="inward_details.php?id=<?php echo $row_data['InvoiceNumber'];?>">Deatils</a></td>
								</tr>
							<?php
						}
					 ?>
				</table>
			</span>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>