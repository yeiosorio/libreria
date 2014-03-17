<?php 
   session_start();
   
   if (!isset($_SESSION['user'])) {
     header('location: index.php');

   }
   $user = $_SESSION['user'];
   include("config.php");

   //varifica la fecha limite
    $fecha_actual = date("Y-m-d");

   $consult = mysql_query("SELECT id from user WHERE user ='$user'");
   $row_id  = mysql_fetch_assoc($consult);
   $id = $row_id['id'];

    $con = "SELECT days, id_book, id_user from usuario";
    $execute = mysql_query($con);
        // ******************* 
        // verify Current date 
        // *******************
         while ($row = mysql_fetch_array($execute)) {
         $fecha_limit  = $row['days'];
         $id_book      = $row['id_book'];
         

         
          if ($fecha_actual >= $fecha_limit) {
          mysql_query("UPDATE book SET state='on' WHERE id='$id_book'");
          mysql_query("DELETE from usuario WHERE days='$fecha_limit'");
        }

     }//****************

  //consult user
$result = "SELECT title, autor, book.id, '$id' from usuario,book WHERE usuario.id_book = book.id AND usuario.id_user = '$id'";
  $getuser = mysql_query($result ,$bd);


  $res = "SELECT COUNT(*) from usuario WHERE usuario.id_user = '$id'";
  $get = mysql_query($res ,$bd);
  $count = mysql_result($get,'0');
  
   
?>        

  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
  </head>
  <body>
    <div style="background-color: lightslategray; width:1346px; margin-left:-9px;">
      <center>
        <h2>Wellcome to Reserve
         Book <?php echo $user ?> <b style="margin-left: 395px;"><a href="log_out.php">Log Out</a></b>
        </h2>
      </center>
  </div>

  <div style="width:60%; padding:20px; margin:0px; margin:auto;  background-image:url('img/fondogris.jpg');
    background-repeat:repeat-y;background-repeat:repeat-x">

      <center><br>
         <div style=""> 
          <b style="float:left; width: 50%;">My Name: <?php echo $user ?></b><br>
            <?php 

                if (isset($_GET['delete_book'])) {
                   if ($_GET['delete_book'] == "delete") {
                     $delete = "delete Succes";
                   }
                   else{
                    $delete = "";
                   }
                 }
                else{ $delete = "";}
             ?>
        
          <b style="float:left; width: 50%; ">Total Reserve: <?php echo $count ?></b>
          </div>
          <img style="width: 150px;" src="img/usuario.jpeg" alt="Usuario"/>
          <br>
          <div style="margin-top: 40px;">
          <h2>My Reserve</h2>
          </div>
          


      </center><br>

    <center>
    <?php 

    $num = mysql_num_rows($getuser);
    if ($num == "") {
        $show = '<div style="background-color: silver; margin: auto; "><b>There is Not reserve still!!. Reserve below</b></div>';
    }
    else{
     
      $show = '<table style="width:600px; border:1px solid">
            <tr style=" border:1px solid">
              <td>Title</td><td>Author</td><td>Action</td></tr>';
    }
      
     echo $show;
    ?>
     </center>

   

<?php
//Lista Los Registros
      while ($row = mysql_fetch_assoc($getuser)){
       
                  echo '<tr>
                  <td style=" border:1px solid">'.$row['title'].'</td><td style=" border:1px solid">'.$row['autor'].'</td>
                  <td style=" border:1px solid"><a href="delete.php?id='.$row['id'].'">Delete</a></td>
                  </tr>';
     }
   ?>  


   </table>
    <br>
 <center><button style="padding:10px; margin-top: 60px; border-style:groove;"><a style="text-decoration:none; " href="listBook.php">Request Book</a></button>
</center>
        </div>
      </body>
    </html>

