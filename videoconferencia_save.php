<?php include("funciones.php"); ?>
<?php
$videoconferencia_id = ( isset($_POST['videoconferencia_id']) )? $_POST['videoconferencia_id'] : '';

$tp       = ( isset($_POST['tp'      ]) )? $_POST['tp'      ] : '';
$lugar    = ( isset($_POST['lugar'   ]) )? $_POST['lugar'   ] : '';
$fecha    = ( isset($_POST['fecha'   ]) )? $_POST['fecha'   ] : '';
$hora     = ( isset($_POST['hora'    ]) )? $_POST['hora'    ] : '';

$solicitante         = ( isset($_POST['solicitante'         ]) )? $_POST['solicitante'         ] : '';
$sede_id_solicitante = ( isset($_POST['sede_id_solicitante' ]) )? $_POST['sede_id_solicitante' ] : '';
$nro_expediente      = ( isset($_POST['nro_expediente'      ]) )? $_POST['nro_expediente'      ] : '';
$oficio              = ( isset($_POST['oficio'              ]) )? $_POST['oficio'              ] : '';
$estado              = ( isset($_POST['estado'              ]) )? $_POST['estado'              ] : '';
$detalles            = ( isset($_POST['detalles'            ]) )? $_POST['detalles'            ] : '';

$type_edit = ( isset($_POST['type_edit']) )? $_POST['type_edit'] : '';

//enlace a la base de datos
$db_link = get_db_link();

if ($videoconferencia_id==0) {
  //sacar los nombres de las sedes
  $sedes_codigos_in = str_replace(',', "','", $lugar);
  $sedes_codigos_in = "'".$sedes_codigos_in."'";

  $sql = "
  SELECT GROUP_CONCAT(DISTINCT nombre SEPARATOR ',') sedes_nombres FROM sedes s
  WHERE codigo IN (%s)
  ;
  ";
  $sql = sprintf($sql, $sedes_codigos_in); //echo $sql; exit();
  $resultado = do_query( $db_link, $sql );

  while ($row = mysqli_fetch_object($resultado)) {
    $sedes_nombres=$row->sedes_nombres;
  }

  $sql = "
  INSERT INTO `videoconferencias` (`fecha`, `hora`, `sede_id_solicitante`, `solicitante`, `nro_expediente`, `sedes_in`, `sedes_nombres`, `estado`, `detalles`) VALUES ('%s', '%s', %d, '%s', '%s', '%s', '%s', '%s', '%s');
  ";
  $sql = sprintf($sql, $fecha, $hora, $sede_id_solicitante, $solicitante, $nro_expediente, $lugar, $sedes_nombres, 'PENDIENTE', $detalles);
  //echo $sql; exit();
  $resultado = do_query( $db_link, $sql );

  $sql = "
  SELECT videoconferencia_id FROM videoconferencias ORDER BY videoconferencia_id DESC LIMIT 1;
  ";
  $resultado = do_query( $db_link, $sql );

  while ($videoconferencia = mysqli_fetch_object($resultado)) {
    $videoconferencia_id=$videoconferencia->videoconferencia_id;
  }
  
  $location = 'Location: constancia.php?id='.$videoconferencia_id;
} else {
  if ($type_edit == 'quick') {
    $sql = "
    UPDATE `videoconferencias` SET `solicitante` = '%s', `nro_expediente` = '%s', `estado` = '%s', `detalles` = '%s' WHERE videoconferencia_id = %d;
    ";
    $sql = sprintf($sql, $solicitante, $nro_expediente, $estado, $detalles, $videoconferencia_id);
    //echo $sql; exit();
    $resultado = do_query( $db_link, $sql );
  } else {
    //
  }

  $location = 'Location: agenda.php?fecha='.$fecha;
}

//upload del PDF si lo hubiese
if( file_exists($_FILES['oficio']['tmp_name']) || is_uploaded_file($_FILES['oficio']['tmp_name'])) {
  //datos del archivo
  $dir_subida = './oficios/';
  $fichero_subido = $dir_subida . $videoconferencia_id . '.pdf';

  //delete if exists file
  if( file_exists( $fichero_subido ) ) {
    unlink($fichero_subido);
  }

  if (move_uploaded_file($_FILES['oficio']['tmp_name'], $fichero_subido)) {
      //fine
  } else {
      print_r($_FILES);
  }
}

header($location);
?>