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
	$i=$_GET['id'];
	if ($i!="")
	{
		$id=$i;
	}
	else
	{
	  header('Location:http://localhost/Current%20Project/mahindra/master/manage_request_to_Procurement.php');
	}


  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Request To Procurement</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<style type="text/css">
		th
		{
			padding-left: 15px;
			padding-right: 15px;
			padding-top: 15px;
			padding-bottom: 15px;

		}
		td
		{
			padding-left: 8px;
			padding-right: 8px;
			padding-top: 8px;
			padding-bottom: 8px;

		}
		.controle-section,.working-section
		{
			height: 1300px;
			scroll-behavior: smooth;
		}
		.searcharea
		{
			text-align: right;
			margin-top: 45px;
			padding-right: 45px;
		}
				.table_data
		{
			margin-left:70px;
			 margin-top: 30px;
			 margin-right: 15px;
			 height: 1050px;
			 overflow:auto; 
		}
		input[type='reset']
		{
			height: 40px;
			width: 80px;
			margin-top: 7px;
			font-size: 20px;
			border: none;
			background-color: #e11d1db5;
			margin-right: 20px;
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
			margin-right: 20px;
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
			<a href="index.php"><?php echo $company_name;?> </a>
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
				<h1 style="text-align: center; font-size:40px;">Create BOM</h1>
			</span>
					<div class="table_data">
						<form action="" method="post">
						<table width="100%" border="1">
							<tr>
								<th>
									
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
									Qunatity
								</th>
							</tr>
							<?php 
							error_reporting('0');
								$select_item_code="SELECT `id`, `ItemCode`, `ItemName`, `UOM` FROM `item` WHERE `warehouse`='POLESTAR'";
								$run_item_code=mysqli_query($conn,$select_item_code);
								while ($row_item_code=mysqli_fetch_array($run_item_code))
								{
									$counter=$counter+1;
									?>
										<tr>
											<td>
												<input type="checkbox" name="itCode[]" value="<?php echo $row_item_code['ItemCode'] ?>">
											</td>
											<td>
												<?php echo $row_item_code['ItemCode'] ?>
											</td>
											<td>
												<?php echo $row_item_code['ItemName'] ?>
											</td>
											<td>
												<?php echo $row_item_code['UOM'] ?>
											</td>
											<td>
												<input type="text" name="qunatity[]" placeholder="qunatity">
											</td>
										</tr>
									<?php
								}
							 ?>
						</table>
					</div>
					<div class="searcharea">
						<input type="reset" name="submit" value="reset">
						<input type="submit" name="submit" value="submit">
					</div>
										</form>
				<?php 
				if (isset($_POST['submit']))
				{
					$itcode=$_POST['itCode'];
					echo "<br>";
					//print_r($itcode);
					$qunatity=$_POST['qunatity'];
					$ar=array_filter($qunatity);
					$new_qunatity=[];
					foreach ($ar as $key_2)
					{
						array_push($new_qunatity,$key_2);
					}
					echo "<br>";
					//print_r($new_qunatity);		
					$itname=[];
					$uom=[];
					
						for ($i=0; $i <count($itcode) ; $i++) 
					{ 
						$select_itcode_data="SELECT `id`, `ItemCode`, `ItemName`, `UOM` FROM `item` WHERE `warehouse`='POLESTAR' AND `ItemCode`='$itcode[$i]'";
						$r=mysqli_query($conn,$select_itcode_data);
						//echo $c=mysqli_num_rows($r);
						$rw=mysqli_fetch_array($r);
						//echo "<br> Item Name ".
						$ritname=$rw['ItemName'];
						//echo "<br> Item UOM ".
						$ritcode=$rw['UOM'];
						array_push($itname,$ritname);
						array_push($uom,$ritcode);
					}
					for ($j=0; $j < count($uom); $j++) 
					{ 
						//echo "<br> Insert Query :- ".
						$insert_it_data="INSERT INTO `bom`(`ProcumentID`, `ItemCode`, `ItemName`, `UOM`,`Qunatity`) VALUES ('$id','$itcode[$j]','$itname[$j]','$uom[$j]','$new_qunatity[$j]')";
						$run_insert_query=mysqli_query($conn,$insert_it_data);
					}
					echo "<script>alert(' Data Save ');</script>";					
				}
				 ?>
				</div>
				</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>