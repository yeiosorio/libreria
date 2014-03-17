<?php 
session_start();
	if (isset($_GET['error'])) {
	 
		if ($_GET['error']== "1") {
			$user = $_SESSION['user'];
			$msg = "User or Password invalid! try again";
		}
	}
	else{
		$user = "";
		$msg = "";
	}
 ?>
<html>
<head>
	<title>Reserv Book</title>
</head>
<body>
<div style="background-color:lightslategray; width:1350px; border:1px solid; margin-top:-9; margin-left:-9;"><center><h2>Reserve Book System</h2></center></div>

<div style="width:60%; height: 100%; padding:60px;margin-top:0px; margin:auto;  background-image:url('img/fondogris.jpg');
  background-repeat:repeat-y;background-repeat:repeat-x">

	<div style="background-color: white; border-style: groove; border-radius: 0px 20px 20px 20px; width: 200px;  padding: 50px; margin: auto; margin-top: -8px;">

		<h1><b>Log In</b></h1><br>
		<?php echo $msg; ?><br>

		<!--Form Login-->
		<form method="POST" action="login.php ">
			<label><b>UserName:</b></label><br>

			<input type="text" name="user" placeholder="Username" value="<?php echo $user; ?>">
			<label><b>Password:</b></label><br>

			<input type="password" name="pass" placeholder="*****"><br><br>

			<input type="submit" value="Log In">

		</form>

	</div>
</div>
</body>
</html>