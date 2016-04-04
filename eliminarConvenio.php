
<?php
include 'conexionBaseDatos.php';

$id_convenio = $_REQUEST['idConvenio'];

pg_query("UPDATE convenio SET estado=FALSE WHERE id_convenio = $id_convenio");

echo '<script type="text/javascript">alert("Se modificaron correctamente los datos");
									 window.location="listadoConvenios.php"
	 </script>';
?>
