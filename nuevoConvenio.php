<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<script src="jquery-latest.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
	<title>Registro de Convenio</title>
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
	
	<script>
	$(document).ready(function(){
		$("#mostrar").click(function(event){
		event.preventDefault();
		$("#capaefectos").show(3000);
		});
	});
	</script>
</head>

<body>
<?php
$fechaCarga  = date("d").'-'.date("m").'-'.date("Y");
$fechaEstado  = date("d").'-'.date("m").'-'.date("Y");
?>
<form class="formAltaConvenio" id="commentForm" action="guardarConvenio.php" method="post" enctype="multipart/form-data">
<fieldset>
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Complete todos los campos del formulario</FONT></legend>
<table width="100%">
	<tr width="100%">
		<td width="100%" colspan="2">
			<input id="cFechaCarga" name="fechaCarga" type="hidden" value=<?php echo '"'.$fechaCarga.'"'; ?>  size="22"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="100%" colspan="2">
			<input id="cFechaEstado" name="fechaEstado" type="hidden" value=<?php echo '"'.$fechaEstado.'"'; ?>  size="22"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cname">Convenio: </label>
		</td>
		<td width="70%">
			<select id="cConvenio" name="tipoConvenio" size="1">
				<option value="0">Seleccione el convenio</option>
				<?php
					include_once "conexionBaseDatos.php";
					$consultaConvenio=pg_query("select * FROM tipo_convenio");
					while($rowConvenio=pg_fetch_array($consultaConvenio)){
						echo '<option value="'.$rowConvenio['id_tipo_convenio'].'">'.$rowConvenio['nombre_tipo'].'</option>';
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
			<input id="cEmpresa" name="empresa" type="text" value="" class="required" size="25"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cDescrip">Descripci&oacute;n: </label>
		</td>
		<td width="70%">
			<textarea id="cDescrip" name="Descrip" value="" cols="20" class="required"></textarea>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cEspecialidad">Especialidad: </label>
		</td>
		<td width="70%">
			<select id="cEspecialidad" name="especialidad" size="1">
				<option value="0">Seleccione especialidad</option>
				<?php
					include_once "conexionBaseDatos.php";
					$consultaEspecialidad=pg_query("select * FROM especialidad");
					while($rowEspecialidad=pg_fetch_array($consultaEspecialidad)){
						echo '<option value="'.$rowEspecialidad['id_especialidad'].'">'.$rowEspecialidad['nombre_especialidad'].'</option>';
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
			<input id="cRepresentada" name="representada" type="text" value="" size="25" class="required"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cDia">Fecha de Firma: </label>
		</td>
		<td width="70%">
			<input id="cDia" name="dia" type="text"  value="" placeholder="dd" class="minimo" maxlength="2" size="3"/>
			<input id="cMes" name="mes" type="text"  value="" placeholder="mm" class="minimo" maxlength="2" size="3"/>
			<input id="cAnio" name="anio" type="text"  value="" placeholder="aaaa" class="anio" maxlength="4" size="5"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cDia">Fecha Desde: </label>
		</td>
		<td width="70%">
			<input id="cDia1" name="dia1" type="text"  value="" placeholder="dd" class="minimo" maxlength="2" size="3"/>
			<input id="cMes1" name="mes1" type="text"  value="" placeholder="mm" class="minimo" maxlength="2" size="3"/>
			<input id="cAnio1" name="anio1" type="text"  value="" placeholder="aaaa" class="anio" maxlength="4" size="5"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cDia">Fecha Hasta: </label>
		</td>
		<td width="70%">
			<input id="cDia1" name="dia2" type="text"  value="" placeholder="dd" class="minimo" maxlength="2" size="3"/>
			<input id="cMes1" name="mes2" type="text"  value="" placeholder="mm" class="minimo" maxlength="2" size="3"/>
			<input id="cAnio1" name="anio2" type="text"  value="" placeholder="aaaa" class="anio" maxlength="4" size="5"/>
		</td>
	</tr>
	<tr width="100%">
		<td width="30%">
			<label for="cEstado">Estado: </label>
		</td>
		<td width="70%">
			<select id="cEstado" name="estado" size="1">
				<option value="0">Seleccione estado</option>
				<?php
					include_once "conexionBaseDatos.php";
					$consultaEstado=pg_query("select * FROM estado1");
					while($rowEstado=pg_fetch_array($consultaEstado)){
						echo '<option value="'.$rowEstado['id_estado1'].'">'.$rowEstado['nombre_estado'].'</option>';
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
			<input id="cFolio" name="folio" type="text" size="25" value="" class="required"/>
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
			<input class="submit" type="submit" value="Guardar"/>
			<a href="http://extension.frvm.utn.edu.ar/index.php/cens-451"><input type="button" value="Atr&aacute;s"></a>
		</td>
	</tr>
</table>
</fieldset>
</form>
</body>
</html>