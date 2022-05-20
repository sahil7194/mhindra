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
  <?php 	
			error_reporting('0');
			if ($warehouse!="")
			{
				// code block inward value  for single warehouse
		 	$in_select_item_ware="SELECT `ItemName`, `RecivedQuantity`, `FixedValue` FROM `item` WHERE `warehouse`='$warehouse'";
		 	$in_run_item_ware=mysqli_query($conn,$in_select_item_ware);
		 	//echo "<br> no of row".$c=mysqli_num_rows($run_item_ware);
		 	$in_sum_inward_item="0";
		 	while($in_row_item_ware=mysqli_fetch_array($in_run_item_ware))
		 	{		 		
		 		$in_item_ware_value=$in_row_item_ware['RecivedQuantity']*$in_row_item_ware['FixedValue'];
		 		$sum_inward_item=$sum_inward_item+$in_item_ware_value;
		 	}

		 	 // code block inward value  for single warehouse
		 	$ot_select_item_ware="SELECT `ItemName`, `RecivedQuantity`, `FixedValue` FROM `item` WHERE `warehouse`='$warehouse'";
		 	$ot_run_item_ware=mysqli_query($conn,$ot_select_item_ware);
		 	//echo "<br> no of row".$c=mysqli_num_rows($run_item_ware);
		 	$in_sum_inward_item="0";
		 	while($ot_row_item_ware=mysqli_fetch_array($ot_run_item_ware))
		 	{		 		
		 		$ot_item_ware_value=$ot_row_item_ware['RecivedQuantity']*$ot_row_item_ware['FixedValue'];
		 		$sum_outward_item=$sum_outward_item+$in_item_ware_value;
		 	}
		 //	echo "<br> sum of item inward : -".$sum_inward_item;
		 //	echo "<br> sum of item outward : -".$sum_outward_item;
			}
			else
			{
							//code block for all ware house
					 function inward_value($item_name)
					 {
					 	include 'config.php';

					 	$select_item="SELECT `ItemName`,SUM(`RecivedQuantity`) AS `rc_item_total`, `FixedQuantity`, `FixedValue` FROM `item` WHERE `ItemName`='$item_name'";
					 	$run_item=mysqli_query($conn,$select_item);
					 	while($row_item=mysqli_fetch_assoc($run_item))
					 	{
					 		$rc_q=$row_item['rc_item_total'];
					 		$rc_f=$row_item['FixedValue'];
					 	}

					 	//echo "<br> inward item value for $item_name :- "
					 	return $inward_value_2=$rc_q*$rc_f;
					 }

					  function outward_value($item_name)
					 {
					 	include 'config.php';

					 	$select_item="SELECT `ItemName`,SUM(`IssuedQuantity`) AS `rc_item_total`, `FixedQuantity`, `FixedValue` FROM `item` WHERE `ItemName`='$item_name'";
					 	$run_item=mysqli_query($conn,$select_item);
					 	while($row_item=mysqli_fetch_assoc($run_item))
					 	{
					 		$rc_q=$row_item['rc_item_total'];
					 		$rc_f=$row_item['FixedValue'];
					 	}

					 	//echo "<br> inward item value for $item_name :- "
					 	return $inward_value_2=$rc_q*$rc_f;
					 }
					 // code block for inward value
					 $select_item_name="SELECT `ItemName` FROM `item` WHERE `warehouse`='POLESTAR'";
					 $run_item_name=mysqli_query($conn,$select_item_name);
					 //echo $c=mysqli_num_rows($run_item_name);
					 $sum_inward_item="0";
					 $sum_outward_item="0";
					 while ($row_item=mysqli_fetch_assoc($run_item_name))
					 {
					 	 $item_name=$row_item['ItemName'];
					 	 //code block for inward value
					 	 $inwa=inward_value($item_name);
					 	 $sum_inward_item=$sum_inward_item+$inwa;

					 	 //code blaco for outward
					 	$outwa=outward_value($item_name);
					 	$sum_outward_item=$sum_outward_item+$outwa;
					 }
					 //value of total outward value for all warehouse
					// echo "<br> sum of item inward : -".$sum_inward_item;
					// echo "<br> sum of item outward : -".$sum_outward_item;
			}
			//function for geting value for parameters 
			//function for warehouse 
			function value_1($it_name_1,$warehouse)
			{
				include 'config.php';
				$select_data="SELECT `ItemName`,`ItemValue` FROM `item` WHERE `ItemName`='$it_name_1'AND `warehouse`='$warehouse'";
				$run_data=mysqli_query($conn,$select_data);
				while ($row_data=mysqli_fetch_assoc($run_data))
				{
					$value =$row_data['ItemValue'];
				}
				return $value;

			}
			function qunatity_1($it_name_1,$warehouse)
			{
				include 'config.php';
				$select_data="SELECT `ItemName`,`Qauntity` FROM `item` WHERE `ItemName`='$it_name_1'AND `warehouse`='$warehouse'";
				$run_data=mysqli_query($conn,$select_data);
				while ($row_data=mysqli_fetch_assoc($run_data))
				{
					 $qauntit= $row_data['Qauntity'];
				}
				return $qauntit;
			}

			
			//function for  all ware house
			function value_2($it_name_1)
			{
				include 'config.php';
				$select_data="SELECT `ItemName`, SUM( `ItemValue`) AS `sum1` FROM `item` WHERE `ItemName`='$it_name_1';";
				$run_data=mysqli_query($conn,$select_data);
				while ($row_data=mysqli_fetch_assoc($run_data))
				{
					$value =$row_data['sum1'];
				}
				return $value;

			}
			function qunatity_2($it_name_1)
			{
				include 'config.php';
				$select_data="SELECT `ItemName`, SUM(`Qauntity`) AS `sum2` FROM `item` WHERE `ItemName`='$it_name_1'";
				$run_data=mysqli_query($conn,$select_data);
				while ($row_data=mysqli_fetch_assoc($run_data))
				{
					 $qauntit= $row_data['sum2'];
				}
				return $qauntit;
			}


			    $value1="0";
				$qunatity1="0";
				$value2="0";
				$qunatity2="0";
				$value3="0";
				$qunatity3="0";
				$value4="0";
				$qunatity4="0";
				$value5="0";
				$qunatity5="0";
				$value6="0";
				$qunatity6="0";
				$value7="0";
				$qunatity7="0";
				$value8="0";
				$qunatity8="0";
				$value9="0";
				$qunatity9="0";
				$value10="0";
				$qunatity10="0";
				$value11="0";
				$qunatity11="0";
		if ($warehouse!="")
		{
			//item 1
			$value1=value_1("PV SOLAR MODULES 310WP",$warehouse);
			$qunatity1=qunatity_1("PV SOLAR MODULES 310WP (7.5HP)",$warehouse);
			//item 2
			$value2=value_1("PV SOLAR MODULES 310WP (7.5HP)",$warehouse);
			$qunatity2=qunatity_1("PV SOLAR MODULES 310WP",$warehouse);
			//item 3
			$value3=value_1("PV SOLAR MODULES 320WP",$warehouse);
			$qunatity3=qunatity_1("PV SOLAR MODULES 320WP",$warehouse);			
			//item 4
			$value4=value_1("MODULE MOUNTING STRUCTURE for 3 HP Water Pump",$warehouse);
			$qunatity4=qunatity_1("MODULE MOUNTING STRUCTURE for 3 HP Water Pump",$warehouse);
			//item 5
			$value5=value_1("MODULE MOUNTING STRUCTURE for 5 HP Water Pump ",$warehouse);
			$qunatity5=qunatity_1("MODULE MOUNTING STRUCTURE for 5 HP Water Pump ",$warehouse);
			//item 6
			$value6=value_1("Submersible Water Pump - 3hp 30M",$warehouse);
			$qunatity6=qunatity_1("Submersible Water Pump - 3hp 30M",$warehouse);
			//item 7
			$value7=value_1("Submersible Water Pump - 3hp 50M",$warehouse);
			$qunatity7=qunatity_1("Submersible Water Pump - 3hp 50M",$warehouse);
			//item 8
			$value8=value_1("Submersible Water Pump - 3hp 70M",$warehouse);
			$qunatity8=qunatity_1("Submersible Water Pump - 3hp 70M",$warehouse);
			//item 9
			$value9=value_1("Submersible Water Pump - 5hp 50M",$warehouse);
			$qunatity9=qunatity_1("Submersible Water Pump - 3hp 50M",$warehouse);
			//item 10
			$value10=value_1("Submersible Water Pump - 5hp 70M",$warehouse);
			$qunatity9=qunatity_1("Submersible Water Pump - 5hp 70M",$warehouse);
			//item 11
			$value11=value_1("Submersible Water Pump - 5hp 100M",$warehouse);
			$qunatity11=qunatity_1("Submersible Water Pump - 5hp 100M",$warehouse);
			
		}
		else
		{
			  			//item 1
			$value1=value_2("PV SOLAR MODULES 310WP");
			$qunatity1=qunatity_2("PV SOLAR MODULES 310WP (7.5HP)");
			//item 2
			$value2=value_2("PV SOLAR MODULES 310WP (7.5HP)");
			$qunatity2=qunatity_2("PV SOLAR MODULES 310WP");
			//item 3
			$value3=value_2("PV SOLAR MODULES 320WP");
			$qunatity3=qunatity_2("PV SOLAR MODULES 320WP");			
			//item 4
			$value4=value_2("MODULE MOUNTING STRUCTURE for 3 HP Water Pump");
			$qunatity4=qunatity_2("MODULE MOUNTING STRUCTURE for 3 HP Water Pump");
			//item 5
			$value5=value_2("MODULE MOUNTING STRUCTURE for 5 HP Water Pump ");
			$qunatity5=qunatity_2("MODULE MOUNTING STRUCTURE for 5 HP Water Pump ");
			//item 6
			$value6=value_2("Submersible Water Pump - 3hp 30M");
			$qunatity6=qunatity_2("Submersible Water Pump - 3hp 30M");
			//item 7
			$value7=value_2("Submersible Water Pump - 3hp 50M");
			$qunatity7=qunatity_2("Submersible Water Pump - 3hp 50M");
			//item 8
			$value8=value_2("Submersible Water Pump - 3hp 70M");
			$qunatity8=qunatity_2("Submersible Water Pump - 3hp 70M");
			//item 9
			$value9=value_2("Submersible Water Pump - 5hp 50M");
			$qunatity9=qunatity_2("Submersible Water Pump - 3hp 50M");
			//item 10
			$value10=value_2("Submersible Water Pump - 5hp 70M");
			$qunatity9=qunatity_2("Submersible Water Pump - 5hp 70M");
			//item 11
			$value11=value_2("Submersible Water Pump - 5hp 100M");
			$qunatity11=qunatity_2("Submersible Water Pump - 5hp 100M");
		}

		 ?>
<!DOCTYPE html>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Stock(Inward ,Outward) Value",
		horizontalAlign: "center"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label}",
		toolTipContent: "<b>{label}:</b> {y}",
		dataPoints: [
			{ y: <?php echo $sum_inward_item;?>, label: "Inward" },
			{ y: <?php echo $sum_outward_item;?>, label: "Outward"}
		]
	}]
});
var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	title:{
		text: "Abstract"
	},	
	axisY: {
		title: "Qunatity",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	axisY2: {
		title: "Value",
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E"
	},	
	toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Qunatity",
		legendText: "Qunatity",
		showInLegend: true, 
		dataPoints:[
			{ label: "PVSM 310", y: <?php echo $qunatity1; ?> },
			{ label: "PVSM 310(7.5)", y: <?php echo $qunatity2; ?> },
			{ label: "PVSM 320", y: <?php echo $qunatity3; ?> },
			{ label: "MMS 3", y: <?php echo $qunatity4; ?> },
			{ label: "MMS 5", y: <?php echo $qunatity5; ?> },
			{ label: "SWP 3.0", y: <?php echo $qunatity6; ?> },
			{ label: "SWP 3.0", y: <?php echo $qunatity7; ?> },
			{ label: "SWP 3.0", y: <?php echo $qunatity8; ?> },
			{ label: "SWP 5.0", y: <?php echo $qunatity9; ?> },
			{ label: "SWP 5.0", y: <?php echo $qunatity10; ?> },
			{ label: "SWP 5.100", y: <?php echo $qunatity11; ?> }
			
		]
	},
	{
		type: "column",	
		name: "Value",
		legendText: "Value",
		axisYType: "secondary",
		showInLegend: true,
		dataPoints:[
			{ label: "PVSM 310", y: <?php echo $value1; ?> },
			{ label: "PVSM 310(7.5)", y: <?php echo $value2; ?> },
			{ label: "PVSM 320", y: <?php echo $value3; ?> },
			{ label: "MMS 3", y: <?php echo $value4; ?> },
			{ label: "MMS 5", y: <?php echo $value5; ?> },
			{ label: "SWP 3.0", y: <?php echo $value6; ?> },
			{ label: "SWP 3.0", y:<?php echo $value7; ?> },
			{ label: "SWP 3.0", y: <?php echo $value8; ?> },
			{ label: "SWP 5.0", y: <?php echo $value9; ?> },
			{ label: "SWP 5.0", y: <?php echo $value10; ?> },
			{ label: "SWP 5.100", y: <?php echo $value11; ?> }
		]
	}]
});
chart1.render();

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart1.render();
}

chart.render();

}
</script>
	<title>Master Home</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">

	<style type="text/css">
		.controle-section,.working-section
		{
			height: 1500px;
		}
		#chartContainer
		{
			height: 350px;
			width: 400px;
			margin-left: 80px;
			float: left;
		}
		#chartContainer1
		{
			margin-top: 40px;
			height: 600px;
			width: 1200px;
		}
		.notification
		{
			margin-left: 570px;
			height: 350px;
			width: 700px;
		}
		.notification h1
		{
			text-align: center;
		}
		.notread
		{
			width: 660px;
			height: 300px;
			margin-left: 20px;
			overflow: auto;
		}
		.abrivation
		{
			margin-top: 30px;
			margin-left: 80px;
			line-height: 32px;
		}
		.abrivation h1
		{
			margin-bottom: 8px;
		}
		th
		{
			width: 570px;
			padding-bottom: 30px;
		}
		.th-heading
		{
			font-size: 35px;
		}
		td
		{
			padding-left: 10px;
			padding-right: 10px;
		}
		.working-section a
		{
			text-decoration: none;
			color: #f39021;
			font-size: 20px;
			font-weight: bold;
		}

		.working-section a:hover
		{
			text-decoration: none;
			color: #e51c38;
			font-size: 20px;
			font-weight: bold;
		}

	</style>
</head>
<body>
	<img src="http://localhost/Current%20Project/mahindra/imgs/logo.png" class="logo">
	<div class="title-section">
				<div class="header-area">
			<a href="index.php" style="font-family: rockwell; margin-top:20px;"><?php echo 	$company_name; ?> </a>	
				</div>
</div>
	</div>	<div class="controle-section">
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
		 <div id="chartContainer" ></div>
		 <div class="notification">
		 	<h1>Notification</h1>
		 	<div class="notread">
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
										$s_query="SELECT `id`, `Sento`, `Title`, `Massage`, `Replay`, `CreateDate` FROM  `notification` WHERE `sento`='$username' ORDER BY`CreateDate` DESC";
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
		 	</div>
		 </div>
		 <div id="chartContainer1" ></div>
<script src="http://localhost/Current%20Project/mahindra/js/canvas.js"></script>	
<div class="abrivation">
	<ul>
		<h1>Abbreviation</h1>
		<li>PV SOLAR MODULES 310WP :- <b>PVSM 310</b></li>
		<li>PV SOLAR MODULES 310WP (7.5HP) :- <b>PVSM 310(7.5)</b></li>
		<li>PV SOLAR MODULES 320WP :- <b>PVSM 320</b></li>
		<li>MODULE MOUNTING STRUCTURE for 3 HP Water Pump :- <b>MMS 3</b></li>
		<li>MODULE MOUNTING STRUCTURE for 5 HP Water Pump :- <b>MMS 5</b></li>
		<li>Submersible Water Pump - 3hp 30M :- <b>SWP 3.30</b></li>
		<li>Submersible Water Pump - 3hp 50M :- <b>SWP 3.50</b></li>
		<li>Submersible Water Pump - 3hp 70M :- <b>SWP 3.70</b></li>
		<li>Submersible Water Pump - 5hp 50M :- <b>SWP 5.50</b></li>
		<li>Submersible Water Pump - 5hp 70M :- <b>SWP 5.70</b></li>
		<li>Submersible Water Pump - 5hp 100M :- <b>SWP 5.100</b></li>
		</ul>
</div>
	</div>
		</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>