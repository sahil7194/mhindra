 <?php
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role=$_SESSION['role'];
	$warehouse=$_SESSION['warehouse'];
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
	<title>Damage</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/su_index.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/normal_all_form.css">
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/adapter.min.js"></script>
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/instascan.min.js"></script>
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/vue.min.js"></script>
	<script type="text/javascript">
		function uppercase()
		 {
		    var txt = document.getElementById("name");
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
			<div class="working-space">
				<div class="form-title">
					Damage
				</div>
				<form action="" method="post">
					<table class="table1">
				   	<tr>
							<td>
								<label>
									Invoice Number
								</label>
							</td>
							<td>
								<?php 
									error_reporting('0');
									$in=$_GET['invoicenumber'];
									$invoice="";
									if ($in!="")
									{
										$invoice=$in;
									}
									else
									{
										$invoice="";
									}
								 ?>
								<input id="name" type="text" list="invoicelist" name="delivery_note_number" placeholder="Invoice Number" value="<?php echo $invoice;?>" onkeyup="uppercase()">
							</td>
						</tr>
						<tr>
							<td>
								<label>Select Item</label>	
							</td>
							<td>
							 	<select name="item" style="height: 35px; margin-bottom:10px;">
									<option>-- Select Item --</option>
									<?php 
										$select_item_name="SELECT `ItemName`FROM `item` WHERE `warehouse`='$warehouse'";
										$run_item_name=mysqli_query($conn,$select_item_name);
										 $count_item = mysqli_num_rows($run_item_name);
										 while ($row_item=mysqli_fetch_assoc($run_item_name))
										 {
											?>
											<option value="<?php echo $row_item['ItemName'] ?>"><?php echo $row_item['ItemName']; ?></option>
									<?php
										}
									 ?>
								</select>	
							</td>
						</tr>
						<tr>
							<td>
								<label>
									Quantity
								</label>
							</td>
							<td>
								<input type="text" name="quantity" placeholder="Quantity">		
							</td>
						</tr>
						<tr>
							<td>
							 	<label>
							 		Serial Number
							 	</label>
							</td>
							<td>
								<input type="text" name="text" id="text" readonly="" placeholder="Serial Number">
							</td>
						</tr>
						
					</table>
					<table class="table2">
						<tr>
							<td>
								<div style=" height: 250px; width: 350px;">
									<video id="preview" style="height: 250px;  width: 350px;"></video>
								</div>
							</td>
						</tr>
					</table>
					<script>
									 let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
							           Instascan.Camera.getCameras().then(function(cameras){
							               if(cameras.length > 0 ){
							                   scanner.start(cameras[0]);
							               } else{
							                   alert('No cameras found');
							               }

							           }).catch(function(e) {
							               console.error(e);
							           });

							           scanner.addListener('scan',function(c){
							               document.getElementById('text').value=c;
							           });
						</script>
				<div class="buton-area">
					<input type="reset" name="reset" value="Reset">
					<input type="submit" name="save" value="Submit">
				</div>
			</form>
			</div>

	</div>
	<?php 
	if (isset($_POST['save']))
	{
		//echo "<br>delivery note number".
		$delivery_note_number=$_POST['delivery_note_number'];
		//echo "<br>item name".
		$item_name=$_POST['item'];
		//echo "<br>item qunatity".
		$item_qantity=$_POST['quantity'];
		//echo "<br>serial number".
		$serial_number=$_POST['text'];
		
		if ($delivery_note_number!="")
		{
			$sql_for_old_data="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `warehouse`='$warehouse' AND `ItemName`='$item_name'";
			$run_old_data=mysqli_query($conn,$sql_for_old_data);
			while ($row=mysqli_fetch_array($run_old_data))
			{
				//old value
				//echo "<br> average item value".
				$old_itemvalue=$row['FixedValue'];
				//echo "<br> old qunatity".$old_qunatity =$row['FixedQuantity'];
				//echo "<br> old damage qunatity".
				$old_damange=$row['DamageQuantity'];

				//for update				
				//echo "<br> blances item value".
				$current_item_value=$row['ItemValue'];
				//echo "<br> blances item qunatity".
				$current_item_qunatity=$row['Qauntity'];
			}
				$total=$item_qantity*$old_itemvalue;

				//updated value
				//echo "<br> update item value".
				$up_item_value=$current_item_value + $total;
				//update recevied materil
				//echo "<br> update item damage qunatity".
				$re_mater=$old_damange+$item_qantity;
				//update damage qunatity
				//echo "value update damage qunatity ".
				$damage=$old_damange+$item_qantity;
				//echo "value for update blances qunatity ".
				$up_blance_qunatity=$current_item_qunatity+$item_qantity;

				//echo "<br> sql for insert".
				$sql_query_for_insert="INSERT INTO `damage_quantity` (`id`, `invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `warehouse`, `CreateDate`) VALUES (NULL, '$invoice_number', '$item_name', '$item_qantity', '$old_itemvalue', '$serial_number', '$username', '$warehouse', current_timestamp());";		
			
				$run_insert=mysqli_query($conn,$sql_query_for_insert);
				if ($run_insert == true) 
				{
					//echo "<br> sql for update".
					$sql_for_update ="UPDATE `item` SET `ItemValue`='$up_item_value',`DamageQuantity`='$re_mater',`Qauntity`='$up_blance_qunatity' WHERE `ItemName`= '$item_name'AND`warehouse`='$warehouse'";
					$run_update=mysqli_query($conn,$sql_for_update);
					if ($run_update ==true)
					 {
						echo "<script>alert('data save');</script>";
					}
				}
			
		}
	}
	 ?>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>