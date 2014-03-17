<?php 
  session_start();
  # come description files
  $days    = $_POST['days'];
  $id_book = $_POST['id_book'];
  $user    = $_SESSION['user'];

  include("config.php");
  $consult = mysql_query("SELECT id from user WHERE user ='$user'");
  $row_id  = mysql_fetch_assoc($consult);

  $id = $row_id['id'];
  $fecha   = date("Y-m-d", strtotime('+ '.$days.' days'));

 
  // Consult array 
   $con = mysql_query("SELECT * from book WHERE id='$id_book'");
   $row = mysql_fetch_array($con);
  //Insert user
  if (count($row) > 0){
      mysql_query("INSERT INTO usuario (days, id_book, id_user) values ( '$fecha' , '$id_book','$id')");
      mysql_query("UPDATE book SET state='off' WHERE id = '$id_book'");
        
         echo "<script language='javascript'>
               parent.location.reload();
               </script>";
        
  }
  
     mysql_close();

  ?>




