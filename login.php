<?php 
session_start();
if (isset($_POST['user']) && isset($_POST['pass'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$fail = false;

	//connect BD login
 include("config.php");
	//consult user
	//Consulta del usuario y el password
$query="SELECT * FROM user WHERE user='$user' and pass='$pass' ";
$rs=mysql_query($query); 
$row=mysql_fetch_object($rs); 
$nr = mysql_num_rows($rs); 

//Si existe el usuario lo va a redireccionar a la pagina de Bienvenida.

if($nr > 0){ 
	$_SESSION['user'] = $user;
	$_SESSION['pass'] = $pass;
 header("Location: bienvenida.php"); 

}

//Si no existe lo va a enviar al login otra vez.
else if($nr <= 0) { 
	header("Location: view_login.php?error=1");
 	$_SESSION['user'] = $user;
}   
}

	?>