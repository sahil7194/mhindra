<?php
error_reporting('0');
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
		
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage LR</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/super_index.css">
	<script type="text/javascript">
		function uppercase()
		 {
		    var txt = document.getElementById("name");
		    txt.value = txt.value.toUpperCase();
     	}
	</script>
	<style type="text/css">
		.controle-section,.working-section
		{
			height: 905px;
		}
		.workspace
		{
			margin-left: 80px;
			margin-right: 20px;
			height: 700px;
			overflow: auto;
		}
		table
		{
			width: 1500px;
		}
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
		.search
		{
			margin-top: 20px;
			margin-bottom: 20px;
		}
		.search table
		{
			width: 100px;
		}
		.search input[type='search']
		{
			height: 25px;
			width: 250px;
			padding-left: 10px;
			font-size: 15px;
		}
		.search input[type='submit']
		{
			height: 25px;
			width: 80px;
			font-size: 20px;
			margin-left: 10px;
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
							<h1 style="text-align: center; font-size:40px;">Manage LR</h1>
			<div class="workspace">
		<div class="search">
					<form action="" method="get">
					<table>
						<tr>
							<td>
								<input type="search" name="search" id="name" placeholder="Search by PO ID">
							</td>
							<td>
								<input type="submit" name="submit" value="search">
							</td>
						</tr>
					</table>
					</form>
				</div>
<div class="data-space">
				<table style="margin-top: 10px;" border="1">
					<tr>
						<th>
							Procurement Id	
						</th>
						<th>
							State	
						</th>
						<th>
							Dist
						</th>
						<th width="160px">
							WareHouse Location
						</th>
						<th width="160px">
							Govt Customer Name	
						</th>
						<th width="160px">
							Address
						</th>
						<th>
							Motor HP
						</th>
						<th>
							Pump Type
						</th>
						<th>
							Motor Type
						</th>
						<th>
							Module - Watt Peak	
						</th>
						<th>
							Order Quantity	
						</th>
						<th>
							Add LR
						</th>
						<th>
							View BOM
						</th>
					</tr>
					<?php 
					error_reporting ('0');
					$search_txt=$_GET['search'];
					if ($search_txt1="")
					{
						$sql_for_select_pro="SELECT `id`, `procurement_id`, `State`, `dist`, `WareHouse_location`, `Govt_Customer_Name`, `Address`, `Motor HP`, `Pump_Type`, `Motor_Type`, `Module`, `Order_Quantity`, `CreateDate`, `VendorStatus`, `VendorAddDate`, `VerifyStatus`, `VerifyDate`, `VerifyDoc`, `CreatedBy`, `VendorAddby`, `VerifyBy`, `LRStatus`, `LRAddedBy`, `lRAddedDate` FROM `procurement` WHERE (`LRStatus`='' OR `LRStatus`='ADD') AND `procurement_id`='$search_txt' ORDER BY `CreateDate` DESC";
					}
					else
					{
						$sql_for_select_pro="SELECT `id`, `procurement_id`, `State`, `dist`, `WareHouse_location`, `Govt_Customer_Name`, `Address`, `Motor HP`, `Pump_Type`, `Motor_Type`, `Module`, `Order_Quantity`, `CreateDate`, `VendorStatus`, `VendorAddDate`, `VerifyStatus`, `VerifyDate`, `VerifyDoc`, `CreatedBy`, `VendorAddby`, `VerifyBy`, `LRStatus`, `LRAddedBy`, `lRAddedDate` FROM `procurement` WHERE (`LRStatus`='' OR `LRStatus`='ADD') ORDER BY `CreateDate` DESC";
					}

						$run=mysqli_query($conn,$sql_for_select_pro);
						$c=mysqli_num_rows($run);
						if ($c==0) 
						{
							echo "no data found";
						}
						else
						{
					
						while($row_pro=mysqli_fetch_array($run))
						{
							?>
							<tr>
						<td>
							<?php echo $row_pro['procurement_id']; ?>	
						</td>
						<td>
							<?php echo $row_pro['State']; ?>	
						</td>
						<td>
							<?php echo $row_pro['dist']; ?>
						</td>
						<td>
							<?php echo $row_pro['WareHouse_location']; ?>
						</td>
						<td>
							<?php echo $row_pro['Govt_Customer_Name']; ?>	
						</td>
						<td>
							<?php echo $row_pro['Address']; ?>
						</td>
						<td>
							<?php echo $row_pro['Motor HP']; ?>
						</td>
						<td>
							<?php echo $row_pro['Pump_Type']; ?>
						</td>
						<td>
							<?php echo $row_pro['Motor_Type']; ?>
						</td>
						<td>
							<?php echo $row_pro['Module']; ?>	
						</td>
						<td>
							<?php echo $row_pro['Order_Quantity']; ?>
						</td>
						<td>
							<?php  $lr=$row_pro['LRStatus'] ?>	
							<?php 
								if ($lr=="")
								{
									?>
									<a target="_blank" href="add_lr.php?id=<?php echo $row_pro['procurement_id']; ?>&hp=<?php echo $row_pro['Motor HP']; ?>&sendto=<?php echo $row_pro['CreatedBy']; ?>">Add LR</a>
									<?php
								}
								else
								{
									?>
									<b style="color:green;">Lr Added</b>
									<?php
								}
							 ?>							
						</td>
						<td>
							<a target="_blank" href="view_bom_for_lr_details.php?id=<?php echo $row_pro['procurement_id']; ?>&hp=<?php echo $row_pro['Motor HP']; ?>">View BOM</a>
						</td>
					</tr>
							<?php

						}
						}
					 ?>
				</table>
			</div>
		</div>
			</div>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>