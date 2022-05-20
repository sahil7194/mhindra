<?php
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role=$_SESSION['role'];
	$warehouse = $_SESSION['warehouse'];

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
<?php 
 error_reporting('0');
	$conn = mysqli_connect("localhost","root","","mahindra_susten");
	$fil_power=$_GET['power'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage Inoive / Outward</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/manage_invoice.css">
	<style type="text/css">
		td,th
		{
			padding-top: 9px;
			padding-bottom: 9px;
			padding-right: 9px;
			padding-left: 9px;
		}
		.controle-section
		{
			height: 900px;
		}
		.working-section
		{
			height: 900px;
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
			<h1 style="text-align: center; font-size:40px;">Manage Outward </h1>
			<div style="margin-left: 80px; margin-top:10px;"> 
					<form action="" method="get">
					<table>
						<tr>
							<td>
								<select name="power">
								<option value="">-- Select HP --</option>
								<option value="3"> 3 HP </option>
								<option value="5"> 5 HP </option>
								<option value="7.5"> 7.5 HP </option>
							</select>
							</td>
							<td>
								<button>
								Add Filter
							</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
			<div style="margin-top: 20px;margin-left:80px; height:720px; width:1180px; overflow: auto;">
				<table border="1">
					<tr>
						<th>							
							Invoice Number
						</th>
						<th>
							Beneficiary Id	
						</th>
						<th>
							Beneficiary Name
						</th>
						<th>
							Beneficiary Mobile Number
						</th>
						<th>
							Aadhar NO
						</th>
						<th>
							Category
						</th>
						<th>
							Land Address
						</th>
						<th>
							Circle
						</th>
						<th>
							Division Name
						</th>
						<th>
							Pump Load
						</th>
						<th>
							Water Source
						</th>
						<th>
							Work Order No	
						</th>
						<th>
							Inward  Date
						</th>
						<!--
						<th>
							DC Date	
						</th>
					
						<th>
							Contract NO	
						</th>
					-->
						<th>
							Installer Name	
						</th>
						<th>
							Installer Mobile Number	
						</th>
						<th>
							Installer's Receiver's Name
						</th>
						<th>
							Installer's Receiver's Mobile Number		
						</th>
						<th>
							Vehicle Number
						</th>
						<th>
							Date & Time
						</th>
						<th>
							Add Material
						</th>						
						<th>
							Action
						</th>
					</tr>
					<?php 
						$fil_power=$_GET['power'];
						
						$get_invoice="";
						if ($fil_power!="") 
						{
							$get_invoice="SELECT `id`, `InvoiceNumber`, `BeneficiaryId`, `Division_Name`, `Circle`, `Power`, `PumpLoad`, `watersource`, `BeneficiaryName`, `BeneficiaryMobileNumber`, `SuplierName`, `SupplierMobileNumber`, `SRN`, `SRMN`, `WorkAssignTo`, `WorkStatus`, `CreatedDate`, `warehouse`, `VechicalNo`, `Aadhar_NO`, `SupDoc`, `Category`, `Work_Order_No`, `Invoice_Date`, `CONTRACT_NO`, `DC_Date`, `CreatedBy` FROM `invoice` WHERE `PumpLoad`='$fil_power' AND`warehouse`='$warehouse' AND `CreatedBy`='$username' ORDER BY `CreatedDate` DESC";
						}
						else
						{
							$get_invoice="SELECT `id`, `InvoiceNumber`, `BeneficiaryId`, `Division_Name`, `Circle`, `Power`, `PumpLoad`, `watersource`, `BeneficiaryName`, `BeneficiaryMobileNumber`, `SuplierName`, `SupplierMobileNumber`, `SRN`, `SRMN`, `WorkAssignTo`, `WorkStatus`, `CreatedDate`, `warehouse`, `VechicalNo`, `Aadhar_NO`, `SupDoc`, `Category`, `Work_Order_No`, `Invoice_Date`, `CONTRACT_NO`, `DC_Date`, `CreatedBy` FROM `invoice` WHERE `warehouse`='$warehouse' AND `CreatedBy`='$username' ORDER BY `CreatedDate` DESC";						}
						
						$run_invoice = mysqli_query($conn,$get_invoice);

						while ($invoice_data=mysqli_fetch_assoc($run_invoice))
						{
							?>
								<tr>
									<td>
										<a href="detials_outward.php?id=<?php echo $invoice_data['InvoiceNumber']; ?>" target="_blank">
											<?php echo $invoice_data['InvoiceNumber']; ?>
											
										</a>
									</td>
									<td>
										<?php echo $invoice_data['BeneficiaryId']; ?>
									</td>
									<td>
										<?php echo $invoice_data['BeneficiaryName']; ?>
									</td>
									<td>
										<?php echo $invoice_data['BeneficiaryMobileNumber']; ?>
									</td>
									<td>
										<?php echo $invoice_data['Aadhar_NO']; ?>
									</td>
									<td>
										<?php echo $invoice_data['Category']; ?>
									</td>
									<td>
										<?php echo $invoice_data['Category']; ?>
									</td>
									<td>
										<?php echo $invoice_data['Circle']; ?>
									</td>
									<td>
										<?php echo $invoice_data['Division_Name']; ?>
									</td>
									<td>
										<?php echo $invoice_data['PumpLoad']; ?>HP
									</td>
									<td>
										<?php echo $invoice_data['watersource']; ?>
									</td>
									<td>
										<?php echo $invoice_data['Work_Order_No']; ?>
									</td>
									<td>
										<?php echo $invoice_data['Invoice_Date']; ?>
									</td>
									<!--
									<td>
										<?php echo $invoice_data['DC_Date']; ?>
									</td>
									<td>
										<?php echo $invoice_data['CONTRACT_NO']; ?>
									</td>
								-->
									<td>
										<?php echo $invoice_data['SuplierName']; ?>
									</td>
									<td>
										<?php echo $invoice_data['SupplierMobileNumber']; ?>
									</td>
									<td>
										<?php echo $invoice_data['SRN']; ?>
									</td>
									<td>
										<?php echo $invoice_data['SRMN']; ?>
									</td>
									<td>
										<?php echo $invoice_data['VechicalNo']; ?>
									</td>
									
									<td>
										<?php echo $invoice_data['CreatedDate']; ?>
									</td>
									<td>
										<a target="_blank" href="outward.php?id=<?php echo $invoice_data['InvoiceNumber']?>">
											Add Material
										</a>
									</td>
									<td>
										<a href="delete_invoice.php?id=<?php echo $invoice_data['id']?>">
											Delete
										</a>		
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