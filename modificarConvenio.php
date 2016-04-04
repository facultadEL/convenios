<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<script src="jquery-latest.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
	<title>Modificar Convenio</title>
	<style type="text/css">
		{font-family: Cambria }
			form {padding: 20px; border: 1px Solid #D8D8D8;background: #F2F2F2;}
			label {color: #336699;  font-family: Cambria; padding-left: .5em;}
			label.error {font-family: Cambria;float: none;vertical-align: top;color: red;padding-left: .5em;}
    </style>
		<script>
			$(document).ready(function(){
			
			$.validator.addClassRules("rango", {range:[0,6]});
			$.validator.addClassRules("min", {minlength: 8});
			$.validator.addClassRules("minimo", {minlength: 2});
			$.validator.addClassRules("numCuil", {minlength: 7});
			$.validator.addClassRules("digitoCuil", {minlength: 1});
			$.validator.addClassRules("anio", {minlength: 4});
			$.validator.addClassRules("caracteristica", {minlength: 3});
			$.validator.addClassRules("telFijo", {minlength: 6});
			
			$('form').validate();
			$("#commentForm").validate();
			
		});

		</script>
</head>

<body>
<?php
include_once "conexionBaseDatos.php";
$idConvenio = $_GET['idConvenio'];
if($idConvenio > 0){
	$convenios = pg_query("SELECT * FROM convenio WHERE $idConvenio = id_convenio");
	$row=pg_fetch_array($convenios,NULL,PGSQL_ASSOC);
	$folio = $row['folio'];
	$convenio = $row['nombre_convenio'];
	$empresa = $row['empresa'];
	$descrip = $row['descrip'];
	$fechafirma = $row['fechafirma'];
	$fechadesde = $row['fechadesde'];
	$fechahasta = $row['fechahasta'];
	$fechaEstado = $row['fechaestado'];
	$representada = $row['representada'];
	$especialidad = $row['especialidad'];
	$archivoPdf = $row['archivo'];
	$archivoWord = $row['archivo2'];
	$estado = $row['estado1'];
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
<form class="formModfConvenio" id="commentForm" action="guardarModificarConvenio.php" method="post" enctype="multipart/form-data">
<fieldset>
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Complete todos los campos del formulario</FONT></legend>
<table width="100%">
	<tr width="100%">
		<td width="100%" colspan="2">
			<input id="idConvenio" name="Convenio" type="hidden" value=<?php echo '"'.$idConvenio.'"';?>/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cname">Nombre: </label>
		</td>
		<td width="70%">
			<select id="cConvenio" name="tipoConvenio" size="1">
				<?php
					include_once "conexionBaseDatos.php";
					$consultaConvenio=pg_query("SELECT * FROM tipo_convenio");
					while($rowConvenio=pg_fetch_array($consultaConvenio,NULL,PGSQL_ASSOC)){
                                $id = $rowConvenio['id_tipo_convenio'];
								if($id == $convenio){
									$id = '"'.$id.'"';
									echo "<option value=".$id." selected>".$rowConvenio['nombre_tipo']."</option>"; 
								}else{
									$id = '"'.$id.'"';
									echo "<option value=".$id.">".$rowConvenio['nombre_tipo']."</option>"; 
								}
                            }
				?>
			</select>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cEmpresa">Empresa: </label>
		</td>
		<td width="70%">
			<input id="cEmpresa" name="empresa" type="text" value=<?php echo '"'.$empresa.'"'; ?> class="required" size="22"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cDescrip">Descripci&oacute;n: </label>
		</td>
		<td width="70%">
			<textarea id="cDescrip" name="Descrip" value="" cols="32" rows="3" class="required"><?php echo $descrip; ?></textarea>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cEspecialidad">Especialidad: </label>
		</td>
		<td width="70%">
			<select id="cEspecialidad" name="especialidad" size="1">
				<?php
					include_once "conexionBaseDatos.php";
					$consultaEsp=pg_query("SELECT * FROM especialidad");
					while($rowEsp=pg_fetch_array($consultaEsp,NULL,PGSQL_ASSOC)){
                                $id = $rowEsp['id_especialidad'];
								if($id == $especialidad){
									$id = '"'.$id.'"';
									echo "<option value=".$id." selected>".$rowEsp['nombre_especialidad']."</option>"; 
								}else{
									$id = '"'.$id.'"';
									echo "<option value=".$id.">".$rowEsp['nombre_especialidad']."</option>"; 
								}
                            }
				?>
			</select>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cRepresentada">Representada: </label>
		</td>
		<td width="70%">
			<input id="cRepresentada" name="representada" type="text" value=<?php echo '"'.$representada.'"'; ?> size="22" class="required"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cDia">Fecha de Firma: </label>
		</td>
		<td width="70%">
			<input id="cDia" name="fechaFirma" type="text"  value=<?php echo '"'.$fechafirma.'"'; ?>  size="22"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cDia">Fecha Desde: </label>
		</td>
		<td width="70%">
			<input id="cDia" name="fechaDesde" type="text"  value=<?php echo '"'.$fechadesde.'"'; ?>  size="22"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cDia">Fecha Hasta: </label>
		</td>
		<td width="70%">
			<input id="cDia" name="fechaHasta" type="text" placeholder="dd-mm-aaaa" value=<?php echo '"'.$fechahasta.'"'; ?>  size="22"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="100%" colspan="2">
			<input id="cFechaEstado" name="fechaEstadoViejo" type="hidden" value=<?php echo '"'.$fechaEstado.'"'; ?>  size="22"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="100%" colspan="2">
			<input id="cEstado" name="estadoviejo" type="hidden" value=<?php echo '"'.$estado.'"';?>/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cEstado">Estado: </label>
		</td>
		<td width="70%">
			<select id="cEstado" name="estado" size="1">
				<?php
					include_once "conexionBaseDatos.php";
					$consultaEstado=pg_query("SELECT * FROM estado1");
					while($rowEstado=pg_fetch_array($consultaEstado,NULL,PGSQL_ASSOC)){
                                $id = $rowEstado['id_estado1'];
								if($id == $estado){
									$id = '"'.$id.'"';
									echo "<option value=".$id." selected>".$rowEstado['nombre_estado']."</option>"; 
								}else{
									$id = '"'.$id.'"';
									echo "<option value=".$id.">".$rowEstado['nombre_estado']."</option>"; 
								}
                            }
				?>
			</select>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cFolio">Folio: </label>
		</td>
		<td width="70%">
			<input id="cFolio" name="folio" type="text" size="22" value=<?php echo '"'.$folio.'"'; ?> class="required"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cArchivo">Archivo PDF: </label>
		</td>
		<td width="70%">
			<input type="file" name="archivoPdf"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cArchivo">Archivo Word: </label>
		</td>
		<td width="70%">
			<input type="file" name="archivoWord"/>
		</td>
	</tr>
	<tr width="100%"><td colspan="2">&nbsp;</td></tr>
	<tr width="100%">
		<td colspan="2" align="center">
			<input class="submit" type="submit" value="Modificar"/>
			<a href="listadoConvenios.php"><input type="button" value="Atr&aacute;s"></a>
		</td>
	</tr>
</table>
	</fieldset>
</form>
</body>
</html>