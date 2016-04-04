<html>
<head>
	<title> Buscador </title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<script src="jquery-latest.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
	<title>Registro de Convenio</title>
	<style type="text/css">
		{font-family: Cambria }
			form {padding: 20px; border: 1px Solid #D8D8D8;background: #F2F2F2;}
			label {width: 10em;color: #336699; float: left;margin-right: 30px; font-family: Cambria; padding-left: .5em;}
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
<form class="formBuscador" id="commentForm" name="buscador" action="busqueda.php" method="post">
<center>
	<table>
		<tr>
			<td>
				<input id="cPalabra" type="text" name="palabra" value="" class="required"/>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="buscar" value="Buscar1"/>
			</td>
		</tr>
	</table>
</center>
</form>
</body>
</html>