

//establecer conexion Ajax

  function Ajax_conection(){
    var xmlhttp = false;
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
 
      try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (E) {
        xmlhttp = false; }
    }
 
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
  }


 function ajax(id,cont){


  ajax= Ajax_conection();
  ajax.open("POST","solicitud.php",true);
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("&matricula="+id+'&cont='+cont);    
    ajax.onreadystatechange=function(){
       if (ajax.readyState==4) {
          if (ajax.status==200) {
              alert(ajax.responseText);
           }
        }
       } 
 
 }


