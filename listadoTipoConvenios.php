<html>
<head>
<title> Listado Tipo Convenios </title>
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
<?php

include_once 'conexionBaseDatos.php';
$val = pg_query('SELECT * FROM tipo_convenio');
echo '<table align="center" cellspacing="1" cellpadding="4" width="100%" border="1" bgcolor=#585858 id="tabla">';
	echo '<tr bgcolor="#FFFFFF" width="100%">';
		echo '<td id="titulo3" colspan="2" align="center"><l1>Listado Tipo de Convenios</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#000000" width="100%">';
		echo '<td align="center" width="70%"><strong><label>Tipo Convenio</label></strong></td>';
		echo '<td align="center" width="30%"><strong><label>Modificar</label></strong></td>';
		//echo '<td align="center"><font color="#FFFFFF"><strong>Eliminar</strong></td>';
	echo '</tr>';
while($row=pg_fetch_array($val,NULL,PGSQL_ASSOC)){
	echo '<tr>';
		echo '<td align="center"><l2>'.$row['nombre_tipo'].'</l2></td>';
		echo '<td align="center"><a href="modificarTipoConvenio.php?idTipoConvenio='.$row['id_tipo_convenio'].'"><input type="image" src="editar.png" width="40" height="40" value="Opciones" /></a></td>';
		//echo '<td align="center"><a href="eliminarTipoConvenio.php?idConvenio='.$row['id_convenio'].'"><input type="image" src="eliminar.ico" width="40" height="40" value="Opciones" /></a></td>';
	echo '</tr>';
}
echo '</table>';
?>
<p>
<a href="listadoConvenios.php"><center><input type="button" value="Atr&aacute;s"></center></a>
</p>
</body>
</html>