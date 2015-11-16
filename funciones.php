<?php
//nombre del archivo que hace el include
function ScopedInclude($file, $params = array())
{
    extract($params);
    include $file;
}

//obtener conexión a la base de datos
function get_db_link()
{
	$enlace = mysqli_connect("127.0.0.1", "root", "", "agendame");

	if (!$enlace) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	return $enlace;

	/*echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
	echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

	mysqli_close($enlace);*/
}

//hacer una consulta a la base de datos
function do_query( $enlace, $sql )
{
	$resultado = mysqli_query( $enlace, $sql );

	if (!$resultado) {
	    echo "Error de BD, no se pudo consultar la base de datos\n";
	    echo "Error MySQL: " . mysqli_error($enlace);
	    exit;
	}

	return $resultado;
}
?>