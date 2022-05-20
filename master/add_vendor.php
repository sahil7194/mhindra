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
	<title>Add New Vendor</title>
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
				<h1 style="text-align:center; font-size: 40px;">Add Vendor</h1>
				<div class="from-data">
						<table style="line-height:50px;">
						<form action="" method="post">
							<table>
								<tr>
									<td>
										<label>Vendor Name</label>
									</td>
									<td>
										<input type="text" name="vendor_name" placeholder="Vendor Name">
									</td>
								</tr>
									<tr>
									<td>
										<label>Mobile Number</label>
									</td>
									<td>
										<input type="text" name="vendor_number" placeholder="Mobile Number">
									</td>
								</tr>
									<tr>
									<td>
										<label>Address</label>
									</td>
									<td>
										<textarea name="address" placeholder="Address"></textarea>
									</td>
								</tr>
								<tr>
							<td colspan="2">
								<input type="reset" name="submit" value="reset">
								<input type="submit" name="submit" value="submit">
							</td>
						</tr>
							</table>
						</form>
					</table>
					<?php 
					if (isset($_POST['submit']))
					{
						$vendor_name=$_POST['vendor_name'];
						$vendor_number=$_POST['vendor_number'];
						$address=$_POST['address'];
						if ($vendor_name!="")
						{
							$sql_for_insert="INSERT INTO `vendor`(`Name`, `Mobile`, `Addres`) VALUES ('$vendor_name','$vendor_number','$address')";
							$run_insert=mysqli_query($conn,$sql_for_insert);
							if ($run_insert== true)
							{
								echo "<script>alert('Vendor Added successfully')</script>";	
							}
						}
						else
						{
							echo "<script>alert('Vendor Name Required')</script>";
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
