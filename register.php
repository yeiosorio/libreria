<?php 
	if (isset($_POST['user']) && isset($_POST['pass'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
			// *****CONNECTION BBDD*****
	//connect BD login
	 include("config.php");
	session_start();
	//consult user
	$result = "SELECT * from user WHERE user='$user' or pass='$pass'";
	$ejecutar = mysql_query($result, $bd);

	if($_POST['pass'] != $_POST['cpass']) {
        	echo "<script language='javascript'>
			alert('No match password');
			window.location.href = 'index.php';
			</script>";
            
        }
	elseif (empty($user) || empty($pass)){
		echo "<script language='javascript'>
			alert('Empty Field!!');
			window.location.href = 'index.php';
			</script>";
	}
	elseif (mysql_num_rows($ejecutar) > 0) {
		$_SESSION['user'] = $user;
		$_SESSION['pass'] = $pass;
	    header("Location: index.php?error=1");
	}
	elseif (mysql_num_rows($ejecutar) == 0){

		mysql_query("INSERT INTO user (user, pass) values( '$user' , '$pass')");

		echo "<script language='javascript'>
			alert('Ok Welcome!!');
			window.location.href = 'listBook.php';
			</script>";
	 } 
}
?>