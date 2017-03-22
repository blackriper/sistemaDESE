<?php

		require 'metodos.php';
        $coneccion=conexion();  
        $consulta ="SELECT nombre,apellidos FROM usuarios WHERE status=1 AND puesto='Tutor' OR puesto='Director' ORDER BY iduser";
        mysqli_set_charset($coneccion,"utf8");
        $resultado=mysqli_query($coneccion,$consulta);
        
        
        $tutores= array();//se crea arreglo



        while ($row= mysqli_fetch_array($resultado)) {

           $ape=$row['apellidos'];
           $nom=$row['nombre'];
           $tu="{$nom} {$ape}"; 
           $tutores[]= array('tutor'=>$tu);
                      

        } 

       $json_string=json_encode($tutores);
       echo $json_string;   
?>