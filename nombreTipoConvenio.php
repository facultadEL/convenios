<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<script src="jquery-latest.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
	<title>Registro de Tipo de Convenio</title>
	<style type="text/css">
		{font-family: Cambria }
			form {padding: 20px; border: 1px Solid #D8D8D8;background: #F2F2F2;}
			label {color: #336699;  font-family: Cambria; padding-left: .5em;}
			label.error {font-family: Cambria;float: none;vertical-align: top;color: red;padding-left: .5em;}
    </style>
		<script>
			$(document).ready(function(){			
			$('form').validate();
			$("#commentForm").validate();			
		});
		</script>
</head>
<body>
<form class="formNomTipoConvenio" id="commentForm" action="guardarNombreTipoConvenio.php" method="post" >
<fieldset>
<legend><FONT face="Cambria" size="4" color="#6E6E6E">Registro de un tipo de Convenio</FONT></legend>
<table width="100%">
	<tr width="100%">
		<td width="30%" align="center">
			<label for="cname">Tipo Convenio: </label>
		</td>
		<td width="70%">
			<input id="cname" name="nombreConvenio" type="text" value="" class="required" size="50" maxlength="40"/>
		</td>
	</tr>
	<tr width="100%"><td colspan="2">&nbsp;</td></tr>
	<tr width="100%">
		<td colspan="2" align="center">
			<input class="submit" type="submit" value="Guardar"/>
			<a href="listadoConvenios.php"><input type="button" value="Atr&aacute;s"></a>
		</td>
	</tr>
</table>
</fieldset>
</form>
</body>
</html>