<?php
    require 'metodos.php';
    conexionsql();
    $sql="SELECT a.matricula,a.nombre,a.apellidos,b.rec03,b.periodo,b.organismo,b.ct FROM alumnos a, serviciosocial b WHERE a.matricula=b.matricula AND a.status=1";
    @mysql_query("SET NAMES 'utf8'");
    $result = @mysql_query($sql);
 	if(isset($_GET['matricula']))
	{
		$mart=$_GET['matricula'];
		$sql="UPDATE serviciosocial SET rec03='',periodo='',organismo='',ct='',liberacion=0 WHERE matricula='$mart'";
		$sql1="UPDATE liberacion SET serviciosocial='' WHERE matricula='$mart'";
		if(@mysql_query($sql)){
			@mysql_query($sql1);
         	header("Location: Administrador_index.php#!/cona");
		}else{
			echo "No se pudo dar de baja el registro";
		}
		
	}
?>

<html>
<head>
	
	<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css" title="currentStyle">
		@import "css/jquery-ui-1.8.4.custom.css";
		@import "css/demo_table_jui.css";
	</style>

	<style type="text/css">
		*{
			font-family: arial;
		}
		.in2{
			width: 32px;
			height: 32px;
			background-image: url(img/eliminar.png);
		}
	</style>
	<script type="text/javascript" language="javascript" src="js/jquery-2.1.4.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		function matricula(matricula){
		if(confirm('¿Estas seguro de limpiar este registro?')){
				window.location.href='servicio.php?matricula='+matricula;
			}
		}
	</script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#datatables').dataTable({
				"sPaginationType": "full_numbers",
				"aaSorting":[[2, "desc"]],
				"bJQueryUI":true
			} );
		} );
	</script>

	</head>
     <div  id="data-table">
		<table cellpadding="0" cellspacing="0" border="0" id="datatables" class="display">
			<thead>
				<tr>
					<th>Matricula</th>
					<th>Apellidos</th>
					<th>Nombre</th>
					<th>Periodo</th>
					<th>Organismo</th>
					<th>REC03</th>
					<th>CT</th>
					<th>*Acciones*</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if (@mysql_num_rows($result)>0){
						while ($row = mysql_fetch_row($result)){
				?>
					<tr>
						<td><?php echo $row[0]?></td>
						<td><?php echo $row[2]?></td>
						<td><?php echo $row[1]?></td>
						<td><?php echo $row[4]?></td>
						<td align="center"><?php echo $row[5]?></td>
						<td align="center"><?php echo $row[3]?></td>
						<td align="center"><?php echo $row[6]?></td>
						<td align="center"><a href="javascript:matricula(<?php echo $row[0]; ?>)"><img class="in2" alt="" title=" Dar de Baja Alumno"/></a></td>
					</tr>
					<?php
					}
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>