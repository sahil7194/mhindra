<?php
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role="procurement";
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
		$in=$_GET['id'];
		if ($in!="")
		{
			$invoice_number=$in;
		}
		else
		{
			header('Location:http://localhost/Current%20Project/mahindra/procurement/manage_vendor.php');
		}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Vendor</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/super_index.css">
	<style type="text/css">
		.controle-section,.working-section
		{
			height: 975px;
		}
		.workspace
		{
			margin-left: 80px;
			margin-right: 20px;
			height: 700px;
		}
		.workspace table
		{
			width: 100%;
		}
		.workspace th
		{
			padding-left: 12px;
			padding-right: 12px;
			padding-top: 12px;
			padding-bottom: 12px;
		}
		.workspace td
		{
			padding-left: 8px;
			padding-right: 8px;
			padding-top: 8px;
			padding-bottom: 8px;
		}
		.button-secction
		{
			margin-top: 10px;
			margin-left: 80px;
			margin-right: 20px;
			text-align: right;
			padding-right: 40px;
		}
			input[type='reset']
		{
			height: 30px;
			width: 60px;
			margin-top: 7px;
			font-size: 15px;
			border: none;
			background-color: #e11d1db5;
			margin-right: 15px;
			border-radius: 12px;
		}
		input[type='reset']:hover
		{
			height: 30px;
			width: 60px;
			margin-top: 7px;
			font-size: 15px;
			border: none;
			background-color: #e70a0ad4;
			margin-right: 15px;
			border-radius: 12px;
		}
		input[type='submit']
		{
			height: 30px;
			width: 60px;
			margin-top: 7px;
			font-size: 15px;
			border: none;
			background-color: #18d418;
			border-radius: 12px;
		}
		input[type='submit']:hover
		{
			height: 30px;
			width: 60px;
			margin-top: 7px;
			font-size: 15px;
			border: none;
			background-color: #089408;
			border-radius: 12px;
		}

	</style>
	<script type="text/javascript">
			function uppercase()
		 {
		    var txt = document.getElementById("name");
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
					<section>
						<a href="manage_vendor.php">Vendor</a>
					</section>
					<section>
						<a href="manage_lr.php">LR</a>
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
				<h1 style="text-align: center; font-size:40px;">Add Vendor</h1>
			<div class="workspace">
				<form action="" method="post">
				
		<table>
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
						<th align="center">
							Qunatity
						</th>
						<th>
							PO Number
						</th>
						<th>
							Vendor
						</th>
						<th>
							Price
						</th>
					</tr>
										<?php 

						$select_data="SELECT `id`, `ProcumentID`, `ItemCode`, `ItemName`, `UOM`, `Qunatity`, `CreatedDate` FROM `bom` WHERE `ProcumentID`='$invoice_number'";
						$run_data=mysqli_query($conn,$select_data);
						$count_row=mysqli_num_rows($run_data);
						while($row_data=mysqli_fetch_array($run_data))
						{
							?>
							<tr>
								<td>
									<input type="checkbox" name="itcode[]" value="<?php echo $row_data['ItemCode']?>">
								</td>
								<td>
									<?php echo $row_data['ItemCode'] ?>
								</td>
								<td>
									<?php echo $row_data['ItemName'] ?>
								</td>
								<td>
									<?php echo $row_data['UOM'] ?>
								</td>
								<td align="center">
									<?php echo $row_data['Qunatity'] ?>
								</td>
								<td>
									<input type="text" name="ponumber[]" placeholder="PO Number" id="name" onkeyup="uppercase()">
								</td>
								<td>
									<select name="vendor[]">
										<option value="">-- Select Vendor  --</option>
										<?php 
											$select_vendor_data="SELECT `id`, `Name`, `Mobile`, `Addres`, `CreatedDate` FROM `vendor`";
											$run_vendor_data=mysqli_query($conn,$select_vendor_data);
											while ($row_vendor_data=mysqli_fetch_array($run_vendor_data))
											{
												?>
												<option value="<?php echo $row_vendor_data['Name']?>"><?php echo $row_vendor_data['Name']?></option>
												<?php
											}
										 ?>
									</select>
								</td>
								<td>
									<input type="number" name="price[]" placeholder="Price">
								</td>
							</tr>
							<?php
						}
					 ?>
				</table>
			</div>
				<div class="button-secction">
					<input type="reset" name="reset" value="Reset">
					<input type="submit" name="submit" value="Submit">
				</form>
				</div>
				<?php 
					if (isset($_POST['submit']))
					{
						$date= date('d-m-Y');
						$itcode=$_POST['itcode'];
						$vendor=$_POST['vendor'];
						$price=$_POST['price'];
						$vendor_2=array_filter($vendor);
						$price_2=array_filter($price);
						$new_vendor=[];
						$po_number=$_POST['ponumber'];
						$ponumber=$_POST['ponumber'];
						$ponumber_2=array_filter($ponumber);
						$ponumber_3=[];
						foreach ($vendor_2 as $key) 
						{
							array_push($new_vendor, $key);						
						}

						$new_price=[];
						foreach ($price_2 as $key_2)
						{
							array_push($new_price,$key_2);
						}
						foreach ($ponumber_2 as $key_3)
						 {
							array_push($ponumber_3, $key_3);
						}
					   /*echo "<br> Item code :- ";
						print_r($itcode);
						echo "<br> Item vendor :- ";
						print_r($new_vendor);
						echo "<br> Item price :- ";
						print_r($new_price);*/
						if (count($itcode)==count($new_vendor)&&count($new_price)==count($new_vendor)&&count($new_price)==count($ponumber_3))
						{
							for ($i=0; $i <count($itcode) ; $i++)
							 { 
								$sql_for_update_vendor="UPDATE `bom` SET `VendorAddDate`='$date',`VendorName`='$new_vendor[$i]',`Price`='$price[$i]',`Procurment_number`='$ponumber_3[$i]' WHERE `ProcumentID`='$invoice_number' AND `ItemCode`='$itcode[$i]';";
								mysqli_query($conn,$sql_for_update_vendor);
							}

							if ($count_row==count($itcode))
							{
								 $sql_for_update_status="UPDATE `procurement` SET `VendorStatus`='ADD' WHERE `procurement_id`='$invoice_number'";

								$run_update_vendor_status=mysqli_query($conn,$sql_for_update_status);
								if ($run_update_vendor_status == true) 
								{
									echo "<script>alert('Vendor and Price added Successfully')</script>";
								}
								
								else
								{
									echo "<script>alert('Fail to Update Status ')</script>";
								}	
							}
							else
							{
								echo "<script>alert('Fail to Save Vendor and Price')</script>";
							}							
						}
						else
						{
							echo "<script>alert('Miss Match in Vendor and Price')</script>";
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