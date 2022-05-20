<?php
function update($invoice_number,$item_name,$username,$warehouse,$hp)
			{
				include 'config.php';
				echo "<br>".$invoice_number;
				echo "<br>".$item_name;
				echo "<br>".$username;
				echo "<br>".$warehouse;
				echo "<br>".$hp;

				//select old values 
				$select_old_values="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `HP`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse' AND `HP`='$hp'";
				$run_values=mysqli_query($conn,$select_old_values);
				while ($row_values=mysqli_fetch_array($run_values))
				{
					echo "<br> fixed item qunatity ".$fixed_item_qunatity=$row_values['FixedQuantity'];
					echo "<br> fiexed item per unit".$fixed_perunit_value=$row_values['FixedValue'];
					echo "<br> item blace qunatity".$item_blace_qunatity=$row_values['Qauntity'];
					echo "<br> item issued qunatity ".$item_issued_qunatity=$row_values['IssuedQuantity'];
					echo "<br> item value".$item_value=$row_values['ItemValue'];
					echo "<br> uom".$uom=$row_values['UOM'];
				}

				//values for update
				$total_value=$fixed_item_qunatity*$fixed_perunit_value;
				$update_issued_qunatiy=$item_issued_qunatity+$fixed_item_qunatity;
				$up_item_value=$item_value-$total_value;
				$up_item_qunatity=$item_blace_qunatity-$fixed_item_qunatity;
				echo "<br>";
				echo '<br> total value ';
				echo $total_value;
				echo '<br> up issued qunatity ';
				echo $update_issued_qunatiy;
				echo '<br> up item value ';
				echo $up_item_value;
				echo '<br> up item  qunatity ';
				echo $up_item_qunatity;
				if ($up_item_value!="")
				 {
					$sql_insert="INSERT INTO `outward` (`id`, `invoiceNumber`, `ItemName`, `Quantity`, `Value`, `serialNumber`, `WorkDoneBy`, `warehouse`, `UOM`, `CreateDate`) VALUES (NULL, '$invoice_number', '$item_name', '$fixed_item_qunatity', '$total_value', '', '$username', '$warehouse', '$uom', current_timestamp());";
					$run_insert=mysqli_query($conn,$sql_insert);
					if ($run_insert = true)
					{
						$sql_update="UPDATE `item` SET `Qauntity`='$up_item_qunatity',`IssuedQuantity`='$update_issued_qunatiy',`ItemValue`='$up_item_value' WHERE `ItemName`='$item_name' AND `warehouse`='$warehouse' AND `HP`='$hp'";
						$run_update=mysqli_query($conn,$sql_update);
						if ($run_update)
						 {
							echo "<br>data save<br>";
						}
					}
				}

			}
			update('in002','PP Rope 14 MM Dia with crimp clamp','RAKESH EMP','POLESTAR','3');
			include 'config.php';
			echo "<br>".$warehouse='POLESTAR';
				echo "<br>".$hp='3';

			$sql_get_item_name="SELECT `id`, `ItemCode`, `ItemName`, `UOM`, `HP`, `Note`, `Qauntity`, `DamageQuantity`, `warehouse`, `Sacnable`, `IssuedQuantity`, `RecivedQuantity`, `FixedQuantity`, `FixedValue`, `ItemValue` FROM `item` WHERE `Sacnable`<>'yes' AND `warehouse`='$warehouse' AND `HP`='$hp'";
			$run_sql_item_name=mysqli_query($conn,$sql_get_item_name);
			while ($row_item_name=mysqli_fetch_array($run_sql_item_name))
			{
				$item_name=$row_item_name['ItemName'];
			}
			
		?>