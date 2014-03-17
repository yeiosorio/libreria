<?php 
session_start();

 $filter = $_GET['filter'];
  include("config.php");
  //consult user
  if ($filter != "all" ) {
      $all = "WHERE title LIKE '%$filter%' AND state='on'";
  }
  else{ 
        $all = "WHERE state='on'";
  }

$result = "SELECT id,title,autor from book ".$all;
$getuser = mysql_query($result ,$bd);
?>
<html>
<head>
  
</head>
<body>
<center> 
	<table border="1" width="600">
		<tr><td>Title</td><td>Author</td>
        </tr>
        </center>


<?php

while ($row = mysql_fetch_array($getuser)) {
                  $fila1 = utf8_encode($row['title']);
                  $fila2 = utf8_encode($row['autor']);

            echo'<td><a class="fancybox fancybox.iframe" style="text-decoration:none;" href="description.php?id='.$row['id'].'">'.$fila1.'</a></td>
			      <td>'.$fila2.'</td>
		      </tr>';
     
  }

 ?>
 </table><br>
 </body>
 </html>

