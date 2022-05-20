<?php 
//echo "function for changes in non scanable material<br>";

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
materialupdate('IN00050','MODULE MOUNTING STRUCTURE for 3 HP Water Pump','1','POLESTAR','user1');
 ?>