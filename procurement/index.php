<?php
	session_start();
	include 'config.php';
	
	$username=$_SESSION['user'];
	$password=$_SESSION['pass'];
	$role="procurement";
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
	<title>Procurement Home</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/super_index.css">
	<style type="text/css">
		.controle-section,.working-section
		{
			height: 575px;
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
					<section>
						<a href="index.php">Home</a>
					</section>
					<section>
						<a href="manage_vendor.php">Vendor</a>
					</section>
					<section>
						<a href="manage_lr.php">LR</a>
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
				<h1>home page</h1>
			</span>	
		</div>
	</div>
	<div class="bottom-section">
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>