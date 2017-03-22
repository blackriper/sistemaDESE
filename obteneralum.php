<?php

require 'metodos.php';
$conexion= conexion();

$num_alu= mysqli_query($conexion,"select matricula from alumnos where matricula= '".htmlentities($_POST["num_alum"])."'and status=1");

if (mysqli_num_rows($num_alu)>0) {

	$sql="select*from alumnos where matricula= '".htmlentities($_POST["num_alum"])."'and status=1";
	mysqli_set_charset($conexion,"utf8");//formato de datos utf8
	$result=mysqli_query($conexion,$sql);

	$alumno= array();//se crea arreglo

	while ($row= mysqli_fetch_array($result)) {

       $id=$row['matricula'];
       $nom=$row['nombre'];
       $app=$row['apellidos'];
       $carr=$row['carrera'];
       $tuto=$row['tutor'];
	}
		
	$alumno[]= array('alu'=>$id,'nombre'=>$nom,'apellidos'=>$app,'carrera'=>$carr,'tutor'=>$tuto);
	$json_string=json_encode($alumno);
    echo $json_string;
	
}else{
	echo "noexiste";
}

mysqli_close($conexion);

?>