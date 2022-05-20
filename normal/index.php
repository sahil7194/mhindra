<?php
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role=$_SESSION['role'];
	$warehouse=$_SESSION['warehouse'];
	$user=$_COOKIE['username'];
    $pass=$_COOKIE['password'];
	if ($username !="" && $password !="") 
	{
		$query = "SELECT `username`, `password`, `role` FROM `login_details` WHERE `username`='$user' AND`password` ='$pass' AND `role`='$role'";
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

	//code for count number of row to find data inward incomplete 
	$sql_for_inward_incomplete="SELECT `id`, `DeliveryNote`, `SuplierName`, `warehouse`, `WorkStatus`, `SupDoc`, `CreateDate` FROM `delivaerynote` WHERE `WorkStatus`='incomplete' AND `warehouse`='$warehouse'";
	$run_for_inward_incomplete=mysqli_query($conn,$sql_for_inward_incomplete);
	$count_incomplete_inward=mysqli_num_rows($run_for_inward_incomplete);

  //code for count number of row to find data complete
	$sql_for_inward_complete="SELECT `id`, `DeliveryNote`, `SuplierName`, `warehouse`, `WorkStatus`, `SupDoc`, `CreateDate` FROM `delivaerynote` WHERE `WorkStatus`='complete' AND `warehouse`='$warehouse'";
	$run_for_inward_complete=mysqli_query($conn,$sql_for_inward_complete);
	$count_complete_inward=mysqli_num_rows($run_for_inward_complete);
  	
  	//code for count number of row outward incomplete 
  	$sql_for_outward_incomplte="SELECT `id`, `InvoiceNumber`, `WorkAssignTo`, `warehouse`, `WorkStatus` FROM `invoice` WHERE `warehouse`='$warehouse' AND`WorkStatus`='incomplete'";
  	$run_for_outward_incomplte=mysqli_query($conn,$sql_for_outward_incomplte);
  	$cout_no_row_incpmlete_outward=mysqli_num_rows($run_for_outward_incomplte);

  	//code for count number of row outward complete
  	$sql_for_outward_complte="SELECT `id`, `InvoiceNumber`, `WorkAssignTo`, `warehouse`, `WorkStatus` FROM `invoice` WHERE `warehouse`='$warehouse' AND`WorkStatus`='complete'";
  	$run_for_outward_complte=mysqli_query($conn,$sql_for_outward_complte);
  	$cout_no_row_complete_outward=mysqli_num_rows($run_for_outward_complte); 

  	//count add data
  	$count1=$count_incomplete_inward;
  	$count2=$count_complete_inward;
  	$count3=$cout_no_row_incpmlete_outward;
  	$count4=$cout_no_row_complete_outward;
  	
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Worker Home</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/su_index.css">
	<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Activity Detials"
	},
	axisY: {
		title: "Work"
	},
	data: [{
		type: "line",
		dataPoints: [
		{"y":<?php echo $count1;?>,"label":"Incomplte inward"},
		{"y":<?php echo $count2;?>,"label":"copmlete inward"},
		{"y":<?php echo $count3;?>,"label":"incopmelte Outward"},
		{"y":<?php echo $count4;?>,"label":"complte outward"}]
			}]
});
chart.render();
 
}
</script>
<style type="text/css">
	 .logo
    {
    	margin-left: 0px;
    	height: 120px;
    	float: left;
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
					<section id="item1">
						<a href="http://localhost/Current%20Project/mahindra/normal/index.php">Home</a>
					</section>
					<section id="item1">
						<a href="http://localhost/Current%20Project/mahindra/normal/new_inward.php">Inward</a>
					</section>
					<section id="item2">
						<a href="http://localhost/Current%20Project/mahindra/normal/new_outward.php">Outward</a>
					</section>
					<section id="bulk">
						<a href="http://localhost/Current%20Project/mahindra/normal/damage_quantity.php">
							Damage
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
				<div class="dashbord-area">
					<div class="area-1">
						<!--
						<div class="area-title">
							<div id="chartContainer" style="height: 370px; width: 100%;"></div>
							<script src="http://localhost/Current%20Project/mahindra/js/canvas.js"></script>
						</div>
					-->
					</div>
					<div class="area-2">
						<div class="area-title">
							<h1>Notification</h1>
						</div>
						<div class="work-information">
								<table  class="sub" align="center">
									<tr>
										<th class="title"> 
											Title
										</th>
										<th>
											Read
										</th>
									</tr>
									<?php 
										$s_query="SELECT `id`, `Sento`, `Title`, `Massage`, `Replay`, `CreateDate` FROM `notification` ORDER BY`CreateDate` DESC";
										$run_lk=mysqli_query($conn,$s_query);
										while ($row_s=mysqli_fetch_array($run_lk)) 
										{
											?>
											<tr>
												<td>
													<?php echo $row_s['Title'] ?>
												</td>
												<td>
													<a href="read_notification.php?id=<?php echo $row_s['id'];?>">
														Read
													</a>
												</td>
											</tr>
											<?php
										}
									 ?>
								</table>
							</td>
						</tr>
					</table>
						</div>
					</div>
				</div>
			</span>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>