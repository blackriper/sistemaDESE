<?php

require 'metodos.php';
$conexion= conexionsql();

$sta=$_POST['status'];

$sql1="UPDATE usuarios SET status='$sta' WHERE iduser='UPJR' AND contra='s9yjuruoz6s='";
	if(@mysql_query($sql1)){
		if ($sta==1) {
			echo"correcto";
		}elseif ($sta==0) {
			echo"baja";
		}
	}
	else{
   		echo"incorrecto";	
	}
@mysql_close($conexion);
?>