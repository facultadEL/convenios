<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<?php
include 'conexionBaseDatos.php';
$folio = $_REQUEST['folio'];
$convenio = $_REQUEST['tipoConvenio'];
$empresa = $_REQUEST['empresa'];
$descrip = $_REQUEST['Descrip'];
$fechafirma = $_REQUEST['fechaFirma'];
$fechadesde = $_REQUEST['fechaDesde'];
$fechahasta = $_REQUEST['fechaHasta'];
$fechaEstadoViejo = $_REQUEST['fechaEstadoViejo'];
$representada = $_REQUEST['representada'];
$especialidad = $_REQUEST['especialidad'];
$id_convenio = $_REQUEST['Convenio'];
$estadoactual = $_REQUEST['estadoviejo'];
$estadonuevo = $_REQUEST['estado'];




$nombre_archivoPdf = $_FILES['archivoPdf']['name'];
$tipo_archivo = $_FILES['archivoPdf']['type'];	
$tamano_archivo = $_FILES['archivoPdf']['size'];
$filePdf = $_FILES['archivoPdf']['tmp_name'];

$nombre_archivoWord = $_FILES['archivoWord']['name'];
$tipo_archivo = $_FILES['archivoWord']['type'];	
$tamano_archivo = $_FILES['archivoWord']['size'];
$fileWord = $_FILES['archivoWord']['tmp_name'];

$ftp_server = "190.114.198.126";
$ftp_user_name = "fernandoserassioextension";
$ftp_user_pass = "fernando2013";
$destino_Pdf = "web/convenios/archivos/".$nombre_archivoPdf;
$destinoPdf = "archivos/".$nombre_archivoPdf;
$destino_Word = "web/convenios/archivos/".$nombre_archivoWord;
$destinoWord = "archivos/".$nombre_archivoWord;
$vacio = "archivos/";

pg_query("UPDATE convenio SET folio='$folio', nombre_convenio='$convenio', empresa='$empresa', descrip='$descrip', especialidad='$especialidad', representada='$representada',fechafirma='$fechafirma', fechadesde='$fechadesde', fechahasta='$fechaHasta' WHERE id_convenio = $id_convenio;");

$convenio = pg_query("SELECT * FROM convenio WHERE id_convenio = $id_convenio;");
$row=pg_fetch_array($convenio,NULL,PGSQL_ASSOC);

if ($estadoactual <> $estadonuevo){
	$fechaEstado = date("d").'-'.date("m").'-'.date("Y");
	pg_query("UPDATE convenio SET fechaestado='$fechaEstado', estado1='$estadonuevo' WHERE id_convenio = $id_convenio; ");
}else{
	pg_query("UPDATE convenio SET fechaestado='$fechaEstadoViejo', estado1='$estadoactual' WHERE id_convenio = $id_convenio; ");
}



$pdf = $row['archivo'];
$word = $row['archivo2'];

//conexión
$conn_id = ftp_connect($ftp_server); 
// logeo
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 


//probando conexion
//if ((!$conn_id) || (!$login_result)){ 
//       echo "Conexión al FTP con errores!";
//       echo "Intentando conectar a $ftp_server for user $ftp_user_name"; 
//       exit; 
//   }else{
//       echo "Conectado a $ftp_server, for user $ftp_user_name";
//   }

$resultadoPdf = explode(".", $nombre_archivoPdf);
$totalPdf=count($resultadoPdf);
$ip = $totalPdf - 1;

	
		if ($destinoPdf != $vacio){
			//if ($pdf == $vacio){
				if ($resultadoPdf[$ip] == "pdf") {
					pg_query("UPDATE convenio SET archivo='$destinoPdf' WHERE id_convenio = $id_convenio; ");
					$uploadPdf = ftp_put($conn_id, $destino_Pdf, $filePdf, FTP_BINARY);
				}else{
					echo '<script type="text/javascript">alert("El archivo subido no es válido. Suba un PDF");</script>';
				}
			//}else{
				//echo '<script type="text/javascript">alert("El archivo PDF ya existe");</script>';	
			//}
			}
		
	

$resultadoWord = explode(".", $nombre_archivoWord);
$totalWord=count($resultadoWord);
$iw = $totalWord - 1;



	// archivo a copiar/subir
   	if ($destinoWord != $vacio){
		//if ($word == $vacio){
			if ($resultadoWord[$iw] == "doc" || $resultadoWord[$iw] == "docx") {
				pg_query("UPDATE convenio SET archivo2='$destinoWord' WHERE id_convenio = $id_convenio; ");
				$uploadWord = ftp_put($conn_id, $destino_Word, $fileWord, FTP_BINARY); 
			}else{
				echo '<script type="text/javascript">alert("El archivo subido no es válido. Suba un .doc o .docx");</script>';
			}
		//}else{
			//echo '<script type="text/javascript">alert("El archivo word ya existe");</script>';	
		//}
	}


// estado de subida/copiado
//if (!$uploadPdf) { 
//       echo "Error al subir el archivo!";
//   } else {
//       echo "Archivo $filePdf se ha subido exitosamente a $ftp_server en $destino_Pdf";
//   }

// cerramos
ftp_close($conn_id);



echo '<script type="text/javascript">alert("Se modificaron correctamente los datos");
									 window.location="listadoConvenios.php"
	 </script>';
//echo '<script type="text/javascript"></script>';
?>
