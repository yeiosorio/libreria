<?php 
  session_start(); 

     include("config.php");
      //consult user
      $result = "SELECT * from book WHERE state='on'";  
      $getuser = mysql_query($result ,$bd);
      //count
      $res = "SELECT id,title,autor from book";
      $get = mysql_query($res ,$bd);
      $count = mysql_result($get,'0');
  ?>
  <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <script type="text/javascript" src="ajax.js"></script>
      <script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>
      <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
      <script type="text/javascript" src="source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
      <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
      <script type="text/javascript">
        $(document).ready(function() {
          $('.fancybox').fancybox();
         
        });
      </script> 
      <style type="text/css">
        .fancybox-custom .fancybox-skin {
          box-shadow: 0 0 50px #222;
        }

        body {
          max-width: 700px;
          margin: 0 auto;
        }
      </style>
    </head>

    <div style="background-color: lightslategray; width:1355px; border:px solid; margin-top:-1; margin-left:-332;">
      <center><h2> <a href="bienvenida.php"><img style=" margin-left: 60px;" src="img/boton_atras.gif"></a>
          Reserve Book System <b style="margin-left: 400px;"><a href="log_out.php">Log Out</a></b></h2>
      </center>
    </div>

   <div style="width:100%; min-height: 500px; padding:20px; margin-top:0px; margin:auto; padding:20px; background-image:url('img/fondogris.jpg');
    background-repeat:repeat-y; background-repeat:repeat-x"><div style="margin-right: 216px;">
 
  <center>
      filter by 

       <input type="text"  id="filter" onkeyup="verifica_table();">
       
  </center>
  </div><br><br><br>

      <div id="table">
       <center> 
            <table border="1" width="600">
            <tr><td>Title</td><td>Author</td></tr>
        </center>
<?php

        while ($row = mysql_fetch_array($getuser)) {
                  $fila1 = utf8_encode($row['title']);
                  $fila2 = utf8_encode($row['autor']);
               

          echo'<td><a class="fancybox fancybox.iframe" style="text-decoration: none;" href="description.php?id='.$row['id'].'">'.$fila1.'</a></td>
              <td>'.$fila2.'</td>
              </tr>';
  }

?>
 </table><br>

      </div>








