 <?php
	function update($invoice_number,$item_name,$warehouse,$username)
{
include 'config.php';
$select_item_old_value="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse'";
                    $run_item_old_value=mysqli_query($conn,$select_item_old_value);
                    while ($row_item_old_value=mysqli_fetch_array($run_item_old_value))
                    {
                        //echo "<br> fixed value ".
                        $fixed_value=$row_item_old_value['FixedValue'];
                        //echo "<br> issued qunatity".
                        $issued_qunatity=$row_item_old_value['IssuedQuantity'];
                        //echo "<br> old blaced qunatity ".
                        $old_blance_qunatity=$row_item_old_value['Qauntity'];
                        //echo "<br> total blaced value ".
                        $old_blance_value=$row_item_old_value['ItemValue'];
                        //echo "<br> UOM ".
                        $uom=$row_item_old_value['UOM'];
                        $item_quantity=$row_item_old_value['FixedQuantity'];
                    }
                    //total value for insert
                    //echo "<br> total value for insert"
                    $total_value_for_insert=$fixed_value*$item_quantity;

                    //values for update
                    //echo "<br> up issued qunatity"
                    $up_issued_qunatity=$issued_qunatity+$item_quantity;
                    //echo "<br> up blaced qunatity"
                    $up_blaced_qunatity=$old_blance_qunatity-$item_quantity;
                    //echo "<br> up value"
                    $up_blace_value=$old_blance_value-$total_value_for_insert;
                    if ($up_blace_value!=""&&$up_issued_qunatity!="")
                    {
                        $sql_for_insert="INSERT INTO `outward`(`invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `warehouse`, `UOM`) VALUES ('$invoice_number','$item_name','$item_quantity','$total_value_for_insert','','$username','$warehouse','$uom')";
                        $run_for_insert=mysqli_query($conn,$sql_for_insert);
                        if ($run_for_insert==true) 
                        {
                            $sql_for_update="UPDATE `item` SET `Qauntity`='$up_blaced_qunatity',`IssuedQuantity`='$up_issued_qunatity',`ItemValue`='$up_blace_value' WHERE `warehouse`='$warehouse' AND `ItemName`='$item_name'";
                            $run_for_update=mysqli_query($conn,$sql_for_update);
                            if ($run_for_update==true) 
                            {
                                //echo "<script>alert('Data Save');</script>";
                            }
                        }
    }
}

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
	<title>Outward</title>
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
					Outward
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
										$select_item_name="SELECT * FROM `item` WHERE `Sacnable`<>'no' AND `warehouse`='$warehouse'";
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
					<input type="submit" name="submit" value="Submit">
				</div>
			</form>
			</div>

	</div>
	<?php 
		if (isset($_POST['submit']))
		{
			//echo "<br> invoice number ".
			$invoice_number=$_POST['delivery_note_number'];
			//echo "<br> item name".
			$item_name=$_POST['item'];
			//echo "<br> item qunatity".
			$item_quantity=$_POST['quantity'];
			//echo "<br> item serial number".
			$serial_number=$_POST['text'];
			if ($item_name=='HDPE PIPE')
			{
				$select_item_old_value_1="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse'";
                    $run_item_old_value_1=mysqli_query($conn,$select_item_old_value_1);
                    while ($row_item_old_value_1=mysqli_fetch_array($run_item_old_value_1))
                    {
                        //echo "<br> fixed value ".
                        $fixed_value_1=$row_item_old_value_1['FixedValue'];
                        //echo "<br> issued qunatity".
                        $issued_qunatity_1=$row_item_old_value_1['IssuedQuantity'];
                        //echo "<br> old blaced qunatity ".
                        $old_blance_qunatity_1=$row_item_old_value_1['Qauntity'];
                        //echo "<br> old blaced value ".
                        $old_blance_value_1=$row_item_old_value_1['ItemValue'];
                        //echo "<br> UOM ".
                        $uom_1=$row_item_old_value_1['UOM'];
                    }
                    //total value for insert
                    //echo "<br> total value for insert".
                    $total_value_for_insert_1=$fixed_value_1*$item_quantity;

                    //values for update
                    //echo "<br> up issued qunatity".
                    $up_issued_qunatity_1=$issued_qunatity_1+$item_quantity;
                    //echo "<br> up blaced qunatity".
                    $up_blaced_qunatity_1=$old_blance_qunatity_1-$item_quantity;
                    //echo "<br> up value".
                    $up_blace_value_1=$old_blance_value_1-$total_value_for_insert_1;
                    if ($up_blace_value_1!=""&&$up_issued_qunatity_1!="")
                    {
                    	 $sql_for_insert_1="INSERT INTO `outward`(`invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `warehouse`, `UOM`) VALUES ('$invoice_number','$item_name','$item_quantity','$total_value_for_insert_1','','$username','$warehouse','$uom')";
                        $run_for_insert_1=mysqli_query($conn,$sql_for_insert_1);
                        if ($run_for_insert_1==true)
                         {
                        	$sql_for_update_1="UPDATE `item` SET `Qauntity`='$up_blaced_qunatity_1',`IssuedQuantity`='$up_issued_qunatity_1',`ItemValue`='$up_blace_value_1' WHERE `warehouse`='$warehouse' AND `ItemName`='$item_name'";
                            $run_for_update_1=mysqli_query($conn,$sql_for_update_1);
                            if ($run_for_update_1==true)
                            {
                            	$sql_for_non="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `warehouse`='POLESTAR' AND `Sacnable`<>'yes'";
						        $run_sql_non=mysqli_query($conn,$sql_for_non);
						        while($row_non=mysqli_fetch_array($run_sql_non))
						        {
						            $it=$row_non['ItemName'];
						            update($invoice_number,$it,$warehouse,$username);
						        }
						        echo "<script>alert('Data Save');</script>";
                            }
                        }
                    }	
			}
			else
			{
				$select_item_old_value_1="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse'";
                    $run_item_old_value_1=mysqli_query($conn,$select_item_old_value_1);
                    while ($row_item_old_value_1=mysqli_fetch_array($run_item_old_value_1))
                    {
                        //echo "<br> fixed value ".
                        $fixed_value_1=$row_item_old_value_1['FixedValue'];
                        //echo "<br> issued qunatity".
                        $issued_qunatity_1=$row_item_old_value_1['IssuedQuantity'];
                        //echo "<br> old blaced qunatity ".
                        $old_blance_qunatity_1=$row_item_old_value_1['Qauntity'];
                        //echo "<br> old blaced value ".
                        $old_blance_value_1=$row_item_old_value_1['ItemValue'];
                        //echo "<br> UOM ".
                        $uom_1=$row_item_old_value_1['UOM'];
                    }
                    //total value for insert
                    //echo "<br> total value for insert".
                    $total_value_for_insert_1=$fixed_value_1*$item_quantity;

                    //values for update
                    //echo "<br> up issued qunatity".
                    $up_issued_qunatity_1=$issued_qunatity_1+$item_quantity;
                    //echo "<br> up blaced qunatity".
                    $up_blaced_qunatity_1=$old_blance_qunatity_1-$item_quantity;
                    //echo "<br> up value".
                    $up_blace_value_1=$old_blance_value_1-$total_value_for_insert_1;
                    if ($up_blace_value_1!=""&&$up_issued_qunatity_1!="")
                    {
                    	 $sql_for_insert_1="INSERT INTO `outward`(`invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `warehouse`, `UOM`) VALUES ('$invoice_number','$item_name','$item_quantity','$total_value_for_insert_1','$serial_number','$username','$warehouse','$uom')";
                        $run_for_insert_1=mysqli_query($conn,$sql_for_insert_1);
                        if ($run_for_insert_1==true)
                         {
                        	$sql_for_update_1="UPDATE `item` SET `Qauntity`='$up_blaced_qunatity_1',`IssuedQuantity`='$up_issued_qunatity_1',`ItemValue`='$up_blace_value_1' WHERE `warehouse`='$warehouse' AND `ItemName`='$item_name'";
                            $run_for_update_1=mysqli_query($conn,$sql_for_update_1);
                            if ($run_for_update_1==true)
                            {
						        echo "<script>alert('Data Save');</script>";
                            }
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