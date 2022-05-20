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
	<title>Add New Emp</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<style type="text/css">
		label
		{
			font-size: 30px;
			line-height: 40px;
		}
		input[type='text']
		{
			margin-left: 20px;
		}
		select
		{
			width: 280px;
			height: 40px;
			font-size: 25px;
		}
		.controle-section
		{
			height: 750px;
		}
		.working-section
		{
			height: 750px;
		}
		table
		{
			line-height: 50px;
		}
		td
		{
			margin-right: 25px;
			margin-left: 20px;
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
			<span>
				<h1 style="font-size: 40px; text-align: center; margin-bottom: 20px;"> Add New Employee </h1>
				<form action="" method="post">				
				<table style="margin-left: 90px;">
					<tr>
						<td>
							<label>								
								Full Name
  							</label>
						</td>
						<td>
							<input type="txt" name="emp_full_name" placeholder="Full Name" style="height: 30px; font-size: 25px;">
						</td>
					</tr>
					<tr>
						<td>
							<label>								
								Addhar Card
  							</label>
						</td>
						<td>
							<input type="txt" name="addhar_card" placeholder="Addhar Card" style="height: 30px; font-size: 25px;">
						</td>
					</tr>
						<tr>
						<td>
							<label>
								Address
							</label>
						</td>
						<td>
							<textarea name="emp_address" placeholder="Address" style="resize: none;
							height: 80px; width:310px; font-size: 25px;"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Mobile Number
							</label>
						</td>
						<td>
							<input type="txt" name="emp_mobile_number" placeholder="Mobile Number" style="height: 30px; font-size: 25px;">
						</td>
					</tr>
					<tr>
						<td>
							<label>
								E-mail
							</label>
						</td>
						<td>
							<input type="email" name="emp_email" placeholder="E-mail" style="height: 30px; font-size: 25px;">
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Date of Birth
							</label>
							
						</td>
						<td>
							<input type="date" name="emp_date_birth" placeholder="date of birth" style="height: 30px; font-size: 25px;">
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Username
							</label> 
						</td>
						<td>
							<input type="txt" name="username" placeholder="usernmae" style="height: 30px; font-size: 25px;">
						</td>
					</tr>
					<tr>
						<td>
							<label>
								Password
							</label>
						</td>
						<td>
							<input type="password" name="password" placeholder="********" style="height: 30px; font-size: 25px;">
						</td>
					</tr>
					<tr>
						<td>
							<label> Select Role</label>
						</td>
						<td>
							<select name="role">
								<option>-- Select Role --</option>
								<option value="super"> Supervisor </option>
								<option value="master"> Master </option>
								<option value="procurement">Procurement</option>
								<option value="quality">Quality</option>
							</select>					</td>
					</tr>
					<tr>
						<td>
							<label>Warehouse</label>
						</td>
						<td style="margin-left: 20px;">
							<select name="Warehouse_location">
								<option>-- Select Warehouse --</option>
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
					</tr>
					<tr>
						<td colspan="3">
							<input type="reset" name="reset" value="Reset" style="margin-left: 220px; margin-top: 20px; height: 40px; width: 90px; font-size: 25px; background-color: red; border:none;">
							<input type="submit" name="submit" value="Save" style="margin-left: 20px; margin-top: 20px; height: 40px; width: 90px; font-size: 25px; background-color: green; border:none;">
						</td>
					</tr>
				</table>
				</form> 
				<?php 
					if (isset($_POST['submit']))
					 {
						$emp_name=$_POST['emp_full_name'];
						$emp_address=$_POST['emp_address'];
						$emp_mobile_number=$_POST['emp_mobile_number'];
						$email=$_POST['emp_email'];
						$emp_date_birth=$_POST['emp_date_birth'];
						$username=$_POST['username'];
						$password=$_POST['password'];
						$role=$_POST['role'];
						$addhar_card=$_POST['addhar_card'];
						$Warehouse=$_POST['Warehouse_location'];


						if ($emp_name!=""&&$username!="") 
						{
							$inser_emp="INSERT INTO `login_details` (`id`, `FirstName`, `AddharCrad`, `Address`, `MobileNumber`, `Email`, `DateOfBirth`, `username`, `password`, `role`, `warehouse`) VALUES (NULL, '$emp_name', '$addhar_card', 'emp_address', '$emp_mobile_number', '$email', '$emp_date_birth', '$username', '$password', '$role', '$Warehouse')";
							$run = mysqli_query($conn,$inser_emp);

							if ($run = true)
							{
								echo "<script>alert('Employ Added')</script>";
							}
							else
							{
								echo "<script>alert('some thing worng')</script>";
							}
						}

					}

				 ?>
			</span>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>