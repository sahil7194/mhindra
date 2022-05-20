<?php 

	include 'config.php';
$excel_data =" <!DOCTYPE html><html>
										 <head>
										 	<title></title>
										 </head>
										 <body>
										 <table>
										 	<tr>
										 		<th>
										 			Item code
										 		</th>
										 		<th>
										 			Item Name
										 		</th>
										 		<th>
										 			Note
										 		</th>
										 	</tr>";
$select_query="SELECT `id`, `ItemCode`, `ItemName`, `Note`, `Qauntity` FROM `item` ORDER BY `item`.`ItemCode` ASC";
$run = mysqli_query($conn,$select_query);
						
while ($row_excel = mysqli_fetch_assoc($run)) 
{
	$excel_data.='<tr><td>'.$row_excel["ItemCode"].'</td><td>'.$row_excel["ItemName"].'</td><td>'.$row_excel["Note"].'</td></tr>';
}

$excel_data.="</table>
			</body>
			</html";
require 'vendor/autoload.php';
						use Dompdf\Dompdf;

						$dompdf= new Dompdf();

$dompdf->loadHtml($excel_data);

$dompdf->setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream("Item report",array("Attachment"=>1));
 ?>