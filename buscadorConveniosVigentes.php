<html>
<head>
	<title> Buscador Convenios Vigentes </title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<script src="jquery-latest.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
	<title>Registro de Convenio</title>
	<style type="text/css">
		{font-family: Cambria }
			form {padding: 20px; border: 1px Solid #D8D8D8;background: #F2F2F2;}
			label {color: #336699; font-family: Cambria;padding-left: .5em; }
			label.error {font-family: Cambria;float: none;vertical-align: top;color: red;}
    </style>
	<script>
		$(document).ready(function(){
			
		$('form').validate();
		$("#commentForm").validate();
			
		});

	</script>
</head>
<body>
<form class="formBuscador" id="commentForm" name="buscador" action="listadoConveniosVigentes.php" method="post">
<center>
	<table width="100%">
		<tr width="100%">
			<td width="42%" align="center">
				<label for="cname">Buscador Convenios Vigentes: </label>
			</td>
			<td width="58%" align="center">
				<input id="cPalabra" type="text" name="palabra" value="" size="40" class="required"/>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr width="100%">
			<td align="center" colspan="2">
				<input type="submit" name="buscar" value="Buscar"/>
			</td>
		</tr>
	</table>
</center>
</form>
</body>
</html>