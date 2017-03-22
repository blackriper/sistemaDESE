<?php

require 'metodos.php';
$conexion= conexion();

    $table=$_POST["tab"];
	$sql="select*from $table where matricula= '".htmlentities($_POST["alum_num"])."'";
	mysqli_set_charset($conexion,"utf8");//formato de datos utf8
	$result=mysqli_query($conexion,$sql);

	$servicio= array();//se crea arreglo
	if($table=='serviciosocial'){
		while ($row= mysqli_fetch_array($result)) {
       
       $rec=$row['rec03'];
       $per=$row['periodo'];
       $or=$row['organismo'];
       $ct=$row['ct'];
	
	}
	$servicio[]= array('rec03'=>$rec,'perio'=>$per,'orga'=>$or,'ct'=>$ct);
	$json_string=json_encode($servicio);
    echo $json_string;
}
if($table=='estancia1'||$table=='estancia2'||$table=='estadia'){
	while ($row= mysqli_fetch_array($result)) {
       
       $rec=$row['rec03'];
       $per=$row['periodo'];
       $or=$row['organismo'];
       $ev=$row['ev'];
       $ct=$row['ct'];
       $ca=$row['ca'];
	
	}
	$servicio[]= array('rec03'=>$rec,'perio'=>$per,'orga'=>$or,'ev'=>$ev,'ct'=>$ct,'ca'=>$ca);
	$json_string=json_encode($servicio);
    echo $json_string;
}

mysqli_close($conexion);

?>