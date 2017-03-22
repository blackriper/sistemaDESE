<?php

require 'metodos.php';
$conexion= conexion();

$numuser= mysqli_query($conexion,"select matricula from alumnos where matricula= '".htmlentities($_POST["bus"])."'");

if (mysqli_num_rows($numuser)>0) {

   echo "Siesta";
}else{
   echo "Noesta";	
}


mysqli_close($conexion);

?>