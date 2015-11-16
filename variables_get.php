<?php
$solicita = ( isset($_GET['solicita']) )? $_GET['solicita'] : '';
$tp       = ( isset($_GET['tp'      ]) )? $_GET['tp'      ] : '';
$lugar    = ( isset($_GET['lugar'   ]) )? $_GET['lugar'   ] : '';
$fecha    = ( isset($_GET['fecha'   ]) )? $_GET['fecha'   ] : '';
$hora     = ( isset($_GET['hora'    ]) )? $_GET['hora'    ] : '';

$variables_get = array(
		'solicita' => $solicita,
		'tp'       => $tp,
		'lugar'    => $lugar,
		'fecha'    => $fecha,
		'hora'     => $hora
	);
?>