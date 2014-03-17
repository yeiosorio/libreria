<?php 
  session_start();
	$id = $_GET['id'];


   include("config.php");
 //consult register 
  $con = mysql_query("SELECT id_book FROM usuario WHERE id='$id'");
  $row = mysql_fetch_array($con);

  $id_book = $row['id_book'];

  //consult user
  $update = "UPDATE book SET state='on' WHERE id=".$id;
  $get = mysql_query($update);
  $result = "DELETE from usuario WHERE id_book=".$id;    
  $getuser = mysql_query($result ,$bd);

  header("location: bienvenida.php?delete_book=delete");

 ?>