<?php

require 'metodos.php';
$conexion= conexion();

$num_user= mysqli_query($conexion,"select iduser from usuarios where iduser= '".htmlentities($_POST["user_num"])."'and status=1");

if (mysqli_num_rows($num_user)>0) {

	$sql="select*from usuarios where iduser= '".htmlentities($_POST["user_num"])."'and status=1";
	mysqli_set_charset($conexion,"utf8");//formato de datos utf8
	$result=mysqli_query($conexion,$sql);

	$usuario= array();//se crea arreglo

	while ($row= mysqli_fetch_array($result)) {
       $semilla=$row['semilla'];
       $id=$row['iduser'];
       $nom=$row['nombre'];
       $app=$row['apellidos'];
       $con=decrypt($row['contra'],$semilla);
       $carr=$row['carrera'];
       $pues=$row['puesto'];
	}
	if ($pues=="Administrador") {
			
		$usuario[]= array('doc'=>$id,'nombre'=>$nom,'apellidos'=>$app,'contra'=>$con,'carrera'=>$carr,'puesto'=>$pues);
		$json_string=json_encode($usuario);
    	echo $json_string;
    }else{
    	echo "esadmin";
    }
	
}else{
	echo "noexiste";
}

mysqli_close($conexion);

?>