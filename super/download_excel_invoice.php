	<?php 
 error_reporting('0');
	$conn = mysqli_connect("localhost","root","","mahindra_susten");
	$fil_power=$_GET['power'];

$table_data="<table width=2000px>
					<tr>
						<th>							
							Invoice Number
						</th>
						<th>
							Beneficiary Id	
						</th>
						<th>
							Beneficiary Name
						</th>
						<th>
							Beneficiary Mobile Number
						</th>
						<th>
							Circle
						</th>
						<th>
							State
						</th>
						<th>
							Power
						</th>
						<th>
							Pump Load
						</th>
						<th>
							Installer Name	
						</th>
						<th>
							Installer Mobile Number	
						</th>
						<th>
							Installer's Receiver's Name
						</th>
						<th>
							Installer's Receiver's Mobile Number		
						</th>
						<th>
							Vehicle Number
						</th>
						<th>
							Work Assign to	
						</th>
						<th>
							Work Status
						</th>
						<th>
							Date & Time
						</th>
						<th>
							Action
						</th>
					</tr>";
						
						$get_invoice="";
						if ($fil_power!="") 
						{
							$get_invoice="SELECT `id`, `InvoiceNumber`, `BeneficiaryId`, `BeneficiaryName`, `BeneficiaryMobileNumber`, `Circle`, `Power`, `PumpLoad`,`SuplierName`, `SupplierMobileNumber`, `SRN`, `SRMN`, `WorkAssignTo`, `WorkStatus`, `CreatedDate` FROM `invoice` WHERE `Power`='$fil_power' ORDER BY `invoice`.`CreatedDate` DESC";
						}
						else
						{
							$get_invoice="SELECT `id`, `InvoiceNumber`, `BeneficiaryId`, `BeneficiaryName`, `BeneficiaryMobileNumber`, `Circle`, `Power`, `PumpLoad`,`SuplierName`, `SupplierMobileNumber`, `SRN`, `SRMN`, `WorkAssignTo`, `WorkStatus`, `CreatedDate` FROM `invoice` ORDER BY `invoice`.`CreatedDate` DESC";						}
						
						$run_invoice = mysqli_query($conn,$get_invoice);

						while ($invoice_data=mysqli_fetch_assoc($run_invoice))
						{
						
							$table_data.="<tr><td>".								
							 $invoice_data['InvoiceNumber']."</td><td>".$invoice_data['BeneficiaryId']."</td><td>".$invoice_data['BeneficiaryName']."</td><td>".$invoice_data['BeneficiaryMobileNumber']."</td><td>".$invoice_data['Circle']."</td><td>".		$invoice_data['Power']."</td><td>".$invoice_data['PumpLoad']."</td>	<td>".$invoice_data['SuplierName']."</td><td>".$invoice_data['SupplierMobileNumber']."</td><td>".$invoice_data['SRN']."</td><td>".$invoice_data['SRMN']."</td><td>".$invoice_data['WorkAssignTo']."</td><td>".$invoice_data['WorkStatus']."</td><td>".$invoice_data['CreatedDate']."</td></tr> ";
						}

	$table_data.="</table>";
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=Outward List.xls');
 	echo $table_data;
?>