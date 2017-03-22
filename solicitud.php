<?php

require 'metodos.php';
$conexion= conexionsql();

$mat=$_POST['matricula'];
$cont=$_POST['cont'];

$sql=@mysql_query("SELECT iduser,semilla FROM usuarios WHERE iduser='$mat'AND status=1");
   
if(@mysql_num_rows($sql)>0){
	$a11k=@mysql_result($sql,@mysql_num_rows($sql)-1,"semilla");
   	$key=encrypt($cont,$a11k);
    $sql1="UPDATE usuarios SET contra='$key' WHERE status=1 AND iduser='$mat'";
	@mysql_query("SET NAMES 'utf8'");
	if(@mysql_query($sql1)){
   	echo"correcto";

	}else{
	echo "incorrecto";	
	
 }
}
else{
	echo "noexiste";
        
}

@mysql_close($conexion);


?>