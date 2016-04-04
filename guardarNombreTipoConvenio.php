<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<?php
include_once "conexionBaseDatos.php";

$nombre = $_REQUEST['nombreConvenio'];

$convenio = "INSERT INTO tipo_convenio(nombre_tipo)VALUES('$nombre')"; 

$error=0;

	if (!pg_query($cnx,$convenio)) 
	 {
     $errorpg = pg_last_error($cnx);
     $termino = "ROLLBACK";
     $error=1;
	 }
     else
     {
     $termino = "COMMIT";
     }
   pg_query($termino);
		
if ($error==1)

		{
		echo '<script language="JavaScript"> 			alert("Los datos no se guardaron correctamente. Pongase en contacto con el administrador");</script>';
		}else
		{
		echo '<script language="JavaScript"> 
			alert("Los datos se guardaron correctamente.");</script>';
			}
		echo '<script language="JavaScript"> 
		location ="listadoTipoConvenios.php";
		</script>';
		

?>