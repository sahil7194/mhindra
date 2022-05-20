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
	<title> Create Inward</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/create_invoice.css">
	<style type="text/css">
		.controle-section,.working-section
		{
			height: 575px;
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
				<h1 align="center" style="font-size: 50px; ">Inward Order</h1>
				<div class="form-section">
					<form action="" method="post" enctype="multipart/form-data">
				
				<table style="margin-top:20px; line-height: 50px;">
					<tr>
						<td class="fild-title">
							PO No
						</td>
						<td>
							<input type="text" name="pono" placeholder="PO No" id="name" onkeyup="uppercase()" autofocus>
						</td>
					</tr>					
					<tr>
						<td class="fild-title">
							PO Date
						</td>
						<td>
							<input type="date" name="podate" style="margin-left:25px; width:250px; height:30px;">
						</td>
					</tr>					
					<tr>
						<td class="fild-title">
							 Invoice Number
						</td>
						<td>
							<input type="text" name="deliverynotenumber" placeholder="Invoice NO" id="name1" onkeyup="uppercase1()">
						</td>
					</tr>					
					<tr>
						<td class="fild-title">
							Vendor Name
						</td>
						<td>
						<select name="suplier_name">
							<option value="">-- Select Vendor Name --</option>
							<?php 
								$select_vendor="SELECT `Name` FROM `vendor`ORDER BY `CreatedDate` DESC";
								$run_vendor=mysqli_query($conn,$select_vendor);
								while ($row_vendor=mysqli_fetch_array($run_vendor))
								{
									?>
									<option <?php echo $row_vendor['Name'] ?>> <?php echo $row_vendor['Name'] ?></option>
									<?php
								}
							?>
						</select>
					</td>
						<!--
						<td class="fild-title">
							Vendor Name
						</td>
						<td>
							<input type="text" name="suplier_name" placeholder="Vendor Name" id="name2" onkeyup="uppercase2()">
						</td>
					-->
					</tr>
					<!--
					<tr>
						<td class="fild-title">
							Vender Mobile No.
						</td>
						<td>
							<input type="text" name="suplier_mobile_numer" placeholder="Vender Mobile Number">
						</td>
					</tr>

					<tr>
						<td class="fild-title">
							Transporter  Name
						</td>
						<td>
							<input type="text" name="supliers_senders_name" placeholder="Transporter Name">
						</td>
					</tr>

					<tr>
						<td class="fild-title">
							 Vehicle Details
						</td>
						<td>
							<input type="text" name="supliers_senders_mobile" placeholder=" Vehicle Details">
						</td>
					</tr>
				-->
					<tr>
						<td class="fild-title">
							Supporting Document
						</td>
						<td>
							<input type="file" name="sup_doc" style="margin-left: 25px;">
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
									$get_worker_query="SELECT `id`,`username`, `password`, `role`,`FirstName` FROM `login_details` WHERE `role`='worker' ORDER BY `login_details`.`username` ASC";
									$run_wirker = mysqli_query($conn,$get_worker_query);
									while ($worker = mysqli_fetch_assoc($run_wirker)) 
									{
										?>
										<option value="<?php echo $worker['FirstName'];?>">
											<?php echo $worker['FirstName'];?>
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
			</span>
			</form>
		</div>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>
<?php 
error_reporting('0');

	$conn = mysqli_connect("localhost","root","","mahindra_susten");
	if (isset($_POST['submit']))
	{
		$target="doc/";
		$deliverynotenumber=$_POST['deliverynotenumber'];
		$suplier_name=$_POST['suplier_name'];
		$suplier_mobile_numer=$_POST['suplier_mobile_numer'];
		$supliers_sender_name=$_POST['supliers_senders_name'];
		$supliers_senders_mobile=$_POST['supliers_senders_mobile'];
		$work_assign=$_POST['work_assign'];
		$ws="incomplete";
		$pono=$_POST['pono'];
		$podate=$_POST['podate'];
		$file_name=basename($_FILES['sup_doc']['name']);

		$target_file=$target.basename($_FILES['sup_doc']['name']);			
				if ($deliverynotenumber!="")
				 {
					if(move_uploaded_file($_FILES['sup_doc']['tmp_name'], $target_file)) 
					 	{
							$insert_query="INSERT INTO `delivaerynote` (`id`, `DeliveryNote`, `SuplierName`, `SuplierMobileNumber`, `SSN`, `SSMN`, `Workassign`, `warehouse`, `WorkStatus`, `SupDoc`, `CreateDate`,`PoNumber`,`PoDate`) VALUES (NULL, '$deliverynotenumber', '$suplier_name', '$suplier_mobile_numer', '$supliers_sender_name', '$supliers_senders_mobile', '$work_assign', '$warehouse', 'incomplete', '$target_file', current_timestamp(),'$pono','$podate');";
							$run = mysqli_query($conn,$insert_query);

								if ($run=true) 
								{
									$title="Inward order";
									$massage="Complete Inward order for :- ".$deliverynotenumber;
									$insert_notification="INSERT INTO `notification`(`Sento`, `Title`, `Massage`) VALUES ('$work_assign','$title','$massage')";
									$run_insert_notification=mysqli_query($conn,$insert_notification);
									if ($run_insert_notification == true )
									 {
										echo "<script>alert('data save')</script>";
									}
									
								}
								else
								{
									echo "<script>alert('something worng')</script>";
								}
						}
				}		
	}

 ?>