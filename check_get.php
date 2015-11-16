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
		'csj.lambayeque.nueva.sede',
		'csj.lambayeque.jaen',
		'csj.lambayeque.cutervo',
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
function check_fecha( $solicita, $tp, $lugar, $fecha, $is_agenda = false ){
	$format = 'Y-m-d';
	$d = DateTime::createFromFormat($format, $fecha);
    if ( $d && $d->format($format) == $fecha ) {
		
	} else {
		$fecha = gmdate("Y-m-d", time() + 3600*(-5+date("I")));;

		if ($is_agenda) :
			header('Location: agenda.php?fecha='.$fecha);
		else:
			header('Location: horario.php?solicita='.$solicita.'&tp='.$tp.'&lugar='.$lugar.'&fecha='.$fecha);
		endif;
	}
}

//solo se permiten las horas ya definidas
function check_hora( $solicita, $tp, $lugar, $fecha, $hora ){
	$horas = array(
                  '07:30',
                  '08:00',
                  '08:30',
                  '09:00',
                  '09:30',
                  '10:00',
                  '10:30',
                  '11:00',
                  '11:30',
                  '12:00',
                  '12:30',
                  '13:00',
                  '13:30',
                  '14:00',
                  '14:30',
                  '15:00',
                  '15:30',
                  '16:00',
                  '16:30',
                  '17:00',
                  '17:30',
                  '18:00',
                  '18:30'
                );

	if ( ! in_array($hora, $horas) ) {
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

	case 'data':
		check_solicita($solicita, $tp, $lugar, $fecha);
		check_tp( $solicita, $tp, $lugar, $fecha );
		check_lugar( $solicita, $tp, $lugar, $fecha );
		check_fecha( $solicita, $tp, $lugar, $fecha );
		check_hora( $solicita, $tp, $lugar, $fecha, $hora );
		break;

	case 'agenda':
		check_fecha( $solicita, $tp, $lugar, $fecha, true );
		break;
}

?>