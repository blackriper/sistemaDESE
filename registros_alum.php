<?php

require 'metodos.php';
$conexion=conexion();
mysqli_query($conexion,"SET NAMES 'utf8'");

if ($_POST["solicito"]==="servicio") {

	$mat=$_POST["matricula"];
	$per=$_POST["periodo"];
	$or=$_POST["orga"];
	$fo1=$_POST["for1"];
	$fo2=$_POST["for2"];
		
  
  if ($mat==""||$per==""||$or==""||$fo1==""||$fo2=="") {

    	$sql="update serviciosocial set rec03='$fo1',periodo='$per',organismo='$or',ct='$fo2' where matricula='$mat'";

  }else{
  		$sql="update serviciosocial set rec03='$fo1',periodo='$per',organismo='$or',ct='$fo2',liberacion=1 where matricula='$mat'";

  		$sql2="UPDATE liberacion SET serviciosocial='img/cheket.png' WHERE matricula='$mat' ";

  		if(mysqli_query($conexion,$sql2)){
       	}else{
    	echo "No liberacion";    
    }
  }
	
    if(mysqli_query($conexion,$sql)){
       echo "El Proceso se registro correctamente";
    }else{
    	echo "El proceso no se registro correctamente";    
    }
   
}

if ($_POST["solicito"]==="estancia1") {

    $mat=$_POST["matricula"];
	$per=$_POST["periodo"];
	$or=$_POST["orga"];
	$fo1=$_POST["for1"];
	$fo2=$_POST["for2"];
	$fo3=$_POST["for3"];
	$fo4=$_POST["for4"];

	echo actualizar($_POST["solicito"],$fo1,$per,$or,$fo2,$fo3,$fo4,$mat);
}

if ($_POST["solicito"]==="estancia2") {

    $mat=$_POST["matricula"];
	$per=$_POST["periodo"];
	$or=$_POST["orga"];
	$fo1=$_POST["for1"];
	$fo2=$_POST["for2"];
	$fo3=$_POST["for3"];
	$fo4=$_POST["for4"];

	echo actualizar($_POST["solicito"],$fo1,$per,$or,$fo2,$fo3,$fo4,$mat);
}

if ($_POST["solicito"]==="estadia") {

    $mat=$_POST["matricula"];
	$per=$_POST["periodo"];
	$or=$_POST["orga"];
	$fo1=$_POST["for1"];
	$fo2=$_POST["for2"];
	$fo3=$_POST["for3"];
	$fo4=$_POST["for4"];

	echo actualizar($_POST["solicito"],$fo1,$per,$or,$fo2,$fo3,$fo4,$mat);
}




 mysqli_close($conexion);

?>