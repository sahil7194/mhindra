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

$id=$_GET['id'];
	$sql="SELECT `id`, `ItemCode`, `ItemName`, `Note`, `Qauntity` FROM `item` WHERE `id`='$id'";
	$run = mysqli_query($conn,$sql);
	
	while ($row=mysqli_fetch_array($run))
	{
		$table_data="Item Code:".$item_code=$row['ItemCode']."  Item Name".$item_name=$row['ItemName'];
	}
	 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Item Qr code</title>
 	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/jquery.min.js"></script>
	<script type="text/javascript" src="http://localhost/Current%20Project/mahindra/js/qrcode.js"></script>
 </head>
 <body>
 <input id="text" type="text"  value="<?php echo $table_data?>" style="border: none;" hidden="">
 <div id="qrcode" style="width:130px; height:130px; margin-left:150px; margin-top:50px;"></div>
 <script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 130,
	height : 130
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
<button onclick="window.print()" style="margin-top: 20px; margin-left: 170px;">Print QR</button>
 </body>
 </html>