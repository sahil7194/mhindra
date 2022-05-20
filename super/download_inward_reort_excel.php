<?php 
	include 'config.php';
 	$select="SELECT `id`, `InvoiceNumber`, `ItemName`, `SerialNumber`, `CreateDate`, `WorkDoneBy` FROM `temp_inward` ORDER BY `CreateDate` DESC";
 	$row = mysqli_query($conn, $select);
 	$table ="<table width=500px>
 				<tr>
 				<th>Invoice Number</th>
 				<th>Item Name</th>
 				<th> Serial Number</th>
 				<th>Wrok Done By </th>
 				<th>Date</th>
 				</tr>";
 	while ($run = mysqli_fetch_assoc($row)) 
 	{
 		$table.="<tr><td>".$run['InvoiceNumber']."</td><td>".$run['ItemName']."</td><td>".$run['SerialNumber']."</td><td>".$run['WorkDoneBy']."</td><td>".$run['CreateDate']."</td></tr>";
 	}
 	$table.="</table>";
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=inward_report.xls');
 	echo $table;
 ?>