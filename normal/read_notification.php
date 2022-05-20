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
  <!DOCTYPE html>
<html>
<head>
	<title>Read Notification</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/su_index.css">
	<style type="text/css">
		.reading-area
		{
			/*border: 1px solid black;*/
			margin-left: 80px;
			margin-right: 20px;
		}
		table
		{
			line-height: 50px;
		}
		label
		{
			margin-left: 15px;
			font-size: 25px;
		}
		#read
		{
			margin-left:15px;
			
		}
		textarea
		{
			resize: none;
			height: 70px;
			width: 230px;
		}
		input[type='submit']
		{
			height: 30px;
			width: 70px;
			font-size: 20px;
			border: none;
			background-color: #18d418;
			margin-left: 160px;
		}
		input[type='submit']:hover
		{
			height: 30px;
			width: 70px;
			font-size: 20px;
			border: none;
			margin-left: 160px;
			background-color: #089408;
		}
	</style>
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
			<span>
				<div class="reading-area">
					<h1 style="text-align:center; font-size:40px;">Notification </h1>
					<table>
						<?php
						$id=$_GET['id']; 
							$s_query="SELECT `id`, `Sento`, `Title`, `Massage`, `Replay`, `CreateDate` FROM `notification` WHERE `id`='$id'";
							$run_lk=mysqli_query($conn,$s_query);
							while ($row_s=mysqli_fetch_array($run_lk)) 
							{
								$title=$row_s['Title'];
								$message=$row_s['Massage'];
						?>
						<tr>
							<td>
								<label>
									Title :- 
								</label> 
							</td>
							<td>
								<p id="read"><?php echo $title; ?></p>
							</td>
						</tr>
						<tr>
							<td>
								<label>
									Message :-
								</label> 
							</td>
							<td >
								<p id="read"><?php echo $message; ?></p>
							</td>
						</tr>
					<?php
						 }
					?>
						<tr>
							<td style="height: 60px;">
								<label>
									Reply :-
								</label> 
							</td>
							<td rowspan="2" style="padding-top:30px; padding-left: 20px;">
								<form action="" method="post">
								<textarea placeholder="write your replay" name="rep"></textarea><br>
								<input type="submit" name="send" value="send">
								</form>
							</td>
							<tr>
								<td>
									
								</td>
								<td>

								</td>
							</tr>
					</table>
					<button style="margin-left: 350px;">
						<a href="index.php">Back to home</a>
					</button>
				</div>
			</span>
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>
<?php 
	if (isset($_POST['send'])) 
	{
		$rep=$_POST['rep'];
		$update="UPDATE `notification` SET `Replay` = 'ok' WHERE `notification`.`id` = '$id';";
		$run=mysqli_query($conn,$update);
		if ($run == true) 
		{
			echo "<script>alert('Message Sent');</script>";
		}
	}
 ?>