<?php

//conexion a base de datos 
require 'metodos.php';
 $link= conexionsql();



 $usuario= @mysql_query("select semilla from usuarios where iduser= '".htmlentities($_POST["us"])."'and status=1");
 $cell= @mysql_result($usuario,@mysql_num_rows($usuario)-1,"semilla"); 
 echo $cell;

 
 
   
 
@mysql_close($link); 



?>