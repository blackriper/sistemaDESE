<?php
	require 'metodos.php';
    $link= conexion();
	mysqli_query($link,"SET NAMES 'utf8'"); 


    $id_alum= mysqli_query($link,"select matricula from alumnos where matricula= '".htmlentities($_POST["matricula"])."'");

     if (mysqli_num_rows($id_alum)>0) {
	      echo"existe";
    }else{

		$tut=$_POST['tutor'];
		$name=$_POST['nombre'];
		$mat=$_POST['matricula'];
		$carr=$_POST['carrera'];
		$app=$_POST['apellidos'];
		$state=1;
		
		
		$sql="INSERT INTO alumnos(tutor, nombre, matricula, carrera, apellidos, status)VALUES('$tut', '$name','$mat','$carr','$app', $state)";
		$sql5="INSERT INTO liberacion(matricula, alumno, carrera)VALUES('$mat','$app $name','$carr')";
		$sql1="INSERT INTO serviciosocial(matricula)VALUES('$mat')";
		$sql2="INSERT INTO estancia1(matricula)VALUES('$mat')";
		$sql3="INSERT INTO estancia2(matricula)VALUES('$mat')";
		$sql4="INSERT INTO estadia(matricula)VALUES('$mat')";
		if(mysqli_query($link,$sql)){
		  echo "correcto";	
		}else{
		  echo "incorrecto";	
		}
		mysqli_query($link,$sql1);
		mysqli_query($link,$sql2);
		mysqli_query($link,$sql3);
		mysqli_query($link,$sql4);
		mysqli_query($link,$sql5);
   	}  
   	 
	mysqli_close($link);
?>