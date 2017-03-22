<?php
    require 'metodos.php';
    conexionsql();
    $sql="SELECT * FROM liberacion";
    @mysql_query("SET NAMES 'utf8'");
	$result = @mysql_query($sql);
 	if(isset($_GET['matricula']))
	{
		$mart=$_GET['matricula'];
		$sql="DELETE FROM estancia1 WHERE matricula='$mart'";
		if(@mysql_query($sql)){
         header("Location: Administrador_index.php#!/liberacion");
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
		if(confirm('¿Estas seguro de eliminar este registro?')){
				window.location.href='tabla.php?matricula='+matricula;
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
					<th>Nombre</th>
					<th>Carrera</th> 
					<th>Estancia 1</th>
					<th>Estancia 2</th>
					<th>Servicio Social</th>
					<th>Estadía</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if (@mysql_num_rows($result)>0){
						while ($row = mysql_fetch_row($result)){
				?>
					<tr>
						<td ><?php echo $row[0]?></td>
						<td><?php echo $row[1]?></td>
						<td><?php echo $row[2]?></td>
						<td align="center"><img src="<?php echo $row[4]?>"></td>
						<td align="center"><img src="<?php echo $row[5]?>"></td>
						<td align="center"><img src="<?php echo $row[6];?>"></td>
						<td align="center"><img src="<?php echo $row[3]?>"></td>
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