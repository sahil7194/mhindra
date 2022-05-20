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
	<title>Manage Request To Procurement</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<style type="text/css">
		th,td
		{
			padding-left: 5px;
			padding-right: 5px;
			padding-top: 5px;
			padding-bottom: 5px;

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
				
			</span>
			<div style="overflow: auto; height:525px; margin-bottom:15px;">
			<?php 
				$id=$_GET['id'];
				$hp1=$_GET['hp'];
				//$hp1='3DC';
				switch($hp1)
				{
					case '3AC':
						$hp="3";
						?><div style="margin-left:90px;"><h1>Create BOM for 3 hp </h1></div>
						<form action="" method="post">
							<table border="1" width="900px" style="margin-left:80px;">
								<tr>
									<td>Sr.no</td>
									<td>Material Code</td>
									<td>Material Description</td>
									<td>UOM</td>
									<td>Quantity</td>
								</tr>									 <tr>
			 		 	<td>
			 		 		1			 		 	</td>
			 		 	<td>
			 		 		ELEC_MODU_000015D			 		 	</td>
			 		 	<td>
			 		 		PV SOLAR MODULES 310WP			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity1" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		2			 		 	</td>
			 		 	<td>
			 		 		MECH_TRCK_000087D			 		 	</td>
			 		 	<td>
			 		 		CABLE CONNECTORS FOR TRACKER			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity2" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		3			 		 	</td>
			 		 	<td>
			 		 		ADMN_ITAS_0000219			 		 	</td>
			 		 	<td>
			 		 		PVC CONDUIT			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity3" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		4			 		 	</td>
			 		 	<td>
			 		 		ELEC_HDPP_000001D			 		 	</td>
			 		 	<td>
			 		 		HDPE PIPE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity4" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		5			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000594D			 		 	</td>
			 		 	<td>
			 		 		Bottom adaptor SS304			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity5" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		6			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000596D			 		 	</td>
			 		 	<td>
			 		 		Pipe bend MS			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity6" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		7			 		 	</td>
			 		 	<td>
			 		 		MECH_BOLT_000233D			 		 	</td>
			 		 	<td>
			 		 		M 10X100 Nut,bolt,washer			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity7" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		8			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000830D			 		 	</td>
			 		 	<td>
			 		 		PP Rope 14 MM Dia with crimp clamp			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity8" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		9			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000597D			 		 	</td>
			 		 	<td>
			 		 		Bore cap CI			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity9" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		10			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000598D			 		 	</td>
			 		 	<td>
			 		 		Clamp for pipe			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity10" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		11			 		 	</td>
			 		 	<td>
			 		 		MECH_BOLT_000234D			 		 	</td>
			 		 	<td>
			 		 		M 12X60 Nut,bolt,washer			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity11" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		12			 		 	</td>
			 		 	<td>
			 		 		ELEC_SCBL_000007D			 		 	</td>
			 		 	<td>
			 		 		SOLAR CABLE - 1CX4SQMM CU			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity12" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		13			 		 	</td>
			 		 	<td>
			 		 		ELEC_SCBL_000012D			 		 	</td>
			 		 	<td>
			 		 		3*2.5 Sqmm AC Cable			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity13" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		14			 		 	</td>
			 		 	<td>
			 		 		ELEC_LTCB_000241D			 		 	</td>
			 		 	<td>
			 		 		1CX6SQMM CU EARTHING CABLE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity14" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		15			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000528D			 		 	</td>
			 		 	<td>
			 		 		EARTHING CHEMICAL GI			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity15" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		16			 		 	</td>
			 		 	<td>
			 		 		CVIL_GIPP_000011D			 		 	</td>
			 		 	<td>
			 		 		GI WIRE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity16" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		17			 		 	</td>
			 		 	<td>
			 		 		ELEC_GISR_000002D			 		 	</td>
			 		 	<td>
			 		 		25 X 3 GI STRIP			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity17" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		18			 		 	</td>
			 		 	<td>
			 		 		ELEC_SURG_000006D			 		 	</td>
			 		 	<td>
			 		 		LIGHTNING ARRESTER			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity18" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		19			 		 	</td>
			 		 	<td>
			 		 		ADMN_PLNT_0000048			 		 	</td>
			 		 	<td>
			 		 		CABLE TIE			 		 	</td>
			 		 	<td>
			 		 		SET			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity19" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		20			 		 	</td>
			 		 	<td>
			 		 		ELEC_LGHT_000007D			 		 	</td>
			 		 	<td>
			 		 		Home Lighting System			 		 	</td>
			 		 	<td>
			 		 		SET			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity20" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		  		 <tr>
			 		 	<td>
			 		 		21			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001865D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 3hp 30M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity21" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		22			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001866D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 3hp 50M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity22" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		23			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001867D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 3hp 70M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity23" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		24			 		 	</td>
			 		 	<td>
			 		 		MECH_MMSH_000086D			 		 	</td>
			 		 	<td>
			 		 		Module mounting structure for pump - 10M			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity24" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 
							</table>
								<input type="submit" name="submit" value="submit">
							<?php 
								if (isset($_POST['submit']))
								{
									
								}
							 ?>
						 <?php 
						break;

					case '3DC':
						$hp="3";
						?><div style="margin-left:90px;"><h1>Create BOM for 3</h1></div>
						<table border="1" width="900px" style="margin-left:80px;">
								<tr>
									<td>Sr.no</td>
									<td>Material Description</td>
									<td>UOM</td>
									<td>Quantity</td>
								</tr>									 <tr>
			 		 	<td>
			 		 		1			 		 	</td>
			 		 	<td>
			 		 		ELEC_MODU_000015D			 		 	</td>
			 		 	<td>
			 		 		PV SOLAR MODULES 310WP			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity1" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		2			 		 	</td>
			 		 	<td>
			 		 		MECH_TRCK_000087D			 		 	</td>
			 		 	<td>
			 		 		CABLE CONNECTORS FOR TRACKER			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity2" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		3			 		 	</td>
			 		 	<td>
			 		 		ADMN_ITAS_0000219			 		 	</td>
			 		 	<td>
			 		 		PVC CONDUIT			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity3" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		4			 		 	</td>
			 		 	<td>
			 		 		ELEC_HDPP_000001D			 		 	</td>
			 		 	<td>
			 		 		HDPE PIPE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity4" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		5			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000594D			 		 	</td>
			 		 	<td>
			 		 		Bottom adaptor SS304			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity5" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		6			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000596D			 		 	</td>
			 		 	<td>
			 		 		Pipe bend MS			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity6" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		7			 		 	</td>
			 		 	<td>
			 		 		MECH_BOLT_000233D			 		 	</td>
			 		 	<td>
			 		 		M 10X100 Nut,bolt,washer			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity7" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		8			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000830D			 		 	</td>
			 		 	<td>
			 		 		PP Rope 14 MM Dia with crimp clamp			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity8" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		9			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000597D			 		 	</td>
			 		 	<td>
			 		 		Bore cap CI			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity9" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		10			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000598D			 		 	</td>
			 		 	<td>
			 		 		Clamp for pipe			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity10" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		11			 		 	</td>
			 		 	<td>
			 		 		MECH_BOLT_000234D			 		 	</td>
			 		 	<td>
			 		 		M 12X60 Nut,bolt,washer			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity11" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		12			 		 	</td>
			 		 	<td>
			 		 		ELEC_SCBL_000007D			 		 	</td>
			 		 	<td>
			 		 		SOLAR CABLE - 1CX4SQMM CU			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity12" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		13			 		 	</td>
			 		 	<td>
			 		 		ELEC_SCBL_000012D			 		 	</td>
			 		 	<td>
			 		 		3*2.5 Sqmm AC Cable			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity13" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		14			 		 	</td>
			 		 	<td>
			 		 		ELEC_LTCB_000241D			 		 	</td>
			 		 	<td>
			 		 		1CX6SQMM CU EARTHING CABLE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity14" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		15			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000528D			 		 	</td>
			 		 	<td>
			 		 		EARTHING CHEMICAL GI			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity15" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		16			 		 	</td>
			 		 	<td>
			 		 		CVIL_GIPP_000011D			 		 	</td>
			 		 	<td>
			 		 		GI WIRE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity16" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		17			 		 	</td>
			 		 	<td>
			 		 		ELEC_GISR_000002D			 		 	</td>
			 		 	<td>
			 		 		25 X 3 GI STRIP			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity17" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		18			 		 	</td>
			 		 	<td>
			 		 		ELEC_SURG_000006D			 		 	</td>
			 		 	<td>
			 		 		LIGHTNING ARRESTER			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity18" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		19			 		 	</td>
			 		 	<td>
			 		 		ADMN_PLNT_0000048			 		 	</td>
			 		 	<td>
			 		 		CABLE TIE			 		 	</td>
			 		 	<td>
			 		 		SET			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity19" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		20			 		 	</td>
			 		 	<td>
			 		 		ELEC_LGHT_000007D			 		 	</td>
			 		 	<td>
			 		 		Home Lighting System			 		 	</td>
			 		 	<td>
			 		 		SET			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity20" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 </tr>
			 		  		 <tr>
			 		 	<td>
			 		 		21			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001865D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 3hp 30M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity21" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		22			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001866D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 3hp 50M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity22" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		23			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001867D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 3hp 70M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity23" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		24			 		 	</td>
			 		 	<td>
			 		 		MECH_MMSH_000086D			 		 	</td>
			 		 	<td>
			 		 		Module mounting structure for pump - 10M			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity24" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
								</td>
							</table>
							<input type="submit" name="submit" value="submit">
							<?php 
								if (isset($_POST['submit']))
								{
									echo " you click button";
								}
							 ?>
						 <?php 
						break;
					case '5AC':
						$hp="5";
						?><div style="margin-left:90px;"><h1>Create BOM for 5</h1></div>
						<table border="1" width="900px" style="margin-left:80px;">
								<tr>
									<td>Sr.no</td>
									<td>Material Description</td>
									<td>UOM</td>
									<td>Quantity</td>
								</tr>									 <tr>
			 		 	<td>
			 		 		1			 		 	</td>
			 		 	<td>
			 		 		ELEC_MODU_000015D			 		 	</td>
			 		 	<td>
			 		 		PV SOLAR MODULES 310WP			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity1" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		2			 		 	</td>
			 		 	<td>
			 		 		MECH_TRCK_000087D			 		 	</td>
			 		 	<td>
			 		 		CABLE CONNECTORS FOR TRACKER			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity2" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		3			 		 	</td>
			 		 	<td>
			 		 		ADMN_ITAS_0000219			 		 	</td>
			 		 	<td>
			 		 		PVC CONDUIT			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity3" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		4			 		 	</td>
			 		 	<td>
			 		 		ELEC_HDPP_000001D			 		 	</td>
			 		 	<td>
			 		 		HDPE PIPE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity4" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		5			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000594D			 		 	</td>
			 		 	<td>
			 		 		Bottom adaptor SS304			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity5" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		6			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000596D			 		 	</td>
			 		 	<td>
			 		 		Pipe bend MS			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity6" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		7			 		 	</td>
			 		 	<td>
			 		 		MECH_BOLT_000233D			 		 	</td>
			 		 	<td>
			 		 		M 10X100 Nut,bolt,washer			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity7" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		8			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000830D			 		 	</td>
			 		 	<td>
			 		 		PP Rope 14 MM Dia with crimp clamp			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity8" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		9			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000597D			 		 	</td>
			 		 	<td>
			 		 		Bore cap CI			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity9" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		10			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000598D			 		 	</td>
			 		 	<td>
			 		 		Clamp for pipe			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity10" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		11			 		 	</td>
			 		 	<td>
			 		 		MECH_BOLT_000234D			 		 	</td>
			 		 	<td>
			 		 		M 12X60 Nut,bolt,washer			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity11" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		12			 		 	</td>
			 		 	<td>
			 		 		ELEC_SCBL_000007D			 		 	</td>
			 		 	<td>
			 		 		SOLAR CABLE - 1CX4SQMM CU			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity12" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		13			 		 	</td>
			 		 	<td>
			 		 		ELEC_SCBL_000012D			 		 	</td>
			 		 	<td>
			 		 		3*2.5 Sqmm AC Cable			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity13" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		14			 		 	</td>
			 		 	<td>
			 		 		ELEC_LTCB_000241D			 		 	</td>
			 		 	<td>
			 		 		1CX6SQMM CU EARTHING CABLE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity14" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		15			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000528D			 		 	</td>
			 		 	<td>
			 		 		EARTHING CHEMICAL GI			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity15" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		16			 		 	</td>
			 		 	<td>
			 		 		CVIL_GIPP_000011D			 		 	</td>
			 		 	<td>
			 		 		GI WIRE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity16" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		17			 		 	</td>
			 		 	<td>
			 		 		ELEC_GISR_000002D			 		 	</td>
			 		 	<td>
			 		 		25 X 3 GI STRIP			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity17" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		18			 		 	</td>
			 		 	<td>
			 		 		ELEC_SURG_000006D			 		 	</td>
			 		 	<td>
			 		 		LIGHTNING ARRESTER			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity18" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		19			 		 	</td>
			 		 	<td>
			 		 		ADMN_PLNT_0000048			 		 	</td>
			 		 	<td>
			 		 		CABLE TIE			 		 	</td>
			 		 	<td>
			 		 		SET			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity19" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		20			 		 	</td>
			 		 	<td>
			 		 		ELEC_LGHT_000007D			 		 	</td>
			 		 	<td>
			 		 		Home Lighting System			 		 	</td>
			 		 	<td>
			 		 		SET			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity20" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		  		 <tr>
			 		 	<td>
			 		 		21			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001865D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 3hp 30M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity21" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		22			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001866D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 3hp 50M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity22" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		23			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001867D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 3hp 70M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity23" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		24			 		 	</td>
			 		 	<td>
			 		 		MECH_MMSH_000086D			 		 	</td>
			 		 	<td>
			 		 		Module mounting structure for pump - 10M			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity24" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		  <tr>
			 		 	<td>
			 		 		21			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001869D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 5hp 50M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity21" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		22			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001870D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 5hp 70M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity22" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		23			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001871D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 5hp 100M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity23" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		24			 		 	</td>
			 		 	<td>
			 		 		MECH_MMSH_000087D			 		 	</td>
			 		 	<td>
			 		 		Module mounting structure for pump - 15M			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity24" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
							</table>
							<input type="submit" name="submit" value="submit">
							<?php 
								if (isset($_POST['submit']))
								{
									echo " you click button";
								}
							 ?>
						 <?php 
						break;
						
					case '5DC':
						$hp="5";
						?><div style="margin-left:90px;"><h1>Create BOM for 5</h1></div> 
						<table border="1" width="900px" style="margin-left:80px;">
								<tr>
									<td>Sr.no</td>
									<td>Material Description</td>
									<td>UOM</td>
									<td>Quantity</td>
								</tr>									 <tr>
			 		 	<td>
			 		 		1			 		 	</td>
			 		 	<td>
			 		 		ELEC_MODU_000015D			 		 	</td>
			 		 	<td>
			 		 		PV SOLAR MODULES 310WP			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity1" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		2			 		 	</td>
			 		 	<td>
			 		 		MECH_TRCK_000087D			 		 	</td>
			 		 	<td>
			 		 		CABLE CONNECTORS FOR TRACKER			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity2" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		3			 		 	</td>
			 		 	<td>
			 		 		ADMN_ITAS_0000219			 		 	</td>
			 		 	<td>
			 		 		PVC CONDUIT			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity3" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		4			 		 	</td>
			 		 	<td>
			 		 		ELEC_HDPP_000001D			 		 	</td>
			 		 	<td>
			 		 		HDPE PIPE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity4" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		5			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000594D			 		 	</td>
			 		 	<td>
			 		 		Bottom adaptor SS304			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity5" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		6			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000596D			 		 	</td>
			 		 	<td>
			 		 		Pipe bend MS			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity6" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		7			 		 	</td>
			 		 	<td>
			 		 		MECH_BOLT_000233D			 		 	</td>
			 		 	<td>
			 		 		M 10X100 Nut,bolt,washer			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity7" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		8			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000830D			 		 	</td>
			 		 	<td>
			 		 		PP Rope 14 MM Dia with crimp clamp			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity8" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		9			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000597D			 		 	</td>
			 		 	<td>
			 		 		Bore cap CI			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity9" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		10			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000598D			 		 	</td>
			 		 	<td>
			 		 		Clamp for pipe			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity10" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		11			 		 	</td>
			 		 	<td>
			 		 		MECH_BOLT_000234D			 		 	</td>
			 		 	<td>
			 		 		M 12X60 Nut,bolt,washer			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity11" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		12			 		 	</td>
			 		 	<td>
			 		 		ELEC_SCBL_000007D			 		 	</td>
			 		 	<td>
			 		 		SOLAR CABLE - 1CX4SQMM CU			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity12" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		13			 		 	</td>
			 		 	<td>
			 		 		ELEC_SCBL_000012D			 		 	</td>
			 		 	<td>
			 		 		3*2.5 Sqmm AC Cable			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity13" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		14			 		 	</td>
			 		 	<td>
			 		 		ELEC_LTCB_000241D			 		 	</td>
			 		 	<td>
			 		 		1CX6SQMM CU EARTHING CABLE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity14" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		15			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000528D			 		 	</td>
			 		 	<td>
			 		 		EARTHING CHEMICAL GI			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity15" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		16			 		 	</td>
			 		 	<td>
			 		 		CVIL_GIPP_000011D			 		 	</td>
			 		 	<td>
			 		 		GI WIRE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity16" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		17			 		 	</td>
			 		 	<td>
			 		 		ELEC_GISR_000002D			 		 	</td>
			 		 	<td>
			 		 		25 X 3 GI STRIP			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity17" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		18			 		 	</td>
			 		 	<td>
			 		 		ELEC_SURG_000006D			 		 	</td>
			 		 	<td>
			 		 		LIGHTNING ARRESTER			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity18" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		19			 		 	</td>
			 		 	<td>
			 		 		ADMN_PLNT_0000048			 		 	</td>
			 		 	<td>
			 		 		CABLE TIE			 		 	</td>
			 		 	<td>
			 		 		SET			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity19" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		20			 		 	</td>
			 		 	<td>
			 		 		ELEC_LGHT_000007D			 		 	</td>
			 		 	<td>
			 		 		Home Lighting System			 		 	</td>
			 		 	<td>
			 		 		SET			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity20" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		  <tr>
			 		 	<td>
			 		 		21			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001869D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 5hp 50M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity21" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		22			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001870D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 5hp 70M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity22" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		23			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_001871D			 		 	</td>
			 		 	<td>
			 		 		Submersible Water Pump - 5hp 100M			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity23" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		24			 		 	</td>
			 		 	<td>
			 		 		MECH_MMSH_000087D			 		 	</td>
			 		 	<td>
			 		 		Module mounting structure for pump - 15M			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity24" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
							</table>
							<input type="submit" name="submit" value="submit">
							<?php 
								if (isset($_POST['submit']))
								{
									echo " you click button";
								}
							 ?>
						<?php 
						break;
					case '7.5AC':
						$hp="7.5";
						?> 
						<div style="margin-left:90px;"><h1>Create BOM for 7.5</h1></div> 
						<table border="1" width="900px" style="margin-left:80px;">
								<tr>
									<td>Sr.no</td>
									<td>Material Code</td>
									<td>Material Description</td>
									<td>UOM</td>
									<td>Quantity</td>
								</tr>									 <tr>
			 		 	<td>
			 		 		1			 		 	</td>
			 		 	<td>
			 		 		ELEC_MODU_000015D			 		 	</td>
			 		 	<td>
			 		 		PV SOLAR MODULES 310WP			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity1" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		2			 		 	</td>
			 		 	<td>
			 		 		MECH_TRCK_000087D			 		 	</td>
			 		 	<td>
			 		 		CABLE CONNECTORS FOR TRACKER			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity2" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		3			 		 	</td>
			 		 	<td>
			 		 		ADMN_ITAS_0000219			 		 	</td>
			 		 	<td>
			 		 		PVC CONDUIT			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity3" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		4			 		 	</td>
			 		 	<td>
			 		 		ELEC_HDPP_000001D			 		 	</td>
			 		 	<td>
			 		 		HDPE PIPE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity4" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		5			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000594D			 		 	</td>
			 		 	<td>
			 		 		Bottom adaptor SS304			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity5" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		6			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000596D			 		 	</td>
			 		 	<td>
			 		 		Pipe bend MS			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity6" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		7			 		 	</td>
			 		 	<td>
			 		 		MECH_BOLT_000233D			 		 	</td>
			 		 	<td>
			 		 		M 10X100 Nut,bolt,washer			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity7" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		8			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000830D			 		 	</td>
			 		 	<td>
			 		 		PP Rope 14 MM Dia with crimp clamp			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity8" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		9			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000597D			 		 	</td>
			 		 	<td>
			 		 		Bore cap CI			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity9" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		10			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000598D			 		 	</td>
			 		 	<td>
			 		 		Clamp for pipe			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity10" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		11			 		 	</td>
			 		 	<td>
			 		 		MECH_BOLT_000234D			 		 	</td>
			 		 	<td>
			 		 		M 12X60 Nut,bolt,washer			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity11" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		12			 		 	</td>
			 		 	<td>
			 		 		ELEC_SCBL_000007D			 		 	</td>
			 		 	<td>
			 		 		SOLAR CABLE - 1CX4SQMM CU			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity12" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		13			 		 	</td>
			 		 	<td>
			 		 		ELEC_SCBL_000012D			 		 	</td>
			 		 	<td>
			 		 		3*2.5 Sqmm AC Cable			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity13" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		14			 		 	</td>
			 		 	<td>
			 		 		ELEC_LTCB_000241D			 		 	</td>
			 		 	<td>
			 		 		1CX6SQMM CU EARTHING CABLE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity14" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		15			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000528D			 		 	</td>
			 		 	<td>
			 		 		EARTHING CHEMICAL GI			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity15" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		16			 		 	</td>
			 		 	<td>
			 		 		CVIL_GIPP_000011D			 		 	</td>
			 		 	<td>
			 		 		GI WIRE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity16" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		17			 		 	</td>
			 		 	<td>
			 		 		ELEC_GISR_000002D			 		 	</td>
			 		 	<td>
			 		 		25 X 3 GI STRIP			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity17" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		18			 		 	</td>
			 		 	<td>
			 		 		ELEC_SURG_000006D			 		 	</td>
			 		 	<td>
			 		 		LIGHTNING ARRESTER			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity18" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		19			 		 	</td>
			 		 	<td>
			 		 		ADMN_PLNT_0000048			 		 	</td>
			 		 	<td>
			 		 		CABLE TIE			 		 	</td>
			 		 	<td>
			 		 		SET			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity19" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		20			 		 	</td>
			 		 	<td>
			 		 		ELEC_LGHT_000007D			 		 	</td>
			 		 	<td>
			 		 		Home Lighting System			 		 	</td>
			 		 	<td>
			 		 		SET			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity20" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
					 <tr>
			 		 	<td>
			 		 		21			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000854D			 		 	</td>
			 		 	<td>
			 		 		HDPE PIPE PE 100			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity21" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		22			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_002516D			 		 	</td>
			 		 	<td>
			 		 		Submersible Pump 7.5hp 70M with SPD N CB			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity22" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		23			 		 	</td>
			 		 	<td>
			 		 		MECH_MMSH_000089D			 		 	</td>
			 		 	<td>
			 		 		Module mounting structure for pump - 22M			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity23" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		24			 		 	</td>
			 		 	<td>
			 		 		ELEC_AUX1_000512D			 		 	</td>
			 		 	<td>
			 		 		Branch Connector			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity24" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
							</table>
							<input type="submit" name="submit" value="submit">
							<?php 
								if (isset($_POST['submit']))
								{
									echo " you click button";
								}
							 ?>
						<?php 
						break;
						
					case '7.5DC':
						$hp="7.5";
						?><div style="margin-left:90px;"><h1>Create BOM for 7.5</h1></div> 
						<table border="1" width="900px" style="margin-left:80px;">
								<tr>
									<td>Sr.no</td>
									<td>Material Code</td>
									<td>Material Description</td>
									<td>UOM</td>
									<td>Quantity</td>
								</tr>									 <tr>
			 		 	<td>
			 		 		1			 		 	</td>
			 		 	<td>
			 		 		ELEC_MODU_000015D			 		 	</td>
			 		 	<td>
			 		 		PV SOLAR MODULES 310WP			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity1" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		2			 		 	</td>
			 		 	<td>
			 		 		MECH_TRCK_000087D			 		 	</td>
			 		 	<td>
			 		 		CABLE CONNECTORS FOR TRACKER			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity2" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		3			 		 	</td>
			 		 	<td>
			 		 		ADMN_ITAS_0000219			 		 	</td>
			 		 	<td>
			 		 		PVC CONDUIT			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity3" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		4			 		 	</td>
			 		 	<td>
			 		 		ELEC_HDPP_000001D			 		 	</td>
			 		 	<td>
			 		 		HDPE PIPE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity4" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		5			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000594D			 		 	</td>
			 		 	<td>
			 		 		Bottom adaptor SS304			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity5" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		6			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000596D			 		 	</td>
			 		 	<td>
			 		 		Pipe bend MS			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity6" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		7			 		 	</td>
			 		 	<td>
			 		 		MECH_BOLT_000233D			 		 	</td>
			 		 	<td>
			 		 		M 10X100 Nut,bolt,washer			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity7" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		8			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000830D			 		 	</td>
			 		 	<td>
			 		 		PP Rope 14 MM Dia with crimp clamp			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity8" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		9			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000597D			 		 	</td>
			 		 	<td>
			 		 		Bore cap CI			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity9" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		10			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_000598D			 		 	</td>
			 		 	<td>
			 		 		Clamp for pipe			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity10" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		11			 		 	</td>
			 		 	<td>
			 		 		MECH_BOLT_000234D			 		 	</td>
			 		 	<td>
			 		 		M 12X60 Nut,bolt,washer			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity11" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		12			 		 	</td>
			 		 	<td>
			 		 		ELEC_SCBL_000007D			 		 	</td>
			 		 	<td>
			 		 		SOLAR CABLE - 1CX4SQMM CU			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity12" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		13			 		 	</td>
			 		 	<td>
			 		 		ELEC_SCBL_000012D			 		 	</td>
			 		 	<td>
			 		 		3*2.5 Sqmm AC Cable			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity13" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		14			 		 	</td>
			 		 	<td>
			 		 		ELEC_LTCB_000241D			 		 	</td>
			 		 	<td>
			 		 		1CX6SQMM CU EARTHING CABLE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity14" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		15			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000528D			 		 	</td>
			 		 	<td>
			 		 		EARTHING CHEMICAL GI			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity15" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		16			 		 	</td>
			 		 	<td>
			 		 		CVIL_GIPP_000011D			 		 	</td>
			 		 	<td>
			 		 		GI WIRE			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity16" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		17			 		 	</td>
			 		 	<td>
			 		 		ELEC_GISR_000002D			 		 	</td>
			 		 	<td>
			 		 		25 X 3 GI STRIP			 		 	</td>
			 		 	<td>
			 		 		MTR			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity17" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		18			 		 	</td>
			 		 	<td>
			 		 		ELEC_SURG_000006D			 		 	</td>
			 		 	<td>
			 		 		LIGHTNING ARRESTER			 		 	</td>
			 		 	<td>
			 		 		NOS			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity18" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		19			 		 	</td>
			 		 	<td>
			 		 		ADMN_PLNT_0000048			 		 	</td>
			 		 	<td>
			 		 		CABLE TIE			 		 	</td>
			 		 	<td>
			 		 		SET			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity19" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		20			 		 	</td>
			 		 	<td>
			 		 		ELEC_LGHT_000007D			 		 	</td>
			 		 	<td>
			 		 		Home Lighting System			 		 	</td>
			 		 	<td>
			 		 		SET			 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity20" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
					 <tr>
			 		 	<td>
			 		 		21			 		 	</td>
			 		 	<td>
			 		 		CVIL_AUX2_000854D			 		 	</td>
			 		 	<td>
			 		 		HDPE PIPE PE 100			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity21" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		22			 		 	</td>
			 		 	<td>
			 		 		MECH_AUX1_002516D			 		 	</td>
			 		 	<td>
			 		 		Submersible Pump 7.5hp 70M with SPD N CB			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity22" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		23			 		 	</td>
			 		 	<td>
			 		 		MECH_MMSH_000089D			 		 	</td>
			 		 	<td>
			 		 		Module mounting structure for pump - 22M			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity23" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
			 		 			 		 <tr>
			 		 	<td>
			 		 		24			 		 	</td>
			 		 	<td>
			 		 		ELEC_AUX1_000512D			 		 	</td>
			 		 	<td>
			 		 		Branch Connector			 		 	</td>
			 		 	<td>
			 		 					 		 	</td>
			 		 	<td>
			 		 		<input type="number" name="quantity24" placeholder="Quantity">
			 		 	</td>
			 		 </tr>
							</table>
							<input type="submit" name="submit" value="submit">
							<?php 
								if (isset($_POST['submit']))
								{
									echo " you click button";
								}
							 ?>
						<?php 
						break;
				}

				
			 ?>

	</div>
</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>

