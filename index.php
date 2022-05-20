 <?php
 
	include 'config.php';

	$msg=""; 
if (isset($_POST['submit']))
 {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role     = $_POST['role'];

	if ($username !="" && $password !="") 
	 {
		$query = "SELECT `username`, `password`, `role` FROM `login_details` WHERE `username`='$username' AND`password` ='$password' AND `role`='$role'";
		$run = mysqli_query($conn, $query);

		$count = mysqli_num_rows($run);

		if ($count == 1)
		 {
		 	session_start();
		 	$select_warehouse="SELECT `id`, `FirstName`, `AddharCrad`, `Address`, `MobileNumber`, `Email`, `DateOfBirth`, `username`, `password`, `role`, `warehouse` FROM `login_details` WHERE `username`='$username' AND`password` ='$password' AND `role`='$role'";
		 	$run_ware=mysqli_query($conn,$select_warehouse);
		 	while ($row_warehouse=mysqli_fetch_array($run_ware)) 
		 	{
		 		$ware=$row_warehouse['warehouse'];
		 	}
		 	$_SESSION['user'] = $username;
		 	$_SESSION['pass'] = $password;
		 	$_SESSION['role'] = $role;
		 	$_SESSION['warehouse']= $ware;
		 	setcookie("username", $username,time()+3600,"/");
		 	setcookie("password", $password,time()+3600,"/");

			if ($role == "master")
			{
				header('Location: http://localhost/Current%20Project/mahindra/master/index.php');
			}
			elseif ($role =="super")
			 {
				header('Location: http://localhost/Current%20Project/mahindra/super/index.php');
			}
			elseif ($role =="procurement")
			 {
				header('Location: http://localhost/Current%20Project/mahindra/procurement/index.php');
			}
			elseif ($role =="quality")
			 {
				header('Location: http://localhost/Current%20Project/mahindra/quality/index.php');
			}
			else
			{
				header('Location: http://localhost/Current%20Project/mahindra/normal/index.php');
			}
		}
		else
		{
			$msg = "<font color='red'>Username or Password Worng</font>";
		}
	}
	else
	{
		$msg = "<font color='red'>All Field Required</font>";
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/structure_page.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Current Project/mahindra/css/main_index_page.css">
    <style type="text/css">
    .logo
    {
    	margin-left: 0px;
    	height: 120px;
    	float: left;
    }	
    input[type='submit'] 
    {
    	background-color: #f39021;
    	color: #fff;   
    }
     input[type='submit']:hover
    {
    	background-color: #e51c38;
    	color: #fff;   
    }
    </style>
</head>
<body>
		
		<img src="http://localhost/Current%20Project/mahindra/imgs/logo.png" class="logo">
		<div class="title-section">
		<div class="header-area" style="padding-top: 20px;">
			<a href="index.php" style="font-family: rockwell; margin-top:20px;"><?php echo 	$company_name; ?> </a>
		</div>
	</div>
	<div class="middel-section">
		<div class="form-section" align="center">
			<form action="" method="post">
				<table >
					<tr>
						<td colspan="2" class="form-title" height="60px">
								Login
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
								<?php echo $msg; ?>
						</td>
					</tr>
					<tr>
						<td class="input-heading">
							<label>
								Username
							</label>
						</td>
						<td>
							<input type="text" name="username" placeholder="Username" autofocus>
						</td>
					</tr>
					<tr>
						<td class="input-heading">
							<label>
									Password
							</label>						
						</td>
						<td>
							<input type="password" name="password" placeholder="**********">
						</td>
					</tr>
					<tr>
						<td class="input-heading">
							<label> Select Role</label>
						</td>
						<td>
							<select name="role">
								<option>-- Select Role --</option>
								<option value="super"> Supervisor </option>
								<option value="master"> Master </option>
								<option value="procurement">Procurement</option>
								<option value="quality">Quality</option>
							</select>
						</td>
					</tr>
					<tr>
						<td  colspan="2" align="center" class="btn-table-td">
							<input type="submit" name="submit" value="Login" class="btn-submit">
						</td>						
					</tr>
				</table>
			</form>
		</div>
	</div>
	<div class="bottom-section" >
		Design and Develop by <a href="tel:70837365757">Ytech solution</a>
	</div>
</body>
</html>
