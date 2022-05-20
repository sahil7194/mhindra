<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Check Box input</title>
</head>
<body>
<h1>  check box multiple input</h1>
<form action="" method="post">
	<?php 
		include 'config.php';
		$sql_select_non_scanable_item="SELECT * FROM `item` WHERE `Sacnable`<>'Y' AND `warehouse`='POLESTAR'";
		$run_non_scanable_item=mysqli_query($conn,$sql_select_non_scanable_item);
		$tabel_item="<table border=1>
	<tr>
		<th>
			
		</th>
		<th>
			Item Name
		</th>
		<th>
			Qunatity
		</th>
	</tr>";
		while($row_item_tabel=mysqli_fetch_array($run_non_scanable_item))
		{
			$tabel_item.="<tr><td><input type=checkbox name=ItName[] value=".$row_item_tabel['ItemCode']."></td><td>".$row_item_tabel['ItemName']."</td><td><input type=text name=NonQunatity[] placeholder=Qunatity> </td></tr>";
		}
		$tabel_item.="</tabel>";
		echo $tabel_item;
	 ?>
	<input type="submit" name="submit" value="submit">
</form>
<?php 

	if (isset($_POST['submit']))
	{
		$material_name=$_POST['ItName'];
		$non_scanq=$_POST['NonQunatity'];
		$result = array_filter($non_scanq); 
		$quna=array();

		foreach ($result as $key) 
			{
				echo $key;
				array_push($quna, $key);

			}
	}
 ?>
</body>
</html>
