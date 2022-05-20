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
	<title>Add Request To Procurement </title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/add_request_to_procurment.css">
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/state.js"></script>
 <style type="text/css">
 .controle-section,.working-section
 {
 	height: 910px;
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
     	 function uppercase3()
		 {
		    var txt = document.getElementById("name3");
		    txt.value = txt.value.toUpperCase();
     	 }
	</script>
</head>
<body>
	<img src="http://localhost/Current%20Project/mahindra/imgs/logo.png" class="logo">

	<div class="title-section">

		<div class="header-area">
		<a href="index.php" style="font-family: rockwell; margin-top:20px;"><?php echo 	$company_name; ?> </a>		</div>
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
				<div class="form-title" style="text-align:center;
				font-size: 40px;">
					Add Request To Procurement
				</div>
				<form action="" method="post"> 
				<table style="margin-left:90px; line-height: 50px;">
					<tr>
						<td class="field-label">
							Procurement Id
						</td>
						<td>
							<input type="text" id="name" name="procurement_id" placeholder="Procurement Id" onkeyup="uppercase()">
						</td>
					</tr>
					<tr>
						<td class="field-label">
							State
						</td>
						<td>
								<select name="state" id="state" onchange="myFunction()">
									<option>-- Select State --</option>
									<option value="Andhra Pradesh">Andhra Pradesh</option>
									<option value="Arunachal Pradesh">Arunachal Pradesh</option>
									<option value="Assam">Assam</option>
									<option value="Bihar">Bihar</option>
									<option value="Chhattisgarh">Chhattisgarh</option>
									<option value="Goa">Goa</option>
									<option value="Gujarat">Gujarat</option>
									<option value="Haryana">Haryana</option>
									<option value="Himachal Pradesh">Himachal Pradesh</option>
									<option value="Jharkhand">Jharkhand</option>
									<option value="Karnataka">Karnataka</option>
									<option value="Kerala">Kerala</option>
									<option value="Madhya Pradesh">Madhya Pradesh</option>
									<option value="Maharashtra">Maharashtra</option>
									<option value="Manipur">Manipur</option>
									<option value="Meghalaya">Meghalaya</option>
									<option value="Mizoram">Mizoram</option>
									<option value="Nagaland">Nagaland</option>
									<option value="Odisha">Odisha</option>
									<option value="Punjab">Punjab</option>
									<option value="Rajasthan">Rajasthan</option>
									<option value="Sikkim">Sikkim</option>
									<option value="Tamil Nadu">Tamil Nadu</option>
									<option value="Telangana">Telangana</option>
									<option value="Tripura">Tripura</option>
									<option value="Uttar Pradesh">Uttar Pradesh</option>
									<option value="Uttarakhand">Uttarakhand</option>
									<option value="West Bengal">West Bengal</option>Arunachal Pradesh
								</select>
						</td>
					</tr>
					<tr>
						<td class="field-label">
							Dist
						</td>
						<td >
							<div id="dist">
							<select name="dist">
								<option>-- Select Dist --</option>
							</select>
						</div>
						</td>
					</tr>
					<tr>
							<td class="field-label">
								Warehouse Location
							</td>
							<td>
								<textarea name="warehouse_location" placeholder="Warehouse Location" id="name1" onkeyup="uppercase1()"></textarea>
							</td>
						</tr>
						<tr>
							<td class="field-label">
								Govt Customer Name
							</td>
							<td>
								<input type="text" name="gov_customer_name" placeholder="Govt Customer Name" id="name2" onkeyup="uppercase2()">
							</td>
						</tr>
						<tr>
							<td class="field-label">
								Address
							</td>
							<td>
								<textarea placeholder="Address" name="address" id="name3" onkeyup="uppercase3()"></textarea>
							</td>
						</tr>
						<tr>
							<td class="field-label">
								Motor HP
							</td>
							<td>
								<select name="pump_hp" id="pumpheadoption" onchange="pumphead()">
									<option value="ty">-- Select Pump HP --</option>
									<option value="3AC">3 AC</option>
									<option value="5AC">5 Ac</option>
									<option value="7.5AC">7.5 AC</option>
									<option value="3DC">3 DC</option>
									<option value="5DC">5 DC</option>
									<option value="7.5DC">7.5 DC</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="field-label">
								Pump Type
							</td>
							<td>
								<select name="pump_type">
									<option>-- Select Pump Type --</option>
									<option value="Submersible pump">Submersible Pump</option>
									<option value="Surface / Normal pump">Surface / Normal Pump</option>
								</select>
							</td>
						</tr>
						</tr>
						<script type="text/javascript">
							function pumphead()
{
 var a = document.getElementById("pumpheadoption").value;
   var b;
  switch(a)
  	{
  		case "ty":
  		var b="<select name='pump_head'><option>-- Select Pump Head --</option></select>";
  		break;
  		case "3AC":
  		var b="<select name='pump_head'><option>-- Select Pump Head --</option><option value='30m'>30 M</option><option value='50m'>50 M</option><option value='70m'> 70 M</option></select>";
  		break;

  		case "5AC":
  		var b="<select name='pump_head'><option>-- Select Pump Head --</option><option value='50 M'> 50M </option><option value='70 M'> 70M </option><option value='100 M'> 100M </option></select>";
  		break;

  		case "7.5AC":
  		var b="<select name='pump_head'><option>-- Select Pump Head --</option><option value='70M'> 70M </option></select>";
  		break;

  		case "3DC":
  		var b="<select name='pump_head'><option>-- Select Pump Head --</option><option value='30m'>30 M</option><option value='50m'>50 M</option><option value='70m'> 70 M</option></select>";
  		break;

  		case "5DC":
  		var b="<select name='pump_head'><option>-- Select Pump Head --</option><option value='50 M'> 50M </option><option value='70 M'> 70M </option><option value='100 M'> 100M </option></select>";
  		break;

  		case "7.5":
  		var b="<select name='pump_head'><option>-- Select Pump Head --</option><option value='70M'> 70M </option></select>";
  		break;

  }
  	document.getElementById("outputpumphead").innerHTML = b;	
}

						</script>
						<tr>
							<td class="field-label">
								Motor Type
							</td>
							<td>
								<select name="motar_type">
									<option>-- Select Motar type --</option>
									<option value="AC">AC</option>
									<option value="DC">DC</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="field-label">
								Module - Watt Peak
							</td>
							<td>
								<select name="modual">
									<option>-- Select Module - watt Peak --</option>
									<option value="310 "> 310 </option>
									<option value="320 "> 320</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="field-label">
								Order Quantity
							</td>
							<td>
								<input type="number" name="total_quantity" placeholder="Order Quantity">
							</td>
						</tr>
					<tr>
						<td colspan="2">
							<input type="reset" name="reset" value="Reset">
							<input type="submit" name="submit" value="Save">
</form>

						</td>
					</tr>
				</table>
				<?php 
	if (isset($_POST['submit']))
	{
		$date= date('d-m-Y');
		$procurement_id=$_POST['procurement_id'];
		$state=$_POST['state'];
		$dist=$_POST['dist'];
		$warehouse_location=$_POST['warehouse_location'];
		$gov_customer_name=$_POST['gov_customer_name'];
		$address=$_POST['address'];
		$pump_hp=$_POST['pump_hp'];
		$pump_type=$_POST['pump_type'];
		//$pump_head=$_POST['pump_head'];
		$motar_type=$_POST['motar_type'];
		$modual=$_POST['modual'];
		$total_quantity=$_POST['total_quantity'];
		if ($procurement_id!="")
		 {

				$sql_for_insert="INSERT INTO `procurement` (`id`, `procurement_id`, `State`, `dist`, `WareHouse_location`, `Govt_Customer_Name`, `Address`, `Motor HP`, `Pump_Type`, `Motor_Type`, `Module`, `Order_Quantity`, `CreateDate`,	`VendorStatus`) VALUES (NULL, '$procurement_id', '$state', '$dist', '$warehouse_location', '$gov_customer_name', '$address', '$pump_hp', '$pump_type', '$motar_type', '$modual', '$total_quantity', '$date','NotAdd')";
				$run_query=mysqli_query($conn,$sql_for_insert);
				if ($run_query == true)
				{
					echo "<script>alert('data save')</script>";
				}
				else
				{
					echo "<script>alert('data save')</script>";
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