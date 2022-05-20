<?php
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role="quality";
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
		.otherform
		{
			margin-left: 70px;
			margin-right: 20px;
		}
		.otherform table
		{
			line-height: 40px;
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
			</span>
	<main class="main-menue">
					<section>
						<a href="index.php">Home</a>
					</section>
					<section>
						<a href="verification.php">Verification</a>
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
							Vendor
						</th>
						<th>
							Price
						</th>
						<th>
							PO Number
						</th>
						<th>
							Review
						</th>
						<th>
							PDI Report
						</th>
					</tr>
					<form action="" method="post" enctype="multipart/form-data">
					<?php 

						$select_data="SELECT `id`, `ProcumentID`, `ItemCode`, `ItemName`, `UOM`, `Qunatity`, `CreatedDate`, `VendorAddDate`, `VendorName`, `Price`,`Procurment_number` FROM `bom` WHERE `ProcumentID`='$invoice_number'";
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
									<?php echo $row_data['VendorName'] ?>
								</td>
								<td align="center">
									<?php echo $row_data['Price'] ?>
								</td>
								<td>
									<?php echo $row_data['Procurment_number'] ?>
								</td>
								<td>
									<select name="review[]">
										<option value="">-- Select Review --</option>
										<option value="Ok">OK</option>
										<option value="Not Ok">Not Ok</option>
									</select>
								</td>
								<td>
									<input type="file" name="pdi[]">
								</td>
							</tr>
							<?php
						}
					 ?>
				</table>
			</div>
			<div class="otherform">
				<table>
					<tr>
						<td>
							Final Review
						</td>
						<td style="padding-left: 30px;">
							<select name="frw">
								<option value="">-- Select Final Review --</option>
								<option value="allow">Allow</option>
								<option value="deny">Deny</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							Supporting Document
						</td>
						<td style="padding-left: 30px;">
							<input type="file" name="supdoc">
						</td>
					</tr>
				</table>
			</div>
				<div class="button-secction">
					<input type="reset" name="reset" value="Reset">
					<input type="submit" name="submit" value="Submit">
				</form>
				</div>
			</span>	
			<?php 
				if (isset($_POST['submit']))
				{
					$date=date('d-m-Y');
					$link="http://localhost/Current%20Project/mahindra/quality/";
					$target_file="QCDoc/";
					$itcode=$_POST['itcode'];
					$review=$_POST['review'];
					$frw=$_POST['frw'];
					$supdoc=$_FILES['supdoc'];

					$rw=array_filter($review);
					$rw_2=[];
					foreach ($rw as $key )
					{
						array_push($rw_2,$key);
					}

					
					$file_name=$target_file.basename($_FILES['supdoc']['name']);
					$lin_k=$link.$file_name;
					if (count($itcode)==count($rw_2))
					{
						if (move_uploaded_file($_FILES['supdoc']['tmp_name'], $file_name))
						{
							for ($i=0; $i <count($itcode) ; $i++) 
							{ 
							   $update_query="UPDATE `bom` SET `Review`='$rw_2[$i]',`ReviewDate`='$date' WHERE `ProcumentID`='$invoice_number' AND `ItemCode`='$itcode[$i]'";
							   $run_update=mysqli_query($conn,$update_query);
							}	
								$update_veri_status="UPDATE `procurement` SET `VerifyStatus`='$frw',`VerifyDate`='$date',`VerifyDoc`='$lin_k',`VerifyBy`='$username' WHERE `procurement_id`='$invoice_number'";
							$update_query_veri=mysqli_query($conn,$update_veri_status);
							if ($update_query_veri == true)
							{
								$msg="$sendto Your Request for Quantity check has ben Done.<br> Result is $frw";
								$noti_insert="INSERT INTO `notification`(`Sento`, `Title`, `Massage`, `CreateDate`) VALUES ('$sendto','Verification Result','$msg','$date')";
								$run_noti=mysqli_query($conn,$noti_insert);
								if ($run_noti == true)
								{
									echo "<script>alert('Review Added')</script>";
								}
								else
								{
									echo "<script>alert('Fail to Send Notification ')</script>";
								}
								
							}
							else
							{
								echo "<script>alert(' Fail to Add Review')</script>";
							}
						}
						else
						{
							for ($i=0; $i <count($itcode) ; $i++) 
							{ 
							   $update_query="UPDATE `bom` SET `Review`='$rw_2[$i]',`ReviewDate`='$date' WHERE `ProcumentID`='$invoice_number' AND `ItemCode`='$itcode[$i]'";
							   $run_update=mysqli_query($conn,$update_query);
							}	
								$update_veri_status="UPDATE `procurement` SET `VerifyStatus`='$frw',`VerifyDate`='$date',`VerifyDoc`='',`VerifyBy`='$username' WHERE `procurement_id`='$invoice_number'";
							$update_query_veri=mysqli_query($conn,$update_veri_status);
							if ($update_query_veri == true)
							{
								$msg="$sendto Your Request for Quantity check has ben Done.<br> Result is $frw";
								$noti_insert="INSERT INTO `notification`(`Sento`, `Title`, `Massage`, `CreateDate`) VALUES ('$sendto','Verification Result','$msg','$date')";
								$run_noti=mysqli_query($conn,$noti_insert);
								if ($run_noti == true)
								{
									echo "<script>alert('Review Added')</script>";
								}
								else
								{
									echo "<script>alert('Fail to Send Notification ')</script>";
								}
								
							}
							else
							{
								echo "<script>alert(' Fail to Add Review')</script>";
							}
						}

					}
					else
					{
						echo "<script>alert('Select Item and Review Missmatch')</script>";
					}
					
					

					$full_link=$link.$file_name;
					
				}
			 ?>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>