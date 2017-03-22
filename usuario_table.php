<?php
	require 'metodos.php';
	conexionsql();
	$sql="SELECT iduser,nombre,apellidos,contra,carrera,puesto,status FROM usuarios WHERE status=1 AND iduser<>'UPJR'";
	@mysql_query("SET NAMES 'utf8'");
	$result = @mysql_query($sql);
    @mysql_set_charset($conexion,"utf8");
	if(isset($_GET['matricula']))
	{
		$mart=$_GET['matricula'];
		$sql="UPDATE usuarios SET status=0 WHERE iduser='$mart'";
		if(@mysql_query($sql)){
         header("Location: ");
		}else{
			echo "no salio";
		}
		
	}
?>

<html>
<head>
	<meta charset="UTF-8">
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
		function numdocente(numerodoc){
		if(confirm('¿Estas seguro de dar de baja este registro?')){
				window.location.href='usuario_table.php?matricula='+numerodoc;
			}
		}
	</script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#datatable').dataTable({
				"sPaginationType": "full_numbers",
				"aaSorting":[[2, "desc"]],
				"bJQueryUI":true
			} );
		} );
	</script>

</head>
<body>

   	<div  id="data-table">
		<table cellpadding="0" cellspacing="0" border="0" id="datatable" class="display">
			<thead>
				<tr>
					<th>Numero de Docente</th>
					<th>Apellidos</th>
					<th>Nombre</th>
					<th>Contraseña</th>
					<th>Carrera</th>
					<th>Puesto</th>
					<th>*Acciones*</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if (@mysql_num_rows($result)>0){
						while ($row = mysql_fetch_row($result)){
				?>
					<tr>
						<td align="center"><?php echo $row[0]?></td>
						<td align="center"><?php echo $row[2]?></td>
						<td align="center"><?php echo $row[1]?></td>
						<td align="center"><?php echo $row[3]?></td>
						<td align="center"><?php echo $row[4]?></td>
						<td align="center"><?php echo $row[5]?></td>
						<td align="center"><a href="javascript:numdocente(<?php echo $row[0]; ?>)"><img class="in2" alt="" title=" Dar de Baja Usuario"/></a></td>
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