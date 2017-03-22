<?php

//metodo de conexion sqli
function conexion(){
 $conexion= mysqli_connect("localhost","dese_user","Upjr1520+","dese")or die("no hay conexion :(");
 return $conexion;
}

//funcion actualizar estadias
function actualizar($table,$fo1,$per,$or,$fo2,$fo3,$fo4,$mat){

	$conexion=conexion();
  mysqli_query($conexion,"SET NAMES 'utf8'");

 if ($mat==""||$per==""||$or==""||$fo1==""||$fo2==""||$fo3==""||$fo4=="") {

   	  $sql="update $table set rec03='$fo1',periodo='$per',organismo='$or',ev='$fo2',ct='$fo3',ca='$fo4' where matricula='$mat'";

    }

 if ($mat<>""&&$per<>""&&$or<>""&&$fo1<>""&&$fo2<>""&&$fo3<>""&&$fo4<>"") {   

      $sql="update $table set rec03='$fo1',periodo='$per',organismo='$or',ev='$fo2',ct='$fo3',ca='$fo4',liberacion=1 where matricula='$mat'";
      $sql2="UPDATE liberacion SET $table='img/cheket.png' WHERE matricula='$mat' ";
       if(mysqli_query($conexion,$sql2)){
        if(mysqli_query($conexion,$sql)){
              return "El Proceso se registro correctamente";

             }else{
               return "El proceso no se registro correctamente";
          }
       }
    }
    
    if(mysqli_query($conexion,$sql)){
       return "El Proceso se registro correctamente";

    }else{
    	return "El proceso no se registro correctamente";

    }
}

//funcion conexion sql clasica
function conexionsql(){
  @mysql_connect("localhost","dese_user","Upjr1520+")or die("no hay conexion :(");
  @mysql_select_db("dese");
}


//funcion para abrir pagina web
function abrir_paginita($tipo){

  if ($tipo=="Director") {
         echo"app/index_tutores.php"; 
     }elseif ($tipo=="Tutor") {
         echo"app/index_tutores.php"; 
    }elseif ($tipo=="Administrador") {
        echo"Administrador_index.php"; 
      }
  }



function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}

 function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}



?>