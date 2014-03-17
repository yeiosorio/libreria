<?php 
	session_start();
  #get listbook php
  $id_book = $_GET['id'];
  include("config.php");  
  //consult user
  $result = "SELECT title,autor,description,img from book WHERE id=".$id_book;    
  $getuser = mysql_query($result ,$bd);
  ?>

  <div style="width:100%; height: 92%; padding:20px; margin-top:0px; margin:auto;  background-image:url('img/fondogris.jpg');
    background-repeat:repeat-y; background-repeat:repeat-x">
  
      <?php 
    //Lista Los Registros
    $row = mysql_fetch_array($getuser);
                  $id = $row[0];
                  $fila1 = utf8_encode($row['title']);
                  $fila2 = utf8_encode($row['autor']);
                  $fila4 = utf8_encode($row['description']);
                  $fila5 = utf8_encode($row['img']);
    ?>
<html>
<head>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
      $(document).ready(function (){
               $("#form").submit(
                  
                 function (){
                  
                   if ($("#days").val()== null) {
                        alert("select # of night");
                        return false;
                  }
                 }

                  )
         });
</script>
</head>
<body>
    <div style="float: left; width: 50%; text-align: left; ">
    	<b>book title:</b> <?php echo $fila1;?>
    </div><br><br>

    <div style="float: left; text-align: left; width: 50%; ">
    	<b>Author:</b> <?php echo $fila2;?>
    </div><br><br>
    <hr>

    <div style="float: left; width: 50%; ">
    	<b>Description:</b><br> <?php echo $fila4; ?>
    </div>

    <div style="float: left; width: 50%; ">
    	 <?php echo '<img style="width:200px;" src="img/'.$fila5.'">'; ?>
    </div><br><hr><br><br>
    
      <form  id="form" method="post" action="reserve.php">
       <b>Days</b>
          <select name="days" id="days" require/>

             <option value="vacio" selected="selected" disabled="disabled">Night</option>
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
             <option value="4">4</option>
             <option value="5">5</option>
          </select>
          <input type="hidden" value="<?php echo $id_book; ?>" name="id_book" >
    	    <input id="fancy" style="padding:1px; border-style:groove;" type="submit" value="RESERVE" >

        </form>
      </div>
    </div>
</body>
</html>

