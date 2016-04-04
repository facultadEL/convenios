
<?php
$nombre_tipo = $_REQUEST['nombreConvenio'];
$id_tipo_convenio = $_REQUEST['Convenio'];


include 'conexionBaseDatos.php';


pg_query("UPDATE tipo_convenio SET nombre_tipo='$nombre_tipo' WHERE id_tipo_convenio = $id_tipo_convenio;");
echo '<script type="text/javascript">alert("Se modificaron correctamente los datos");
									 window.location="listadoTipoConvenios.php"
	 </script>';
//echo '<script type="text/javascript"></script>';
?>
