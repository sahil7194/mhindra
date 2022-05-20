<?php
	session_start();
	include 'config.php';
	$nd= $_GET['id'];

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
	$warehous=$_GET['warehoue'];  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Details Outward</title>
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/jquery.min.js"></script>
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/qrcode.js"></script>
	<style type="text/css">
		body
		{
			font-size: 12px;
		}
		img	
		{
			height: 100px;
			width: 210px;
		}
	</style>
</head>
<body>
	<?php 

		$invoice_number=$_GET['id'];
	 ?>
<table border="1" width="900px" height="500px">
	<tr>
		<td width="200px" height="100px">
			<img src="http://localhost/Current%20Project/mahindra/imgs/oldlogo.png">
		</td>
		<td width="550px" height="100px" style="padding-left:20px;">
			<br>
			<b style="font-size:20px; padding-left: 20px; margin-bottom:10px;"><?php echo $company_name;?></b><br>
			4th Floor,Technosoft Knowledge Gateway, Plot No B-14,<br>
			Road No. 01 Wagale Industrial Estate, Near Mulund Check Naka,<br>
			Thane West 400604, Maharashtra
		</td>
		<td width="230px" height="100px">
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
						<b>From:</b>
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
					<?php 
					$get_invoice=$_GET['id'];
						$select_info="SELECT `id`, `InvoiceNumber`, `BeneficiaryId`, `Division_Name`, `Circle`, `Power`, `PumpLoad`, `watersource`, `BeneficiaryName`, `BeneficiaryMobileNumber`, `SuplierName`, `SupplierMobileNumber`, `SRN`, `SRMN`, `WorkAssignTo`, `WorkStatus`, `CreatedDate`, `warehouse`, `VechicalNo`, `Aadhar_NO`, `SupDoc`, `Category`, `Work_Order_No`, `Invoice_Date`, `CONTRACT_NO`, `DC_Date`, `CreatedBy` FROM `invoice` WHERE `InvoiceNumber`='$get_invoice'";
						$run_info=mysqli_query($conn,$select_info);
						//echo $count=mysqli_num_rows($run_info);
						while ($row_gh=mysqli_fetch_array($run_info)) 
						{?>


				<table>
				<tr>
					<td>
						<b>Consignee</b>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo  $row_gh['BeneficiaryName'];?>
					</td>
				</tr>
				<tr>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						Mobile Number :- <?php echo  $row_gh['BeneficiaryMobileNumber'];?>
					</td>
				</tr>				
						
			</table>
				</td>
				<td width="300px" height="100px">
					<table>
				<tr>
					<td>
						Dc Number:- <input id="text" type="text" value="<?php echo $get_invoice;?>" style="border: none; width: 150px;" readonly>
					</td>
				</tr>
				<tr>
					<td>
						Dc Date:- <?php echo  $row_gh['DC_Date'];?>
					</td>
				</tr>
				<tr>
					<td>
						Invoice Date:-<?php echo  $row_gh['Invoice_Date'];?>
					</td>
					<td>
						Invoice No:-<?php echo  $row_gh['Work_Order_No'];?>
					</td>
				</tr>
				<tr>
					<td>
						Contract No :-<?php echo  $row_gh['CONTRACT_NO'];?>
					</td>
				</tr>
			</table>
			
				</td>
			</tr>
		</table>
		</td>		
	</tr>
	<tr>
		<td colspan="3" width="900px" height="30px">
			<table border="1" width="100%" height="100%">
				<tr>
					<td width="260px">
						Registration ID/Pump Set Capacity
					</td>
					<td>
						<?php echo  $row_gh['BeneficiaryId'];?>
					</td>
					<td width="80px">
						Pump Power
					</td>
					<td width="80px">
						<?php echo  $row_gh['Power'];?>
					</td>

					<td width="100px">
						Water Source
					</td>
					<td width="100px">
						<?php echo  $row_gh['watersource'];?>
						<?php
							
						}
						
							?>
					</td>
				</tr>
			</table>
		</td>
		</tr>
	<tr>
		<td colspan="3">
			<table border="1" width="100%">
				<tr>
					<td width="60px">
						Sr.NO
					</td>
					<td>
						Description
					</td>
					<td>
						Serial Number
					</td>
					<td width="100px">
						Qty
					</td>
				</tr>
				<?php 
				error_reporting('0');
						$select_item_list="SELECT `id`, `invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `warehouse`, `CreateDate` FROM `outward` WHERE `invoiceNumber`='$invoice_number'";
						$run_select_item_list=mysqli_query($conn,$select_item_list);
						while ($row_item_list=mysqli_fetch_array($run_select_item_list))
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
									<?php echo $row_item_list['serialNumber']; ?>
								</td>
								<td>
									<?php echo $row_item_list['Quantity']; ?>
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
			<table width="100%" border="1">
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
			<table width="100%">
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
	width : 100,
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