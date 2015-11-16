<?php include("funciones.php"); ?>
<?php
$videoconferencia_id = ( isset($_GET['id']) )? $_GET['id'] : '0';

$fecha = ( isset($_GET['fecha' ]) )? $_GET['fecha' ] : '';

//enlace a la base de datos
$db_link = get_db_link();

if ($videoconferencia_id!=0) {
  $sql = "
  DELETE FROM `videoconferencias` WHERE videoconferencia_id = %d;
  ";
  $sql = sprintf($sql, $videoconferencia_id);
  //echo $sql; exit();
  $resultado = do_query( $db_link, $sql );

  //eliminación del PDF si lo hubiese
  $dir_subida = './oficios/';
  $fichero_subido = $dir_subida . $videoconferencia_id . '.pdf';
  if( file_exists( $fichero_subido ) ) {
    unlink($fichero_subido);
  }
 
}
header('Location: agenda.php?fecha='.$fecha);
?>