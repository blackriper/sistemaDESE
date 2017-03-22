<?php

require 'metodos.php';
$conexion= conexionsql();

$oldmat=$_POST['oldmatricula'];
$newmat=$_POST['newmatricula'];
$name=$_POST['nombre'];
$app=$_POST['apellido'];
$carr=$_POST['carrera'];
$tuto=$_POST['tutor'];	

$sql="UPDATE alumnos SET matricula='$newmat',nombre='$name',apellidos='$app',carrera='$carr',tutor='$tuto' WHERE status=1 AND matricula='$oldmat'";
$sql1="UPDATE estancia1 SET matricula='$newmat' WHERE matricula='$oldmat'";
$sql2="UPDATE estancia2 SET matricula='$newmat' WHERE matricula='$oldmat'";
$sql3="UPDATE estadia SET matricula='$newmat' WHERE matricula='$oldmat'";
$sql4="UPDATE serviciosocial SET matricula='$newmat' WHERE matricula='$oldmat'";
$sql5="UPDATE liberacion SET matricula='$newmat',alumno='$app $name',carrera='$carr' WHERE matricula='$oldmat'";
@mysql_query("SET NAMES 'utf8'");
	if(@mysql_query($sql)){
		@mysql_query($sql1);
		@mysql_query($sql2);
		@mysql_query($sql3);
		@mysql_query($sql4);
		@mysql_query($sql5);
   	echo"correcto";
	}else{
		echo "incorrecto";	
	}
@mysql_close($conexion);


?>