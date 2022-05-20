 <?php
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role="super";
	$warehous=$_SESSION['warehouse'];
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
	
 
$Invoice_number=$_GET['id'];
 ?>	
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/jquery.min.js"></script>
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/qrcode.js"></script>
	<title>Inward Details</title>
	<style type="text/css">
		*
		{
			font-size: 12px;
		}
	</style>
</head>
<body>
<table border="1" width="900px">
	<tr>
		<td width="200px" height="100px">
			<img src="http://localhost/Current%20Project/mahindra/imgs/oldlogo.png" height="100px" width="180px">
		</td>
		<td width="550px" height="100px">
			<br>
			<b><?php echo $company_name;?></b><br>
			4th Floor,Technosoft Knowledge Gateway, Plot No B-14,<br>
			Road No. 01 Wagale Industrial Estate, Near Mulund Check Naka,<br>
			Thane West 400604, Maharashtra
		</td>
		<td width="150px" height="100px">
			<div id="qrcode" style="width:150px; height:100px;"></div>
		</td>
	</tr>
	<tr>
		<td colspan="3" height="20px;" align="center">
			DELIVERY CHALLAN
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<table border="1">
				<?php 

					$select_ware_house="SELECT `id`, `name`, `incharge`, `location` FROM `warehous` WHERE `name`='$warehous'";
					$run_warehouse=mysqli_query($conn,$select_ware_house);
					while ($row_warehouse=mysqli_fetch_array($run_warehouse))
					{
						$w_name=$row_warehouse['name'];
						$w_location=$row_warehouse['location'];
					}
				 ?>
			<tr>
				<td width="300px" height="100px">
					<table>
				<tr>
					<td>
						<b>To:</b>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $w_name; ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $w_location; ?>
					</td>
				</tr>
			</table>
				</td>
				<td width="300px" height="100px">
				<table>
					<?php 
						$select_del_data="SELECT `id`, `DeliveryNote`, `SuplierName`, `SuplierMobileNumber`, `SSN`, `SSMN`, `warehouse`, `CreateDate` FROM `delivaerynote` WHERE `DeliveryNote`='$Invoice_number'";
						$run_del_data=mysqli_query($conn,$select_del_data);
						while ($row_del_data=mysqli_fetch_array($run_del_data)) 
						{
							?>

				<tr>
					<td>
						<b>From</b>
					</td>
				</tr>
				<tr>
					<td>
						Vender Name :- <?php echo $row_del_data['SuplierName']; ?>
					</td>
				</tr>
				<tr>
					<td>
						Vender Mobile Number :- <?php echo $row_del_data['SuplierMobileNumber']; ?>

					</td>
				</tr>
			</table>
			
				</td>
				<td width="300px" height="100px">
					<table>
						<tr>
					<td>
						Delivery Invoice Number :-<input id="text" type="text" value="<?php echo $row_del_data['DeliveryNote']; ?>" style="border: none; width: 60px;">
					</td>
				</tr>
				<tr>
					<td>
						Date :-  <?php echo $row_del_data['CreateDate']; ?>
					</td>
				</tr>
					</table>
				</td>
			</tr>
		</table>

							<?php
						}

					 ?>
		</td>		
	</tr>
	<tr>
		<td colspan="3" width="900px" height="10px">

		</td>
	</tr>
	<tr>
		<td colspan="3">
			<table border="1" width="900px">
				<tr>
					<td width="60px">
						Sr.NO
					</td>
					<td>
						Description
					</td>
					<td width="100px">
						Qty
					</td>
					<td>
						Value
					</td>
				</tr>
				<?php 
				error_reporting('0');
					$select_item_list="SELECT `id`, `invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `CreateDate` FROM `inward` WHERE `invoiceNumber`='$Invoice_number'";
					$run_item_list=mysqli_query($conn,$select_item_list);
					while ($row_item_list=mysqli_fetch_array($run_item_list))
					 {
					 	$counter=$counter+1;
						?>
						<tr>
						<td>
							<?php echo $counter; ?>
						</td>
						<td>
							<?php echo $row_item_list['ItemName']; ?>
						</td>
						<td>
							<?php echo $row_item_list['Quantity']; ?>
						</td>
						<td>
							<?php echo $row_item_list['Value']; ?>
						</td>
						</tr>
						<?php
					}
				 ?>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<table width="900px" border="1">
				<tr>
					<td width="50%" height="80px">
						
					</td>
					<td width="50%">
						
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<table width="900px">
				<tr>
					<td width="50%" height="80px">
						<table>
				<tr>
					<td>
						GSTIN NO :-
					</td>
				</tr>
				<tr>
					<td>
						Pan No :-
					</td>
				</tr>
				<tr>
					<td>
						CIN NO :-
					</td>
				</tr>
			</table>
					</td>
					<td width="50%">
						<table width="100%">
				<tr>
					<td>
						For Mahindra Susten Private Limited
					</td>
				</tr>
				<tr>
					<td>
						Authorised Signatory
					</td>
				</tr>
			</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			Regd. Office : Mahindra Towers,G.M. Bhosale Road,P.K.Kurne Chowk, Worli,Mumbai-400018
		</td>
	</tr>
</table>
<div style="margin-left: 490px; margin-top:50px;">
	<button onclick="window.print()" style="text-align: center;">Print</button>
</div>
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 150,
	height : 100
});

function makeCode () {		
	var elText = document.getElementById("text");
	
	/*if (!elText.value) {
		alert("Input a text");
		elText.focus();
		return;
	}
	*/
	qrcode.makeCode(elText.value);
}

makeCode();

$("#text").
	on("blur", function () {
		makeCode();
	}).
	on("keydown", function (e) {
		if (e.keyCode == 13) {
			makeCode();
		}
	});
</script>
</body>
</html>