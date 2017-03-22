<?php
@session_start();
//conexion a base de datos 
require 'metodos.php';
 $link= conexionsql();
// El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función htmlentities para evitar inyecciones SQL.
 $usuario= @mysql_query("select iduser,semilla from usuarios where iduser= '".htmlentities($_POST["us"])."'and status=1");
 @mysql_query("SET NAMES 'utf8'");
 //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario... 
if(@mysql_num_rows($usuario)>0)
{ 
  $a11k=@mysql_result($usuario,@mysql_num_rows($usuario)-1,"semilla");
  $key=encrypt($_POST["pas"],$a11k);
  $sql = "SELECT * FROM usuarios WHERE iduser = '".htmlentities($_POST["us"])."' and contra= '".htmlentities($key)."' and status=1"; 
  $clave = @mysql_query($sql); 
  //Si el usuario y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo. 
  if(@mysql_num_rows($clave)>0)
  { 
      session_start();  
      $tipo= @mysql_result($clave,@mysql_num_rows($clave)-1,"puesto"); 
      $nom=@mysql_result($clave,@mysql_num_rows($clave)-1,"nombre");
      $ap=@mysql_result($clave,@mysql_num_rows($clave)-1,"apellidos");
      $c=@mysql_result($clave,@mysql_num_rows($clave)-1,"carrera");
      $uss="{$nom} {$ap}"; 
      $_SESSION["autentica"] = "si"; 
      $_SESSION["usuarioactual"] =$uss;
      $_SESSION['puesto']=$tipo;
      $_SESSION['carrera']=$c;
      //Direccionamos a nuestra página principal del sistema. 
      abrir_paginita($tipo);         
   }
   else{ echo"1";} 
}
else{ echo"0";} 
@mysql_close($link); 
?>