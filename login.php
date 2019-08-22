<?php
include_once("connection.php");


session_start();

if(isset($_POST['login']))
{
	if(empty($_POST['uname']) || empty($_POST['pwd']))
	{
		$message="All Fields are Mandatory!";
	}
	else
	{
		$sql="SELECT * FROM users WHERE uname=:uname AND pwd=:pwd";
		$query  = $pdoconn->prepare($sql);
		$query->execute(

			array(
				'uname'=>$_POST['uname'],
				'pwd'=>$_POST['pwd']
			)

		);
		$count=$query->rowCount();
		if($count>0)
		{
			$_SESSION['uname']=$_POST["pwd"];
            header('location: home.html');
		}
		else
		{
			$message="Wrong Username or Password";
		}
	}
}
?>


<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	</head>
	<body>
		<img src="images/mega_logo.png" alt= "no-image" class="logo">
			<h4>Existing User? Login Here!</h4>
			
			<div class="form-box">
				<form method="post">
					<input type="text" name="uname" id="uname" placeholder="Username" autocomplete="off"> <br><br>
					<input type="password" name="pwd" id="pwd" placeholder="Password"> <br><br>
					<a href="home.html"><button type="submit" name="login">Login</button></a>
				</form>
				<?php

					if(isset($message)){
						echo '<h1 style="font-size: 16px;color: #ff1c1c;text-align: center;font-family: "Poppins", sans-serif;">'.$message.'</h1>';
					}

				?>
			</div>
			<div class="register-part">
				<p>Do not have an account yet? Then <a href="register.php">Register</a></p>
			</div>
	</body>	
</html>