<?php
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role=$_SESSION['role'];
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
	include 'config.php';
$Invoice_number=$_GET['id'];
 ?><!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/jquery.min.js"></script>
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/qrcode.js"></script>
	<title>Procurement Request Details</title>
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
			<b>Procurement Request Details</b>
		</td>
	</tr>
	<tr>
		<td colspan="3" style="height:4px;">

		</td>
	</tr>
	<tr>
		<td colspan="3">
			<table border="1">
				<tr>
					<th style="width: 50px;">
						Sr.No
					</th>
					<th style="width: 220px;">
						Item Code
					</th>
					<th style="width: 460px;">
						Item Name
					</th>
					<th style="width: 80px;">
						UOM
					</th>
					<th style="width: 80px;">
						Quantity
					</th>
				</tr>
				<?php
				error_reporting('0'); 
					$select_data="SELECT `id`, `ProcumentID`, `ItemCode`, `ItemName`, `UOM`, `Qunatity`, `CreatedDate` FROM `bom` WHERE `ProcumentID`='$Invoice_number'";
					$run_data=mysqli_query($conn,$select_data);
					while ($row=mysqli_fetch_array($run_data))
					{
						$counter=$counter+1;
						?>
						<tr>
							<td>
								<?php echo $counter; ?>
							</td>
							<td>
								<?php echo $row['ItemCode']; ?>
							</td>
							<td>
								<?php echo $row['ItemName']; ?>
							</td>
							<td>
								<?php echo $row['UOM']; ?>
							</td>
							<td>
								<?php echo $row['Qunatity']; ?>
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
						<table width="100%" align="center" style="text-align:center;">
				<tr>
					<td>
						Authorised Signatory
					</td>
				</tr>
				<tr>
					<td>
						For Mahindra Susten Private Limited
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
 <input id="text" type="text"  value="<?php echo $Invoice_number?>" style="border: none;" hidden="">
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
<div style="margin-left: 410px; margin-top:50px;">
	<button onclick="window.print()" style="text-align: center;">Print</button>
</div>
</body>
</html>
