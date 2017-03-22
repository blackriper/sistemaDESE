<?php

require 'metodos.php';
 $link=conexionsql();

$id= @mysql_query("select iduser from usuarios where iduser= '".htmlentities($_POST["matricula"])."'");

if (@mysql_num_rows($id)>0) {
	echo "existe";
	$sql1="UPDATE usuarios SET status=1 WHERE iduser='".htmlentities($_POST["matricula"])."'";
	@mysql_query("SET NAMES 'utf8'");
	@mysql_query($sql1);
}else{
$mat=$_POST['matricula'];
$key=$_POST['keys'];
$name=$_POST['nombre'];
$app=$_POST['apellido'];
$cont=encrypt($_POST['contraseña'],$key);
$carr=$_POST['carrera'];
$cargo=$_POST['puesto'];
$state=1;


@mysql_query("SET NAMES 'utf8'");
$sql="insert into usuarios(iduser, nombre, apellidos, contra, semilla, carrera, puesto,status)values('$mat', '$name','$app','$cont','$key','$carr','$cargo', $state)";
@mysql_query($sql);
echo "exito";
}
@mysql_close($link);
  
?>