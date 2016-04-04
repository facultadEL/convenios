<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<script src="jquery-latest.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
	<title>Convenio</title>
	<style type="text/css">
		{font-family: Cambria }
			#tabla {background: #F2F2F2;}
			label {float: left;font-family: Cambria;text-decoration: underline; text-transform: capitalize; color: #0B3861;font-weight:bold; padding-left: .5em;}
			l1 {font-family: Cambria;color: #424242; text-transform: capitalize;}
			l3 {font-family: Cambria;color: #424242; text-transform: capitalize; width: 13em;}
			a { text-decoration:none }
    </style>
	<script type="text/javascript">
		$(document).ready(function(){
			$('form').validate();
			$("#commentForm").validate();		
		});
		function abrir(url) { 
			open(url,'','top=150,left=200,width=500,height=300') ; 
		} 
	</script>
</head>
<body>
<?php
include_once "conexionBaseDatos.php";
$idConvenio = $_GET['idConvenio'];
if($idConvenio > 0){
	$convenios = pg_query("SELECT * FROM convenio full outer join especialidad on(especialidad.id_especialidad = convenio.especialidad) full outer join tipo_convenio on(tipo_convenio.id_tipo_convenio = convenio.nombre_convenio) full outer join estado1 on(estado1.id_estado1 = convenio.estado1) WHERE $idConvenio = id_convenio AND estado=TRUE AND especialidad = id_especialidad  AND nombre_convenio = id_tipo_convenio AND estado1 = id_estado1");
	$row=pg_fetch_array($convenios,NULL,PGSQL_ASSOC);
	$folio = $row['folio'];
	$convenio = $row['nombre_convenio'];
	$empresa = $row['empresa'];
	$descrip = $row['descrip'];
	$fechafirma = $row['fechafirma'];
	$fechadesde = $row['fechadesde'];
	$fechahasta = $row['fechahasta'];
	$fechaCarga = $row['fechacarga'];
	$fechaEstado = $row['fechaestado'];
	$estado = $row['estado1'];
	$representada = $row['representada'];
	$especialidad = $row['especialidad'];
}else{
	$folio = "";
	$nombre = 0;
	$empresa = "";
	$descrip = "";
	$fechafirma = "";
	$fechadesde = "";
	$fechahasta = "";
	$representada = "";
	$especialidad = 0;
}
?>
<fieldset id="tabla">
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Convenio</FONT></legend>
<form class="formVerConvenio" id="commentForm" method="post" >
<table align="center" width="100%" cellpadding="6">
	<tr width="100%" >
		<td width="30%">
			<label for="cname">Nombre: </label>
		</td>
		<td width="70%">
			<l1><?php
				include_once "conexionBaseDatos.php";
				$consultaConvenio=pg_query("SELECT * FROM tipo_convenio");
				while($rowConvenio=pg_fetch_array($consultaConvenio,NULL,PGSQL_ASSOC)){
					$id = $rowConvenio['id_tipo_convenio'];
					if($id == $convenio){
						echo $row['nombre_tipo']; 
					}
				}
			?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cEmpresa">Empresa: </label>
		</td>
		<td width="70%">
			<l1><?php echo $empresa?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cDescrip">Descripci&oacute;n: </label>
		</td>
		<td width="70%">
			<l1><?php echo $descrip; ?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cEspecialidad">Especialidad: </label>
		</td>
		<td width="70%">
			<l1><?php
				include_once "conexionBaseDatos.php";
				$consultaEsp=pg_query("SELECT * FROM especialidad");
				while($rowEsp=pg_fetch_array($consultaEsp,NULL,PGSQL_ASSOC)){
					$id = $rowEsp['id_especialidad'];
					if($id == $especialidad){
						echo $row['nombre_especialidad']; 
					}
				}
				?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cRepresentada">Representada: </label>
		</td>
		<td width="70%">
			<l1><?php echo $representada?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cDia">Fecha de Firma: </label>
		</td>
		<td width="70%">
			<l1><?php echo $fechafirma?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cDia">Fecha Desde: </label>
		</td>
		<td width="70%">
			<l1><?php echo $fechadesde?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cDia">Fecha Hasta: </label>
		</td>
		<td width="70%">
			<l1><?php echo $fechahasta?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cFecha">Fecha de Carga: </label>
		</td>
		<td width="70%">
			<l1><?php echo $fechaCarga?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cDia">Fecha Estado: </label>
		</td>
		<td width="70%">
			<l1><?php echo $fechaEstado?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cEstado">Estado: </label>
		</td>
		<td width="70%"><l1><?php
				include_once "conexionBaseDatos.php";
				$consultaEstado=pg_query("SELECT * FROM estado1");
				while($rowEstado=pg_fetch_array($consultaEstado,NULL,PGSQL_ASSOC)){
					$id = $rowEstado['id_estado1'];
					if($id == $estado){
						echo $row['nombre_estado']; 
					}
				}
				?></l1>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cFolio">Folio: </label>
		</td>
		<td width="70%">
			<l1><?php echo $folio?></l1>
		</td>
	</tr>
</table>
</form>
<p>
<?php
	echo '<a href="'.$row['archivo'].'"><input type="image" src="pdf.png" width="50" height="50" value="Opciones" /></a>';		
	echo '<a href="'.$row['archivo2'].'"><input type="image" src="word.png" width="50" height="50" value="Opciones" /></a>';
	echo '<a href="eliminarConvenio.php?idConvenio='.$idConvenio.'"><input type="image" src="eliminar.png" width="50" height="50" value="Opciones" /></a>';
?>
</p>
<p>
	<a href="listadoConvenios.php"><input type="button" value="Atr&aacute;s"></a>
</p>
</fieldset>
</body>
</html>