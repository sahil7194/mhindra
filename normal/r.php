`<?php 
			function update($invoice_number,$item_name,$username,$warehouse)
			{
				include 'config.php';
				$invoice_number;
				$item_name;
				$username;
				$warehouse;

				//select old values 
				$select_old_values="SELECT `id`, `ItemCode`, `ItemName`, `UOM`,`Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse'";
				$run_values=mysqli_query($conn,$select_old_values);
				while ($row_values=mysqli_fetch_array($run_values))
				{
					$fixed_item_qunatity=$row_values['FixedQuantity'];
					$fixed_perunit_value=$row_values['FixedValue'];
					$item_blace_qunatity=$row_values['Qauntity'];
					$item_issued_qunatity=$row_values['IssuedQuantity'];
					$item_value=$row_values['ItemValue'];
					$uom=$row_values['UOM'];
				}

				//values for update
				$total_value=$fixed_item_qunatity*$fixed_perunit_value;
				$update_issued_qunatiy=$item_issued_qunatity+$fixed_item_qunatity;
				$up_item_value=$item_value-$total_value;
				$up_item_qunatity=$item_blace_qunatity-$fixed_item_qunatity;
			
				//echo '<br> total value ';
				$total_value;
				//echo '<br> up issued qunatity ';
				$update_issued_qunatiy;
				//echo '<br> up item value ';
				$up_item_value;
				//echo '<br> up item  qunatity ';
				$up_item_qunatity;
				if ($up_item_value!="")
				 {
					$sql_insert="INSERT INTO `outward` (`id`, `invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `warehouse`, `UOM`, `CreateDate`) VALUES (NULL, '$invoice_number', '$item_name', '$fixed_item_qunatity', '$total_value', '', '$username', '$warehouse', '$uom', current_timestamp());";
					$run_insert=mysqli_query($conn,$sql_insert);
					if ($run_insert = true)
					{
						$sql_update="UPDATE `item` SET `Qauntity`='$up_item_qunatity',`IssuedQuantity`='$update_issued_qunatiy',`ItemValue`='$up_item_value' WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse'";
						$run_update=mysqli_query($conn,$sql_update);
						if ($run_update)
						 {
							
						}
					}
				}

			}	
	if (isset($_POST['submit']))
		{
			$invoice_number=$_POST['delivery_note_number'];
			$item_name=$_POST['item'];
			$item_quantity=$_POST['quantity'];
			$serial_number=$_POST['text'];
			if ($item_name=="HDPE PIPE") 
			{
				$select_old_for_hdp="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse'";
				$run_old_for_hdp=mysqli_query($conn,$select_old_for_hdp);
				while ($row_old_for_non_hdp=mysqli_fetch_array($run_old_for_hdp))
				{
					$old_fixed_value_1=$row_old_for_non_hdp['FixedValue'];
					$old_issued_qunatiy_1=$row_old_for_non_hdp['IssuedQuantity'];
					$old_value_1=$row_old_for_non_hdp['ItemValue'];
					$old_qunatity_1=$row_old_for_non_hdp['Qauntity'];
				}
				$total_value_for_insert=$item_quantity*$old_fixed_value_1;

					//values for update in item table
				$update_issued_qunatiy=$old_issued_qunatiy_1+$item_quantity;
				$update_qunatity=$old_qunatity_1-$item_quantity;
				$update_value=$old_value_1-$total_value_for_insert;
				if ($update_value!="")
				 {
					$sql_for_insert_hdp="INSERT INTO `outward` (`id`, `invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `warehouse`, `UOM`, `CreateDate`) VALUES (NULL, '$invoice_number', '$item_name', '$item_quantity', '$total_value_for_insert', '$serial_number', '$username', '$warehouse', '$uom', current_timestamp());";
					$run_for_insert_hdp=mysqli_query($conn,$sql_for_insert_hdp);
					if ($run_for_insert_hdp= true) 
					{
						$sql_for_update_hdp="UPDATE `item` SET `Qauntity`='$update_qunatity',`IssuedQuantity`='$update_issued_qunatiy',`ItemValue`='$update_value' WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse'";
						$sql_for_run_hdp_hdp=mysqli_query($conn,$sql_for_update_hdp);
						if ($sql_for_run_hdp_hdp == true)
						{
							$sql_get_item_name="SELECT `id`, `ItemCode`, `ItemName`, `UOM`,`Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `Sacnable`<>'yes' AND `warehouse`='$warehouse'";
								$run_sql_item_name=mysqli_query($conn,$sql_get_item_name);
								while ($row_item_name=mysqli_fetch_array($run_sql_item_name))
								{
									$it=$row_item_name['ItemName'];
									update($invoice_number,$it,$username,$warehouse);
								}
								echo "<script>alert('data save')</script>";
						}
					}
			}
			else
			{
				echo $item_name;
				echo $warehouse;
				//get old values form data base
				$select_old_for_non_hdp="SELECT* FROM `item` WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse'";
				$run_old_for_non_hdp=mysqli_query($conn,$select_old_for_non_hdp);
				while ($row_old_for_non_hdp=mysqli_fetch_array($run_old_for_non_hdp))
				{
					echo "old fixed value".$old_fixed_value=$row_old_for_non_hdp['FixedValue'];
					echo "old issued qunatity".$old_issued_qunatiy=$row_old_for_non_hdp['IssuedQuantity'];
					echo "old value".$old_value=$row_old_for_non_hdp['ItemValue'];
					echo "old qunatity".$old_qunatity=$row_old_for_non_hdp['Qauntity'];
				}
				echo "<br> total value".$total_value_for_insert=$item_quantity*$old_fixed_value;

					//values for update in item table
				echo "<br> Issued Quantity".$update_issued_qunatiy=$old_issued_qunatiy+$item_quantity;
				echo "<br> update qunatity".$update_qunatity=$old_qunatity-$item_quantity;
				echo "<br> update value ".$update_value=$old_value-$total_value_for_insert;
				/*
				if ($update_value!="")
				 {
					$sql_for_insert_oth_hdp="INSERT INTO `outward` (`id`, `invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `warehouse`, `UOM`, `CreateDate`) VALUES (NULL, '$invoice_number', '$item_name', '$item_quantity', '$total_value_for_insert', '$serial_number', '$username', '$warehouse', '$uom', current_timestamp());";
					/*$run_for_insert_oth_hdp=mysqli_query($conn,$select_old_for_non_hdp);
					if ($run_for_insert_oth_hdp= true) 
					{
						$sql_for_update_non_hdp="UPDATE `item` SET `Qauntity`='$update_qunatity',`IssuedQuantity`='$update_issued_qunatiy',`ItemValue`='$update_value' WHERE `ItemName`='$item_name` AND `warehouse`='$warehouse'";
						$sql_for_run_hdp_non_hdp=mysqli_query($conn,$sql_for_update_non_hdp);
						if ($sql_for_run_hdp_non_hdp == true)
						{
							echo "<script>alert('data save')</script>";
						}
					}
				}
				*/
			}
		}
	}
		 ?>