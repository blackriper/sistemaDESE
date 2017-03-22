<?php

require 'metodos.php';
$conexion= conexionsql();

$mat=$_POST['matricula'];
$name=$_POST['nombre'];
$app=$_POST['apellido'];
$cont=$_POST['contraseña'];
$carr=$_POST['carrera'];
$cargo=$_POST['puesto'];	

$sql=@mysql_query("SELECT iduser,semilla FROM usuarios WHERE iduser='$mat' AND status=1");
if(@mysql_num_rows($sql)>0){
	$a11k=@mysql_result($sql,@mysql_num_rows($sql)-1,"semilla");
  	$key=encrypt($cont,$a11k);
	$sql1="UPDATE usuarios set iduser='$mat',nombre='$name',apellidos='$app',contra='$key',carrera='$carr',puesto='$cargo' where status=1 and iduser='$mat'";
	$sql2="UPDATE alumnos set tutor='$app $name' WHERE status=1 and iduser='$mat'";
	@mysql_query("SET NAMES 'utf8'");
	if(@mysql_query($sql1)){
   	echo"correcto";
   	@mysql_query($sql2);
	}else{
		echo "incorrecto";	
	}
}
else{
	echo "incorrecto";	
}

@mysql_close($conexion);


?>