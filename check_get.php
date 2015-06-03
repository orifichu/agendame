<?php
//funciones de chequeo

//solo se permite el ingreso de dos posibles valores para la variable $solicita
function check_solicita( $solicita, $tp, $lugar, $fecha ){
	if ($solicita!='casa' && $solicita!='visitante') {
		header('Location: index.php');
	}
}

//solo se permite dos valores para $tp
function check_tp( $solicita, $tp, $lugar, $fecha ){
	if ( is_numeric($tp) ) {
		if ($tp!=0 && $tp!=1) {
			header('Location: predata.php?solicita='.$solicita);
		}
	} else {
		header('Location: predata.php?solicita='.$solicita);
	}
}

//solo se permiten las cortes ya definidas
function check_lugar( $solicita, $tp, $lugar, $fecha ){
	$lugares = explode(',', $lugar);
	$lugares = array_unique($lugares);

	$cortes = array(
		'csj.lambayeque',
		'csj.lambayeque.penal',
		'csj.amazonas',
		'csj.ancash',
		'csj.apurimac',
		'csj.arequipa',
		'csj.ayacucho',
		'csj.cajamarca',
		'csj.callao',
		'csj.canete',
		'csj.cusco',
		'csj.huancavelica',
		'csj.huanuco',
		'csj.huarua',
		'csj.ica',
		'csj.junin',
		'csj.la.libertad',
		'csj.lima',
		'csj.lima.este',
		'csj.lima.norte',
		'csj.lima.sur',
		'csj.loreto',
		'csj.madre.de.dios',
		'csj.moquegua',
		'csj.pasco',
		'csj.piura',
		'csj.puno',
		'csj.san.martin',
		'csj.santa',
		'csj.sullana',
		'csj.tacna',
		'csj.tumbes',
		'csj.ucayali',
		'csj.ventanilla'
		);

	foreach ($lugares as $lugar) {
		if ( ! in_array($lugar, $cortes) ) {
			header('Location: predata.php?solicita='.$solicita);
		}
	}
}

//solo se permite una fecha válida
function check_fecha( $solicita, $tp, $lugar, $fecha ){
	$format = 'Y-m-d';
	$d = DateTime::createFromFormat($format, $fecha);
    if ( $d && $d->format($format) == $fecha ) {
		
	} else {
		$fecha = gmdate("Y-m-d", time() + 3600*(-5+date("I")));;
		header('Location: horario.php?solicita='.$solicita.'&tp='.$tp.'&lugar='.$lugar.'&fecha='.$fecha);
	}
}

$filename = basename($includerFile, '.php');
//echo $filename;

switch ( $filename ) {
	case 'predata':
		check_solicita($solicita, $tp, $lugar, $fecha);
		break;
	
	case 'horario':
		check_solicita($solicita, $tp, $lugar, $fecha);
		check_tp( $solicita, $tp, $lugar, $fecha );
		check_lugar( $solicita, $tp, $lugar, $fecha );
		check_fecha( $solicita, $tp, $lugar, $fecha );
		break;
}

?>