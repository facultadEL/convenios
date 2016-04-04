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
<?php
include_once "conexionBaseDatos.php";
//$palabra = UPPER('%{$_POST['palabra']}%');
$resultado = pg_query("SELECT * FROM convenio full outer join especialidad on(especialidad.id_especialidad = convenio.especialidad) full outer join tipo_convenio on(tipo_convenio.id_tipo_convenio = convenio.nombre_convenio) WHERE  especialidad = id_especialidad AND nombre_convenio = id_tipo_convenio  AND
   UPPER(nombre_tipo)          LIKE UPPER('%{$_POST['palabra']}%') 
or UPPER(nombre_especialidad)  LIKE UPPER('%{$_POST['palabra']}%')
or UPPER(empresa)      		   LIKE UPPER('%{$_POST['palabra']}%') 
or UPPER(descrip)              LIKE UPPER('%{$_POST['palabra']}%') 
or UPPER(representada)         LIKE UPPER('%{$_POST['palabra']}%') 
or UPPER(folio)                LIKE UPPER('%{$_POST['palabra']}%') 
or UPPER(fechafirma)           LIKE UPPER('%{$_POST['palabra']}%') 
or UPPER(fechadesde)           LIKE UPPER('%{$_POST['palabra']}%') 
or UPPER(fechahasta)           LIKE UPPER('%{$_POST['palabra']}%') ");
echo '<table align="center" cellspacing="1" cellpadding="4" border="1" bgcolor=#585858 id="tabla">';
	echo '<tr bgcolor="#FFFFFF">';
		echo '<td id="titulo3" colspan="5" align="center"><l1>Listado de Convenios</l1></td>';
	echo '</tr>';
	echo '<tr bgcolor="#000000">';
		echo '<td align="center"><strong><label>Tipo Convenio</label></strong></td>';
		echo '<td align="center"><strong><label>Empresa</label></strong></td>';
		echo '<td align="center"><strong><label>Representada</label></strong></td>';
		echo '<td align="center"><strong><label>Folio</label></strong></td>';
		echo '<td align="center"><strong><label>Ver Convenio</label></strong></td>';
	echo '</tr>';
while($row=pg_fetch_array($resultado,NULL,PGSQL_ASSOC)){
$fechaHasta = $row['fechahasta'];
$fechaHoy = date('d').'-'.date('m').'-'.date('Y');
if ($fechaHasta == '' || $fechaHasta < $fechaHoy){
if($row['estado']=='t'){
echo '<tr>';
		echo '<td align="center"><a href="modificarConvenio.php?idConvenio='.$row['id_convenio'].'"style="text-decoration:none"><l2>'.$row['nombre_tipo'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['empresa'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['representada'].'</l2></td>';
		echo '<td align="center"><l2>'.$row['folio'].'</l2></td>';
		echo '<td align="center"><a href="verConvenio.php?idConvenio='.$row['id_convenio'].'"><input type="image" src="ver.png" width="40" height="40" value="Opciones" /></a></td>';
echo '</tr>';
	}
	}
}
echo '</table>';
?>
<p>
<a href="buscadorConveniosVigentes.php"><center><input type="button" value="Atr&aacute;s"></center></a>
</p>
</body>
</html>