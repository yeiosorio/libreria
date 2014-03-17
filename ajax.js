 function objetoAjax(){
    var xmlhttp=false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
        return xmlhttp;
}

var conexion2;    

function verifica_table(data){
  var filter = document.getElementById("filter").value;
  var table =  document.getElementById("table");

  var url = "vista_tabla.php?filter="+filter;
  
  conexion2=objetoAjax();
  conexion2.open("GET", url, false);
  conexion2.send(null);  
  conexion2.onreadystatechange = muestratable(table);
   
}

function muestratable(table)
{

  if(conexion2.readyState == 4)
  {
    table.innerHTML = conexion2.responseText;

  } 
  else 
  {
    table.innerHTML = 'Cargando...';
  }
}

