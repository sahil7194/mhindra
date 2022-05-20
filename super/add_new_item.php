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
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New Item</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/item.css">
	<style type="text/css">
		.controle-section
		{
			height: 700px;
		}
		.working-section
		{
			height: 700px;
		}
		select
		{
			width: 140px;
			height: 35px;
			margin-left: 18px;
		}
		option
		{
			padding-left: 15px;
		}
	</style>
</head>
<body>
	<img src="http://localhost/Current%20Project/mahindra/imgs/logo.png" class="logo">

<div class="title-section">
		<div class="title-section">
				<div class="header-area">
			<a href="index.php" style="font-family: rockwell; margin-top:20px;"><?php echo $company_name; ?> </a>
		</div>
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
					<form action="" method="post">					
					<h1 class="form-title" style="text-align:center; font-size:40px; margin-bottom:20px;">
						Add New Item
					</h1>
					<table>
						<tr>
							<td class="field-title">
								Item Code
							</td>
							<td>
								<input type="text" name="item_code" placeholder="Item Code">
							</td>
						</tr>
						<tr>
							<td class="field-title">
								Item Name
							</td>
							<td>
								<input type="text" name="item_name" placeholder="Item Name">
							</td>
						</tr>
						<tr>
							<td class="field-title">
								Item Qunatity
							</td>
							<td>
								<input type="text" name="item_qunatity" placeholder="Item Qunatity">
								<span style="font-size:14; color: red;"> *only fill if this item is scanable is no</span>
							</td>
						</tr>
						<tr>
							<td class="field-title">
								Item Value
							</td>
							<td>
								<input type="text" name="item_value" placeholder="Item Value">
							</td>
						</tr>
						<tr>
							<td class="field-title">
								UOM
							</td>
							<td>
								<input type="text" name="uom" placeholder="UOM">
							</td>
						</tr>
						<tr>
							<td class="field-title">
								Scanable
							</td>
							<td>
								<select name="scanable" style="margin-bottom:20px;">
									<option>-- Select Option --</option>
									<option value="Y">Y</option>
									<option value="N">N</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="field-title">
								Note
							</td>
							<td>
								<textarea name="note" placeholder="Note"></textarea>
							</td>
						</tr>
					</table>
					<input type="reset" name="reset" value="Reset">
					<input type="submit" name="submit" value="Add">
					</form>
				</div>
			</span>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
	<?php 
		if (isset($_POST['submit']))
		{
			$item_code=$_POST['item_code'];
			$item_name=$_POST['item_name'];
			$note=$_POST['note'];
			$item_fixed_value=$_POST['item_value'];
		    $uom=$_POST['uom'];
			$scanable=$_POST['scanable'];
			$item_fixed_qunatity=$_POST['item_qunatity'];
			if ($item_name!=""&&$item_fixed_value!="")
			{
				$insert_query="INSERT INTO `item` (`id`, `ItemCode`, `ItemName`, `UOM`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue`) VALUES (NULL, '$item_code', '$item_name', '$uom', '$note', '0', '0', '$warehouse', '$scanable', '0', '0', '$item_fixed_qunatity', '$item_fixed_value', '0');";
				$run_query=mysqli_query($conn,$insert_query);
				if ($run_query == true) 
				{
					echo "<script>alert(' Item added')</script>";
				}
				else
				{
					echo "<script>alert(' Item Name and Value required ')</script>";
				}
		}
	}

	 ?>
</body>
</html>