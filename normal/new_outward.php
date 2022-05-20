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
  <?php 	
  	// function section 
  		function materialupdate($invoice_number,$material_name,$qunatity,$warehouse,$username)
 {

    include 'config.php';

    //echo "<br> Invoice number :-"
    $invoice_number;
    //echo "<br> material name :-"
    $material_name;
    //echo "<br> Current qunatity :-"
    $qunatity;
    //echo "<br> warehouse :-"
    $warehouse;
    //username
    $username;

    //fetch old values form database
    $sql_for_get_old_data="SELECT `UOM`, `Qauntity`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `ItemName`='$material_name' AND `warehouse`='$warehouse';";
    $run_for_get_old_data=mysqli_query($conn,$sql_for_get_old_data);
    while ($row_for_get_old_data=mysqli_fetch_array($run_for_get_old_data))
    {
        //echo "<br>average value :- ";
        $average_value=$row_for_get_old_data['FixedValue'];
        //echo "<br>issued qunatity :- ";
        $issued_qunatity=$row_for_get_old_data['IssuedQuantity'];
        //echo "<br>blances qunatity :- ";
        $blances_qunatity=$row_for_get_old_data['Qauntity'];
        //echo "<br>blances value :- ";
        $blances_value=$row_for_get_old_data['ItemValue'];
        //echo "<br> UOM :- ";
        $uom=$row_for_get_old_data['UOM'];
    }

    //values for insert
   //echo "<br> total value :- ";
   $total_value=$average_value*$qunatity;

   //values for update
  //echo "<br>new blance qunatity :- ";
      $new_qunatity=$blances_qunatity-$qunatity;
   //echo "<br>new issued qunatity :- ";
      $new_issued_qunatity=$issued_qunatity+$qunatity;
  // echo "<br>new value :- ";
      $new_value=$blances_value-$total_value;


  // echo "<br>sql for insert :- ";
    $sql_for_insert="INSERT INTO `outward` (`id`, `invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `warehouse`, `UOM`, `CreateDate`) VALUES (NULL, '$invoice_number', '$material_name', '$qunatity', '$average_value', '', '$username', '$warehouse', '$uom', current_timestamp())";
   $run_for_insert=mysqli_query($conn,$sql_for_insert);
   if ($run_for_insert == true)
   {
       $sql_for_update="UPDATE `item` SET `Qauntity`='$new_qunatity',`IssuedQuantity`='$new_issued_qunatity',`ItemValue`='$new_value' WHERE `ItemName`='$material_name' AND `warehouse`='$warehouse';";
            $run_update=mysqli_query($conn,$sql_for_update);
     if ($run_update == true)
      {
        
         //echo  "Data Save";
      } 
      else
      {
         //echo "not ok";
      }
      
   }
   
 }
  //end function section
   ?>
<!DOCTYPE html>
<html>
<head>
	<title> Outward </title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/su_index.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/normal_all_form.css">
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/adapter.min.js"></script>
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/instascan.min.js"></script>
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/vue.min.js"></script>
	<style type="text/css">
		.controle-section,.working-section
		{
			height: 1150px;
		}
		#output
		{
			width: 820px;
			padding-left: 100px;
			
		}
		#nonscan
		{
			width: 820px;
		}
		#qt
		{
			width: 100px;
			height: 20px;
		}
		#output td,th
		{
			padding-left: 10px;
			padding-top: 5px;
			padding-bottom: 5px;
			padding-right: 10px;
		}
		#output #itname
		{
			width: 450px;
		}
		#output th
		{
			font-size: 20px;
		}
		#output input[type='checkbox']
		{
			height: 23px;
			width: 23px;
		}
		#output input[type='number']
		{
			width: 90px;
			height: 25px;
			font-size: 20px;
			padding-left: 10px;
		}
	</style>
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
							 	<select id="item" name="item" style="height: 35px; margin-bottom:10px;" onchange="option()">
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
								<div id="output">
									
								</div>
								<script type="text/javascript">
									function option()
									{
										var a = document.getElementById('item').value;
										if (a=='HDPE PIPE')
										 {
										 	var b='<table><tr><th></th><th>Item Name</th><th>Qunatity</th><th>UOM</th></tr><?php 
										 		$sql_select_non_scanable_item="SELECT * FROM `item` WHERE `Sacnable`<>'Y' AND `warehouse`='POLESTAR'";
												$run_non_scanable_item=mysqli_query($conn,$sql_select_non_scanable_item);
												//$count=mysqli_num_rows($run_non_scanable_item);
												while($row_tabel_data=mysqli_fetch_array($run_non_scanable_item))
												{
									
											
										 	?> <tr><td><input type="checkbox" name="CheckItem[]" value="<?php echo $row_tabel_data['ItemName'];?>"></td><td id="itname"><?php echo $row_tabel_data['ItemName'];?></td><td><input type="number" name=CheckQunatity[] placeholder="Qunatity"></td><td><?php echo $row_tabel_data['UOM'];?></td></tr><?php }?></tabel>';
										 }
										 else
										 {
										 	var b='';
										 }
	
										document.getElementById('output').innerHTML = b;
									}
								</script>
				<div class="buton-area">
					<input type="reset" name="reset" value="Reset">
					<input type="submit" name="save" value="Submit">
				</div>
			</form>
			</div>
			<?php
			if (isset($_POST['save']))
			{
				// get data for all material 
				//echo "<br>Invoice number :- ".
				$invoice_number=$_POST['delivery_note_number'];
				//echo "<br>Item Name :- ".
				$item_name=$_POST['item'];
				//echo "<br>Quantiy  :- ".
				$qunatity=$_POST['quantity'];
				//echo "<br> Serial Number :- ".
				$serial_number=$_POST['text'];
				if ($item_name=='HDPE PIPE')
				 {

				 	// get old values for main material 
				 	$sql_for_get_old_data="SELECT `UOM`, `Qauntity`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse';";
				    $run_for_get_old_data=mysqli_query($conn,$sql_for_get_old_data);
				    while ($row_for_get_old_data=mysqli_fetch_array($run_for_get_old_data))
				    {
				        //echo "<br>average value :- ";
				         $average_value=$row_for_get_old_data['FixedValue'];
				        //echo "<br>issued qunatity :- ";
				         $issued_qunatity=$row_for_get_old_data['IssuedQuantity'];
				        //echo "<br>blances qunatity :- ";
				         $blances_qunatity=$row_for_get_old_data['Qauntity'];
				        //echo "<br>blances value :- ";
				         $blances_value=$row_for_get_old_data['ItemValue'];
				        //echo "<br> UOM :- ";
				         $uom=$row_for_get_old_data['UOM'];
				    }

				    $total_value=$average_value*$qunatity;

					   //values for update
					  //echo "<br>new blance qunatity :- ";
					      $new_qunatity=$blances_qunatity-$qunatity;
					   //echo "<br>new issued qunatity :- ";
					      $new_issued_qunatity=$issued_qunatity+$qunatity;
					  // echo "<br>new value :- ";
					      $new_value=$blances_value-$total_value;
					   $sql_for_insert="INSERT INTO `outward` (`id`, `invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `warehouse`, `UOM`, `CreateDate`) VALUES (NULL, '$invoice_number', '$item_name', '$qunatity', '$average_value', '$serial_number', '$username', '$warehouse', '$uom', current_timestamp())";
   						$run_for_insert=mysqli_query($conn,$sql_for_insert);
   					if ($run_for_insert== true)
   					{
   						 $sql_for_update="UPDATE `item` SET `Qauntity`='$new_qunatity',`IssuedQuantity`='$new_issued_qunatity',`ItemValue`='$new_value' WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse';";
            			$run_update=mysqli_query($conn,$sql_for_update);
            			 if ($run_update == true) 
            			 {
            			 	//for non scanabel material 
					$non_scan_material_name=$_POST['CheckItem'];
					$non_scan_material_qunatity=$_POST['CheckQunatity'];

					//echo "<br>materil name for non scanable :- ";
					//print_r($non_scan_material_name);

					//echo "<br>materil qunatity for non scanable :- ";
					//print_r($non_scan_material_qunatity);

					//remove null value form array
					$result_non_qunatity=array_filter($non_scan_material_qunatity);

					//echo "<br>";
					//print_r($result_non_qunatity);

					//new array for save non scanble qunatity
					$newq=array();

					//add elment in sequance to new array
					foreach ($result_non_qunatity as $key) 
					{
						array_push($newq, $key);
					}
					//qauntity for non scanable material
					//echo "qunaity fo non scanable qunatiy :-";
					//print_r($newq);
					$count_1=count($non_scan_material_name);
					//use after update main
					for ($i=0; $i < $count_1; $i++)
					{ 
					  materialupdate($invoice_number,$non_scan_material_name[$i],$newq[$i],$warehouse,$username);

					}
            				echo "<script>alert('Data Save')</script>";            			}
   						 }
   					
				 	
				}
				else
				{
					// get old values for main material 
				 	$sql_for_get_old_data="SELECT `UOM`, `Qauntity`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse';";
				    $run_for_get_old_data=mysqli_query($conn,$sql_for_get_old_data);
				    while ($row_for_get_old_data=mysqli_fetch_array($run_for_get_old_data))
				    {
				        //echo "<br>average value :- ";
				         $average_value=$row_for_get_old_data['FixedValue'];
				        //echo "<br>issued qunatity :- ";
				         $issued_qunatity=$row_for_get_old_data['IssuedQuantity'];
				        //echo "<br>blances qunatity :- ";
				         $blances_qunatity=$row_for_get_old_data['Qauntity'];
				        //echo "<br>blances value :- ";
				         $blances_value=$row_for_get_old_data['ItemValue'];
				        //echo "<br> UOM :- ";
				         $uom=$row_for_get_old_data['UOM'];
				    }

				    $total_value=$average_value*$qunatity;

					   //values for update
					  //echo "<br>new blance qunatity :- ";
					      $new_qunatity=$blances_qunatity-$qunatity;
					   //echo "<br>new issued qunatity :- ";
					      $new_issued_qunatity=$issued_qunatity+$qunatity;
					  // echo "<br>new value :- ";
					      $new_value=$blances_value-$total_value;
					   $sql_for_insert="INSERT INTO `outward` (`id`, `invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `warehouse`, `UOM`, `CreateDate`) VALUES (NULL, '$invoice_number', '$item_name', '$qunatity', '$average_value', '$serial_number', '$username', '$warehouse', '$uom', current_timestamp())";
   						$run_for_insert=mysqli_query($conn,$sql_for_insert);
   					if ($run_for_insert== true)
   					{
   						 $sql_for_update="UPDATE `item` SET `Qauntity`='$new_qunatity',`IssuedQuantity`='$new_issued_qunatity',`ItemValue`='$new_value' WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse';";
            			$run_update=mysqli_query($conn,$sql_for_update);
            			 if ($run_update == true) 
            			 {
            				echo "<script>alert('Data Save')</script>";            			}
   						 }				}
			}
		 ?>
		</div>
		</div>
		
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>
