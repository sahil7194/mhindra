<?php
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role="super";
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
	
  ?><!DOCTYPE html>
<html>
<head>
	<title> Create Outward</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/create_invoice.css">
</head>
<body>
	<img src="http://localhost/Current%20Project/mahindra/imgs/logo.png" class="logo">
	<div class="title-section">		
		<div class="header-area">
			<a href="index.php"><?php echo $company_name;?></a>
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
								<a href="add_new_item.php">ADD</a>
							</button>
							<br>
							<button>
								<a href="manage_item.php">Manage</a>
							</button>
							<br>
						</p>
					</section>
					<section id="invoice">

						<a href="#invoice">Outward</a>
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
						<a href="stock.php">stock</a>
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
				<div class="form-section">
				<h1>Create Outward</h1>
				<form action="" method="post">			
				<table style="margin-top: 10px;">
					<tr>
						<td class="fild-title">
							Invoice Number
						</td>
						<td>
							<input type="text" name="invoice_number" placeholder="Invoice Number">
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Beneficiary Id
						</td>
						<td>
							<input type="text" name="beneficiary_id" placeholder="Beneficiary Id">
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Beneficiary Name
						</td>
						<td>
							<input type="text" name="beneficiary_name" placeholder="Beneficiary Name">
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Beneficiary Mobile Number
						</td>
						<td>
							<input type="text" name="beneficaiary_mobile_number" placeholder="Beneficiary Mobile Number">
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							State
						</td>
						<td>
							<select name="state" id="state" onchange="myFunction()">
									<option value="gh">-- Select State --</option>
									<option value="Andhra Pradesh">Andhra Pradesh</option>
									<option value="Arunachal Pradesh">Arunachal Pradesh</option>
									<option value="Assam">Assam</option>
									<option value="Bihar">Bihar</option>
									<option value="Chhattisgarh">Chhattisgarh</option>
									<option value="Goa">Goa</option>
									<option value="Gujarat">Gujarat</option>
									<option value="Haryana">Haryana</option>
									<option value="Himachal Pradesh">Himachal Pradesh</option>
									<option value="Jharkhand">Jharkhand</option>
									<option value="Karnataka">Karnataka</option>
									<option value="Kerala">Kerala</option>
									<option value="Madhya Pradesh">Madhya Pradesh</option>
									<option value="Maharashtra">Maharashtra</option>
									<option value="Manipur">Manipur</option>
									<option value="Meghalaya">Meghalaya</option>
									<option value="Mizoram">Mizoram</option>
									<option value="Nagaland">Nagaland</option>
									<option value="Odisha">Odisha</option>
									<option value="Punjab">Punjab</option>
									<option value="Rajasthan">Rajasthan</option>
									<option value="Sikkim">Sikkim</option>
									<option value="Tamil Nadu">Tamil Nadu</option>
									<option value="Telangana">Telangana</option>
									<option value="Tripura">Tripura</option>
									<option value="Uttar Pradesh">Uttar Pradesh</option>
									<option value="Uttarakhand">Uttarakhand</option>
									<option value="West Bengal">West Bengal</option>Arunachal Pradesh
								</select>
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Circle 
						</td>
						<td>
							<input type="text" name="circle" placeholder="Circle">
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Power
						</td>	
						<td>
							<select name="power">
								<option>-- Select Power --</option>
								<option value="3"> 3 HP </option>
								<option value="5"> 5 HP </option>
								<option value="7.5"> 7.5 HP </option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Water Sources
						</td>
						<td>
							<select name="watersource">
								<option>-- Select Water Sources --</option>
								<option value="Well">Well</option>
								<option value="Bore Well">Bore Well</option>
								<option value="River">River</option>
								<option value="Other">Other</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Pump Head
						</td>
						<td>
							<select>
								<option>-- Select Pump Head --</option>
								<option value="30"> &nbsp;&nbsp; 30 M</option>
								<option value="50"> &nbsp;&nbsp;  50 M</option>
								<option value="70"> &nbsp;&nbsp;  70 M</option>
								<option value="100"> &nbsp;&nbsp;  100 M</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Installer Name
						</td>
						<td>
							<input type="text" name="suplier_name" placeholder="Installer Name">
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Installer Mobile Number
						</td>
						<td>
							<input type="text" name="suplier_mobile_number" placeholder="Installer Mobile Number">
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Installer's Receiver's Name
						</td>
						<td>
							<input type="text" name="supliers_receives_name" placeholder="Installer's Receiver's Name">
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Installer's Receiver's Mobile Number
						</td>
						<td>
							<input type="text" name="supliers_receives_mobile" placeholder="Installer's Receiver's mobile">
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Vehicle Number
						</td>
						<td>
							<input type="text" name="vehical" placeholder="Vehicle Number">
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Work Assign to
						</td>
						<td>
							<select name="work_assign">
								<option>-- Select Worker --</option>
								<?php 
									$get_worker_query="SELECT `id`,`username`, `password`, `role` FROM `login_details` WHERE `role`='worker' ORDER BY `login_details`.`username` ASC";
									$run_wirker = mysqli_query($conn,$get_worker_query);
									while ($worker = mysqli_fetch_assoc($run_wirker)) 
									{
										?>
										<option value="<?php echo $worker['username'];?>">
											<?php echo $worker['username'];?>
										</option>
										<?php
									}
								 ?>
							</select>
						</td>
					</tr>
				</table>					
						<input type="reset" name="reset" value="reset">
						<input type="submit" name="submit" value="submit">
				</form>
			</span>
		</div>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>

</body>
</html>
<?php 
	if (isset($_POST['submit'])) 
	{
		$invoice_number=$_POST['invoice_number'];
		$beneficiary_id=$_POST['beneficiary_id'];
		$beneficiary_name=$_POST['beneficiary_name'];
		$beneficaiary_mobile_number=$_POST['beneficaiary_mobile_number'];
		$suplier_name=$_POST['suplier_name'];
		$suplier_mobile_number=$_POST['suplier_mobile_number'];
		$supliers_receives_name=$_POST['supliers_receives_name'];
		$supliers_receives_mobile=$_POST['supliers_receives_mobile'];
		$work_assign=$_POST['work_assign'];
		$circle=$_POST['circle'];
		$power=$_POST['power'];
		$pump_head=$_POST['pump_head'];
		$state=$_POST['state'];
		$vehical=$_POST['vehical'];
		$watersource=$_POST['watersource'];
	
		if ($beneficiary_id!="" && $suplier_name!=" " && $work_assign!="") 
		{
			//$insert_query = "INSERT INTO `invoice` (`id`, `InvoiceNumber`, `BeneficiaryId`, `Circle`, `State`, `Power`, `PumpLoad`, `BeneficiaryName`, `BeneficiaryMobileNumber`, `SuplierName`, `SupplierMobileNumber`, `SRN`, `SRMN`, `WorkAssignTo`, `WorkStatus`, `SupDoc`, `VechicalNo`, `CreatedDate`,`warehouse`) VALUES (NULL, '$invoice_number', '$beneficiary_id', '$circle', '$state', '$power', '$pump_head', '$beneficiary_name', '$beneficaiary_mobile_number', '$suplier_name', '$suplier_mobile_number', '$supliers_receives_name', '$supliers_receives_mobile', '$work_assign', 'incomplete', '0', '$vehical', current_timestamp(),'$warehouse');";

			$insert_query="INSERT INTO `invoice` (`id`, `InvoiceNumber`, `BeneficiaryId`, `Circle`, `State`, `Power`, `PumpLoad`, `BeneficiaryName`, `BeneficiaryMobileNumber`, `SuplierName`, `SupplierMobileNumber`, `SRN`, `SRMN`, `WorkAssignTo`, `warehouse`, `WorkStatus`, `SupDoc`, `VechicalNo`, `CreatedDate`,`watersource`) VALUES (NULL, '$invoice_number', '$beneficiary_id', '$circle', '$state', '$power', '$pump_head', '$beneficiary_name', '$beneficaiary_mobile_number', '$suplier_name', '$suplier_mobile_number', '$supliers_receives_name', '$supliers_receives_mobile', '$work_assign', '$warehouse', 'incomplete', 'l', '$vehical', current_timestamp(),'$watersource');";
			$run_query=mysqli_query($conn,$insert_query);

			if ($run_query == true) 
			{
				echo "<script>alert('data save')</script>";

			}
			else
			{
				echo "<script>alert('some thing worng')</script>";
			}
		}
		unset($invoice_number);
		unset($beneficiary_id);
		unset($beneficiary_name);
		unset($beneficaiary_mobile_number);
		unset($suplier_name);
		unset($suplier_mobile_number);
		unset($supliers_receives_name);
		unset($supliers_receives_mobile);
		unset($work_assign);
		unset($circle);
		unset($power);
		unset($pump_head);
		unset($state);
		unset($vehical);
	}
		
 ?>