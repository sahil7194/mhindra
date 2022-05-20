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
	<title> Create new Outward</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/create_invoice.css">
	<style type="text/css">
		.controle-section,.working-section
		{
			height: 1100px;
		}
	</style>
	<script type="text/javascript">
		function uppercase()
		 {
		    var txt = document.getElementById("name");
		    txt.value = txt.value.toUpperCase();
     	 }
     	 function uppercase1()
		 {
		    var txt = document.getElementById("name1");
		    txt.value = txt.value.toUpperCase();
     	 }
     	  function uppercase2()
		 {
		    var txt = document.getElementById("name2");
		    txt.value = txt.value.toUpperCase();
     	 }
	</script>
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
			<span>
				<div class="form-section">
				<h1 style="text-align:center; font-size:40px;">Create Outward</h1>
				<form action="" method="post">
					<?php 
					error_reporting('0');
							if (isset($_POST['get_data']))
							{
								 $Beneficiary_Id=$_POST['Beneficiary_Id'];
								$sql_get_data="SELECT `id`, `Beneficiary_Id`, `Beneficiary_Name`, `Aadhar_NO`, `Mobile_Number`, `Water_Source`, `Land_Address`, `Category`, `Circle_Name`, `Division_Name`, `Pump_Load`, `Work_Order_No`, `Invoice_Date`, `CONTRACT_NO`, `Invoice_No`, `DC_Date`, `CreateDate` FROM `benifiry_data` WHERE `Beneficiary_Id`='$Beneficiary_Id'";
									$sql_run_get_data=mysqli_query($conn,$sql_get_data);
									$count=mysqli_num_rows($sql_run_get_data);
									while ($row_ben_data=mysqli_fetch_array($sql_run_get_data))
									 {
										$Beneficiary_Name=$row_ben_data['Beneficiary_Name'];
										$Aadhar_NO=$row_ben_data['Aadhar_NO'];
										$Mobile_Number=$row_ben_data['Mobile_Number'];
										$Water_Source=$row_ben_data['Water_Source'];
										$Land_Address=$row_ben_data['Land_Address'];
										$Category=$row_ben_data['Category'];
										$Circle_Name=$row_ben_data['Circle_Name'];
										$Division_Name=$row_ben_data['Division_Name'];
										$Pump_Load=$row_ben_data['Pump_Load'];
										$Work_Order_No=$row_ben_data['Work_Order_No'];
										$Invoice_Date=$row_ben_data['Invoice_Date'];
										$CONTRACT_NO=$row_ben_data['CONTRACT_NO'];
										$Invoice_No=$row_ben_data['Invoice_No'];
										$DC_Date=$row_ben_data['DC_Date'];
									}

							}
						 ?>

					<table style="margin-top: 30px;">
						<tr>
							<td class="fild-title">
								Beneficiary Id
							</td>
							<td>
								<input type="text" placeholder="Beneficiary Id" name="Beneficiary_Id" value="<?php echo $Beneficiary_Id ?>">
								<button name="get_data" style="margin-left: 20px; height: 35px; width:80px; font-size:15px;"> Get Data</button>
							</td>
						</tr>
						<tr>
							<!--
						<tr>
							<td class="fild-title">
								Invoice Number
							</td>
							<td>
								<input type="text" placeholder="Invoice Number" name="invoice_no">						
							</td>
						</tr>
					-->
						<tr>
							<td class="fild-title">
								Beneficiary Name
							</td>
							<td>
								<input type="text" placeholder="Beneficiary Name" name="Beneficiary_Name" value="<?php echo $Beneficiary_Name; ?>">
							</td>
						</tr>
						<tr>
							<td class="fild-title">
								Aadhar NO
							</td>
							<td>
								<input type="text" placeholder="Aadhar NO" name="Aadhar_NO" value="<?php echo $Aadhar_NO; ?>">
							</td>
						</tr>
						<tr>
							<td class="fild-title">
								Mobile Number
							</td>
							<td>
								<input type="text" placeholder="Mobile Number" name="Mobile_Number" value="<?php echo $Mobile_Number; ?>">
							</td>
						</tr>
						<tr>
							<td class="fild-title">
								Water Source
							</td>
							<td>
								<input type="text" placeholder="Water Source" name="Water_Source" value="<?php echo $Water_Source; ?>">
							</td>
						</tr>
						<tr>
							<td class="fild-title">
								Land Address
							</td>
							<td>
								<input type="text" placeholder="Land Address" name="Land_Address" value="<?php echo $Land_Address; ?>">
							</td>
						</tr>
						<tr>
							<td class="fild-title">
								Category
							</td>
							<td>
								<input type="text" placeholder="Category" name="Category" value="<?php echo $Category; ?>">
							</td>
						</tr>

						<tr>
							<td class="fild-title">
								Circle Name	
							</td>
							<td>
								<input type="text" placeholder="Circle Name" name="Circle_Name" value="<?php echo $Circle_Name; ?>">
							</td>
						</tr>
						<tr>
							<td class="fild-title">
								Division Name
							</td>
							<td>
								<input type="text" placeholder="Division Name" name="Division_Name" value="<?php echo $Division_Name; ?>">
							</td>
						</tr>
						<tr>
							<td class="fild-title">
								Pump Load
							</td>
							<td>
								<input type="text" placeholder="Pump Load" name="Pump_Load" value="<?php echo $Pump_Load; ?>">
							</td>
						</tr>
						<tr>
							<td class="fild-title">
								Work Order No
							</td>
							<td>
								<input type="text" placeholder="Work Order No" name="Work_Order_No" value="<?php echo $Work_Order_No; ?>">
							</td>
						</tr>
						<tr>
							<td class="fild-title">
								Invoice Date
							</td>
							<td>
								<input type="text" placeholder="Invoice Date" name="Invoice_Date" value="<?php echo $Invoice_Date; ?>">
							</td>
						</tr>
						<!--
						<tr>
							<td class="fild-title">
								CONTRACT NO
							</td>
							<td>
								<input type="text" placeholder="CONTRACT NO" name="CONTRACT_NO" value="<?php echo $CONTRACT_NO; ?>">
							</td>
						</tr>
					-->
						<tr>
							<td class="fild-title">
								Invoice No
							</td>
							<td>
								<input type="text" placeholder="Invoice No" name="invoice_no" value="<?php echo $Invoice_No; ?>">
							</td>
						</tr>
						<tr>
							<td class="fild-title">
								DC Date
							</td>
							<td>
								<input type="text" placeholder="DC Date" name="DC_Date" value="<?php echo $DC_Date; ?>">
							</td>
						</tr>
						<tr>
						<td class="fild-title">
							Installer Name
						</td>
						<td>
							<select name="suplier_name">
								<option>-- Select --</option>
								<?php 
										$select_instaler="SELECT `Name`, `Mobile`FROM `installer` ORDER BY `CreatedDate` DESC";
										$run_insataler=mysqli_query($conn,$select_instaler);
										while ($row_installer=mysqli_fetch_array($run_insataler)) 
										{
											?>
											<option <?php echo $row_installer['Name'] ?>> <?php echo $row_installer['Name'] ?></option>
											<?php
										}
								 ?>											
							</select>
							<!--<input type="text" name="suplier_name" placeholder="Installer Name" id="name" onkeyup="uppercase()">-->
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Installer Mobile Number
						</td>
						<td>						
							<input type="text"  name="suplier_mobile_number" placeholder="Installer Mobile Number">
						</td>
						
					</tr>
					<tr>
						<td class="fild-title">
							Receiver's Name
						</td>
						<td>
							<input type="text" name="supliers_receives_name" placeholder=" Receiver's Name" id="name1" onkeyup="uppercase1()">
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Receiver's Mo.No
						</td>
						<td>
							<input type="text" name="supliers_receives_mobile" placeholder=" Receiver's mobile">
						</td>
					</tr>
					<tr>
						<td class="fild-title">
							Vehicle Number
						</td>
						<td>
							<input type="text" name="vehical" placeholder="Vehicle Number" id="name2" onkeyup="uppercase2()">
						</td>
					</tr>
					<!--
					<tr>
						<td class="fild-title">
							Work Assignment
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
				-->
					</table>
					<input type="reset" name="reset" value="Reset">
						<input type="submit" name="submit" value="Submit">
				</form>
			</span>
		</div>
		</div>
		<?php 
			if (isset($_POST['submit']))
			{
				$Invoice_No=$_POST['invoice_no'];//done
				$Beneficiary_Id=$_POST['Beneficiary_Id'];//done
				$Beneficiary_Name=$_POST['Beneficiary_Name'];//done
				$Aadhar_NO=$_POST['Aadhar_NO'];//done	
				$Mobile_Number=$_POST['Mobile_Number'];	//done
				$Water_Source=$_POST['Water_Source'];//done
				$Land_Address=$_POST['Land_Address'];	
				$Category=$_POST['Category'];//done
				$Circle_Name=$_POST['Circle_Name'];	//done
				$Division_Name=$_POST['Division_Name'];	
				$Pump_Load=$_POST['Pump_Load'];	//done
				$Work_Order_No=$_POST['Work_Order_No'];
				$Invoice_Date=$_POST['Invoice_Date'];//	
				$CONTRACT_NO=$_POST['CONTRACT_NO'];	
				$DC_Date=$_POST['DC_Date'];
				$Installer_Name=$_POST['suplier_name'];//done
				$Installer_Mobile_Number=$_POST['suplier_mobile_number'];//done
				$Installer_Receiver_Name=$_POST['supliers_receives_name'];//done
				$Installer_Receiver_Mo=$_POST['supliers_receives_mobile'];//done	
				$Vehicle_Number=$_POST['vehical'];//done	
				$Work_Assign_to=$_POST['work_assign'];	//done
				if ($Invoice_No!="") 
				{
					$sql_for_insert="INSERT INTO `invoice` (`id`, `InvoiceNumber`, `BeneficiaryId`, `Division_Name`, `Circle`, `PumpLoad`, `watersource`, `BeneficiaryName`, `BeneficiaryMobileNumber`, `SuplierName`, `SupplierMobileNumber`, `SRN`, `SRMN`, `WorkAssignTo`, `WorkStatus`, `CreatedDate`, `warehouse`, `VechicalNo`, `Aadhar_NO`, `SupDoc`, `Category`, `Work_Order_No`, `Invoice_Date`, `CONTRACT_NO`, `DC_Date`,`CreatedBy`) VALUES (NULL, '$Invoice_No', '$Beneficiary_Id', '$Division_Name', '$Circle_Name', '$Pump_Load', '$Water_Source', '$Beneficiary_Name', '$Mobile_Number', '$Installer_Name', '$Installer_Mobile_Number', '$Installer_Receiver_Name', '$Installer_Receiver_Mo', '$Work_Assign_to', 'incomplete', current_timestamp(), '$warehouse', '$Vehicle_Number', '$Aadhar_NO', 'sup', '$Category', '$Work_Order_No', '$Invoice_Date', '$CONTRACT_NO', '$DC_Date','$username');";
					$run_query=mysqli_query($conn,$sql_for_insert);
					if ($run_query == true) 
					{
						$title="Outward Order";
						$message="Complete Outward order for :- ".$Invoice_No;
						$create_notification="INSERT INTO `notification`(`Sento`, `Title`, `Massage`) VALUES ('$Work_Assign_to','$title','$message')";
						$run_notification=mysqli_query($conn,$create_notification);
						if ($run_notification == true ) 
						{
							echo "<script>alert('Data Save')</script>";	
							header('Location:manage_invoice.php');
						}						
					}
					else
					{
						echo "<script>alert(' Fail to Data Save')</script>";	
					}
				}

			}

		 ?>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>

</body>
</html>
