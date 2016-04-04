<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<?php
include_once "conexionBaseDatos.php";
//$palabra = UPPER('%{$_POST['palabra']}%');
$resultado = pg_query("SELECT * FROM convenio full outer join especialidad on(especialidad.id_especialidad = convenio.especialidad) full outer join tipo_convenio on(tipo_convenio.id_tipo_convenio = convenio.nombre_convenio) WHERE estado=TRUE AND especialidad = id_especialidad AND nombre_convenio = id_tipo_convenio AND
   UPPER(nombre_tipo)          LIKE UPPER('%{$_POST['palabra']}%') 
or UPPER(nombre_especialidad)  LIKE UPPER('%{$_POST['palabra']}%')
or UPPER(empresa)      		   LIKE UPPER('%{$_POST['palabra']}%') 
or UPPER(descrip)              LIKE UPPER('%{$_POST['palabra']}%') 
or UPPER(representada)         LIKE UPPER('%{$_POST['palabra']}%') 
or UPPER(folio)                LIKE UPPER('%{$_POST['palabra']}%') 
or UPPER(fechafirma)           LIKE UPPER('%{$_POST['palabra']}%')
or UPPER(fechadesde)           LIKE UPPER('%{$_POST['palabra']}%') 
or UPPER(fechahasta)           LIKE UPPER('%{$_POST['palabra']}%') ");
//if ($row=pg_fetch_array($resultado,NULL,PGSQL_ASSOC)){
	echo '<table align="center" cellspacing="1" cellpadding="2" border="1" bgcolor=#585858 id="tabla">';
	echo '<tr bgcolor="#000000">';
		echo '<td align="center"><font color="#FFFFFF"><strong>Tipo Convenio</strong></td>';
		echo '<td align="center"><font color="#FFFFFF"><strong>Empresa</strong></td>';
		echo '<td align="center"><font color="#FFFFFF"><strong>Representada</strong></td>';
		echo '<td align="center"><font color="#FFFFFF"><strong>Folio</strong></td>';
		echo '<td align="center"><font color="#FFFFFF"><strong>Ver Convenio</strong></td>';
	echo '<tr>';
while($row=pg_fetch_array($resultado,NULL,PGSQL_ASSOC)){
if($row['estado']=='t'){
echo '<tr>';
		echo '<td align="center"><a href="modificarConvenio.php?idConvenio='.$row['id_convenio'].'"style="text-decoration:none"><font color="#FFFFFF">'.$row['nombre_tipo'].'</font></td>';
		echo '<td align="center"><font color="#FFFFFF">'.$row['empresa'].'</font></td>';
		echo '<td align="center"><font color="#FFFFFF">'.$row['representada'].'</font></td>';
		echo '<td align="center"><font color="#FFFFFF">'.$row['folio'].'</font></td>';
		echo '<td align="center"><a href="verConvenio.php?idConvenio='.$row['id_convenio'].'"><input type="image" src="ver.png" width="40" height="40" value="Opciones" /></a></td>';
	echo '<tr>';
	}
}
//}else{
//	echo '<script language="JavaScript">
//		alert("No hay resultados");
//		location ="buscador.php";
//		</script>';
//}
echo '</table>';
?>
<p>
<a href="listadoConvenios.php"><center><input type="button" value="Atr&aacute;s"></center></a>
</p>