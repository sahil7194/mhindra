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
	<title>Add LR</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/super_index.css">
	<style type="text/css">
		.controle-section,.working-section
		{
			height: 875px;
		}
		.work
		{
			margin-left: 80px;
			margin-right: 20px;
			
			height: 700px;
			overflow: auto;
		}
		.work table
		{
			margin-top: 25px;
			margin-left: 10px;
			margin-right: 20px;
			line-height: 30px;
		}
		.work table th
		{
			padding-left: 15px;
			padding-right: 15px;
			padding-top: 15px;
			padding-bottom: 15px;
		}
		.work table td
		{
			padding-left: 6px;
			padding-right: 6px;
			padding-top: 6px;
			padding-bottom: 6px;
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
			<div class="work">
				<form action="" method="post">
				<h1 style="text-align:center; font-size:40px;">Add LR</h1>
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
					<th>
						Qunatity
					</th>
					<th>
						LR Number
					</th>
					<th>
						LR Date
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
									<input type="number" name="lrnumber[]" placeholder="LR Number">
								</td>
								<td>
									<input type="date" name="lrdate[]">
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
					 	$date=date('d-m-Y');
						$itcode=$_POST['itcode'];
						$lrnumber=$_POST['lrnumber'];
						$lrdate=$_POST['lrdate'];
						$lrn=array_filter($lrnumber);
						$lrd=array_filter($lrdate);
						$sento=$_GET['sendto'];
						$lrn_2=[];
						foreach ($lrn as $key)
						{
							array_push($lrn_2,$key);
						}

						$lrd_2=[];
						foreach ($lrd as $key_2)
						 {
							array_push($lrd_2,$key_2);
						}

						if (count($lrn_2)==count($lrd_2))
						{
							for ($i=0; $i <count($lrn_2) ; $i++)
							{ 
								$sql_for_bom_lr_update="UPDATE `bom` SET `LRnumber`='$lrn_2[$i]',`LrDate`='$lrd_2[$i]',`LRAddDate`='$date' WHERE `ProcumentID`='$invoice_number' AND `ItemCode`='$itcode[$i]';";
								mysqli_query($conn,$sql_for_bom_lr_update);
							}

							if ($count_row==count($itcode))
							{
								$sql_for_update_procument="UPDATE `procurement` SET `LRStatus`='ADD',`LRAddedBy`='$username',`lRAddedDate`='$date' WHERE `procurement_id`='$invoice_number'";
							$run_pro=mysqli_query($conn,$sql_for_update_procument);
							if ($run_pro == true)
							 {
								$msg=" $sento your procurement id :- $invoice_number has ben LR detials Added By $username";

								$create_noti="INSERT INTO `notification`(`Sento`, `Title`, `Massage`, `CreateDate`) VALUES ('$sento','LR Deatils Added','$msg','$date');";
								$run_noti=mysqli_query($conn,$create_noti);
								if ($run_noti == true)
								 {
									echo "<script>alert('Lr Details Added');</script>";
								}
								else
								{
									echo "<script>alert(' Fail To Create Notification ');</script>";
								}
							}
						}
							else
							{
								$sql_for_update_procument="UPDATE `procurement` SET `LRStatus`='',`LRAddedBy`='$username',`lRAddedDate`='$date' WHERE `procurement_id`='$invoice_number'";
							$run_pro=mysqli_query($conn,$sql_for_update_procument);
							if ($run_pro == true)
							 {
								$msg=" $sento your procurement id :- $invoice_number has ben LR detials Added By $username";

								$create_noti="INSERT INTO `notification`(`Sento`, `Title`, `Massage`, `CreateDate`) VALUES ('$sento','LR Deatils Added','$msg','$date');";
								$run_noti=mysqli_query($conn,$create_noti);
								if ($run_noti == true)
								 {
									echo "<script>alert('Lr Details Added');</script>";
								}
								else
								{
									echo "<script>alert(' Fail To Create Notification ');</script>";
								}
							}
							
							}
						}
						else
						{
							echo "<script>alert('Lr number and Lr Date Count Mismatch');</script>";
						}
					}
				 ?>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>