<html>
<head>
<title> Listado Convenios </title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<style type="text/css">
	label {font-family: Cambria; text-transform: capitalize; padding: .5em; color: #0080FF;}
	#tabla {background: #F2F2F2;}
	#titulo3 { border-top: 2px solid #BDBDBD;border-bottom: 2px solid #BDBDBD;padding: 3px;}
	l1 {font-family: Cambria;color: #0B615E; text-transform: capitalize; font-size: 1.5em;}
	l2 {font-family: Cambria;color: #424242; text-transform: capitalize; padding: .12em;}
</style>
</head>
<body link="#000000" vlink="#000000" alink="#FFFFFF">
<form class="formBuscador" id="commentForm" name="buscador" action="busqueda.php" method="post">
		<center>
		<input id="cPalabra" type="text" name="palabra" value="" class="required"/>
		<p>
		<input type="submit" name="buscar" value="Buscar"/>
		</p>
		</center>
	</form>
<?php

include_once 'conexionBaseDatos.php';
$val = pg_query('SELECT * FROM convenio inner join especialidad on(especialidad.id_especialidad = convenio.especialidad) inner join tipo_convenio on(tipo_convenio.id_tipo_convenio = convenio.nombre_convenio) WHERE estado=TRUE AND especialidad = id_especialidad  AND nombre_convenio = id_tipo_convenio ORDER BY id_convenio DESC');
echo '<table align="center" cellspacing="1" cellpadding="4" width="100%" border="1" bgcolor=#585858 id="tabla">';
	echo '<tr bgcolor="#FFFFFF" width="100%">';
		echo '<td id="titulo3" colspan="5" align="center"><l1>Listado de Convenios</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#000000" width="100%">';
		echo '<td align="center" width="25%"><strong><label>Tipo Convenio</label></strong></td>';
		echo '<td align="center" width="20%"><strong><label>Empresa</label></strong></td>';
		echo '<td align="center" width="25%"><strong><label>Representada</label></strong></td>';
		echo '<td align="center" width="25%"><strong><label>Folio</label></strong></td>';
		echo '<td align="center" width="5%"><strong><label>Ver Convenio</label></strong></td>';
	echo '</tr>';
while($row=pg_fetch_array($val,NULL,PGSQL_ASSOC)){
	echo '<tr>';
		echo '<td align="center"><a href="modificarConvenio.php?idConvenio='.$row['id_convenio'].'"style="text-decoration:none"><l2>'.$row['nombre_tipo'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['empresa'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['representada'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['folio'].'</l2></td>';
		echo '<td align="center"><a href="verConvenio.php?idConvenio='.$row['id_convenio'].'"><input type="image" src="ver.png" width="40" height="40" value="Opciones" /></a></td>';
	echo '</tr>';
}
echo '</table>';
?>
<p>
<a href="buscador.php"><center><input type="button" value="Atr&aacute;s"></center></a>
</p>
</body>
</html>