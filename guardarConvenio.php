<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<?php
include_once "conexionBaseDatos.php";
$folio = $_REQUEST['folio'];
$convenio = $_REQUEST['tipoConvenio'];
$empresa = $_REQUEST['empresa'];
$descrip = $_REQUEST['Descrip'];
$dia = $_REQUEST['dia'];
$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];
$dia1 = $_REQUEST['dia1'];
$mes1 = $_REQUEST['mes1'];
$anio1 = $_REQUEST['anio1'];
$dia2 = $_REQUEST['dia2'];
$mes2 = $_REQUEST['mes2'];
$anio2 = $_REQUEST['anio2'];
$representada = $_REQUEST['representada'];
$especialidad = $_REQUEST['especialidad'];
$estado = $_REQUEST['estado'];
$fechaFirma=$dia.'-'.$mes.'-'.$anio;
$fechaDesde=$dia1.'-'.$mes1.'-'.$anio1;
$fechaHasta=$dia2.'-'.$mes2.'-'.$anio2;
$fechaCarga1 = $_REQUEST['fechaCarga'];
$fechaEstado1 = $_REQUEST['fechaEstado'];

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
if ($nombre_archivoPdf <> NULL){
	if ($resultadoPdf[$ip] == "pdf") {
		// archivo a copiar/subir
				$uploadPdf = ftp_put($conn_id, $destino_Pdf, $filePdf, FTP_BINARY);
			}else{
		echo '<script type="text/javascript">alert("El archivo subido no es válido. Suba un PDF");</script>';
	}
}

$resultadoWord = explode(".", $nombre_archivoWord);
$totalWord=count($resultadoWord);
$iw = $totalWord - 1;
if ($nombre_archivoWord <> NULL){
if ($resultadoWord[$iw] == "doc" || $resultadoWord[$iw] == "docx") {
	// archivo a copiar/subir
			$uploadWord = ftp_put($conn_id, $destino_Word, $fileWord, FTP_BINARY); 
		}else{
	echo '<script type="text/javascript">alert("El archivo subido no es válido. Suba un .doc o .docx");</script>';
}
}


// cerramos
ftp_close($conn_id);

pg_query("INSERT INTO convenio(nombre_convenio,empresa,descrip,especialidad,representada,folio,fechafirma,fechadesde,fechahasta,archivo,archivo2,estado,estado1,fechacarga,fechaestado)VALUES('$convenio','$empresa','$descrip','$especialidad','$representada','$folio','$fechaFirma','$fechaDesde','$fechaHasta','$destinoPdf','$destinoWord',TRUE,'$estado','$fechaCarga1','$fechaEstado1')"); 
$variable = pg_query("SELECT id_convenio FROM convenio ORDER BY id_convenio DESC LIMIT 1");
while($row=pg_fetch_array($variable,NULL,PGSQL_ASSOC)){
$idConvenio = $row['id_convenio'];
}
$contador = $idConvenio + 1;
pg_query("UPDATE convenio SET fechacarga='$fechaCarga1', fechaestado='$fechaEstado1'  WHERE id_convenio = $contador; ");

		echo '<script language="JavaScript"> 
			alert("Los datos se guardaron correctamente.");
			window.location="listadoConvenios.php";
			</script>';	
?>