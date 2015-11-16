<?php include("variables_get.php"); ?>
<?php include("funciones.php"); ?>
<?php
$variables_get['includerFile'] = __FILE__;
ScopedInclude('check_get.php', $variables_get);

//enlace a la base de datos
$db_link = get_db_link();
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="es"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="es"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Agenda | Agéndame</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }

            a.link{
               display:block;
               height:57px; /* this is the height of your header */
               margin-top:-57px; /* this is again negative value of the height of your header */
               visibility:hidden;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link id="bsdp-css" href="css/datepicker3.css" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body class="agenda">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Agéndame</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="agenda.php">Agenda</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <input id="solicita" type="hidden" value="<?php echo $solicita; ?>" />
      <input id="tp" type="hidden" value="<?php echo $tp; ?>" />
      <input id="lugar" type="hidden" value="<?php echo $lugar; ?>" />
      <input id="fecha" type="hidden" value="<?php echo $fecha; ?>" />

      <!-- Begin page content -->
      <div class="container">
        <div class="row ">

          <div class="col-md-3">
            <div class="datepicker"></div>
          </div>

          <div class="col-md-9">
            <div class="agenda table-responsive">
              <?php /* ejemplo de tabla
              <table class="table table-bordered table-hover table-condensed text-center">
                <thead>
                  <tr>
                    <th rowspan="2" class="hora text-center" style="vertical-align:middle;">&nbsp;</th>
                    <th class="sede-title text-uppercase text-center" colspan="2">Nueva Sede</th>
                    <th class="sede-title text-uppercase text-center" colspan="2">Penal</th>
                  </tr>
                  <tr class="active">
                    <th class="text-center active">P 1</th>
                    <th class="text-center active">P 2</th>
                    <th class="text-center active">P 1</th>
                    <th class="text-center active">P 2</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row" class="active">08:00 - 08:30</th>
                    <td class="">Libre</td>
                    <td class="danger">Ocupado</td>
                    <td class="">Libre</td>
                    <td class="">Libre</td>
                  </tr>
                </tbody>
              </table>
              */ ?>

              <?php
              //consulta videoconferencias del día
              $sql = "
              SELECT v.*, s.nombre
              FROM videoconferencias v
              INNER JOIN sedes s ON s.sede_id = v.sede_id_solicitante
              WHERE v.fecha = '%s'
              ORDER BY v.hora, v.videoconferencia_id ASC
              ";
              $sql = sprintf($sql, $fecha);
              $resultado = do_query( $db_link, $sql );

              //llenar array de videoconferencias
              $videoconferencias = array();
              while ($videoconferencia = mysqli_fetch_object($resultado)) {
                $videoconferencias[] = $videoconferencia;
              }

              //recuerda que agregar una hora aquí es agregar una hora en check_get.php y horario.php
              $cantidad_x_hora = array(
                  '07:30' => 0,
                  '08:00' => 0,
                  '08:30' => 0,
                  '09:00' => 0,
                  '09:30' => 0,
                  '10:00' => 0,
                  '10:30' => 0,
                  '11:00' => 0,
                  '11:30' => 0,
                  '12:00' => 0,
                  '12:30' => 0,
                  '13:00' => 0,
                  '13:30' => 0,
                  '14:00' => 0,
                  '14:30' => 0,
                  '15:00' => 0,
                  '15:30' => 0,
                  '16:00' => 0,
                  '16:30' => 0,
                  '17:00' => 0,
                  '17:30' => 0,
                  '18:00' => 0,
                  '18:30' => 0
                );
              ?>
              <table class="table table-bordered table-hover table-condensed text-center">
                <thead>
                  <tr>
                    <th class="hora text-center" style="vertical-align:middle;">&nbsp;</th>
                    <th class="sede-title text-uppercase text-center">Videoconferencias</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($cantidad_x_hora as $hora => $cantidad) {
                    $first_row_html = ''; //para la primera videoconferencia ya que estará dentro del primer tr
                    $rest_rows_html = ''; //para el resto de videoconferencias ya que estarán dentro del siguiente tr
                    foreach ($videoconferencias as $videoconferencia) {
                      
                      if ($videoconferencia->hora == $hora) {
                        $text_solicitante = ($videoconferencia->solicitante != '') ? ' ('.$videoconferencia->solicitante.')' : '';
                        $text = '<b>Solicitante:</b> ' . $videoconferencia->nombre . $text_solicitante . '<br/><b>Desea conexión con(entre):</b> ' . str_replace(',', ', ', $videoconferencia->sedes_nombres) . '<br/>';
                        
                        $form = '
                        <div id="%d" style="display: none"><br/>
            <form action="videoconferencia_save.php" class="data" enctype="multipart/form-data" name="data" method="post">
              <input id="videoconferencia_id" name="videoconferencia_id" type="hidden" value="%d" />
              <input id="type_edit" name="type_edit" type="hidden" value="quick" />
              <input id="fecha" name="fecha" type="hidden" value="%s" />

              <div class="form-group">
                <label for="solicitante">¿Cual es la dependencia solicitante?</label>
                <div class="row">
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="solicitante" name="solicitante" value="%s">
                  </div>
                  <div class="col-md-4">
                  </div>
                </div>
                
              </div>
              <div class="form-group">
                <label for="nro_expediente">¿Cual es el número del expediente?</label>
                <div class="row">
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="nro_expediente" name="nro_expediente" value="%s">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="oficio">¿Puede adjuntar el oficio?</label>
                <p>Si bien es cierto no es necesario adjuntar el oficio nunca está de más brindar información adicional.</p>
                <input id="oficio" name="oficio" type="file">
              </div>
              <div class="form-group">
                <label for="detalles">¿Algún dato más?</label>
                <p>Ingrese aquí cualquier otro dato adicional sobre la videoconferencia. Las direcciones, nombres, números y anexos; siempre son de gran ayuda para establecer una mejor coordinación.</p>
                <textarea class="form-control" rows="5" id="detalles" name="detalles">%s</textarea>
              </div>
              <div class="form-group">
                <label for="estado">¿Cual es el estado actual de la videoconferencia?</label>
                <div class="row">
                  <div class="col-md-4">
                    <select class="form-control" id="estado" name="estado">
                      <option value="PENDIENTE"%s>PENDIENTE</option>
                      <option value="FALLIDA"%s>FALLIDA</option>
                      <option value="ANULADA"%s>ANULADA</option>
                      <option value="REALIZADA"%s>REALIZADA</option>
                    </select>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-default">Grabar</button>
              <a class="btn btn-default cancel" href="#" id="%d" role="button">Cancelar</a>
            </form>
                        <br/></div>';
                        $string_1 = ($videoconferencia->estado == 'PENDIENTE') ? ' selected' : '';
                        $string_2 = ($videoconferencia->estado == 'FALLIDA') ? ' selected' : '';
                        $string_3 = ($videoconferencia->estado == 'ANULADA') ? ' selected' : '';
                        $string_4 = ($videoconferencia->estado == 'REALIZADA') ? ' selected' : '';

                        $form = sprintf($form, $videoconferencia->videoconferencia_id, $videoconferencia->videoconferencia_id, $fecha, $videoconferencia->solicitante, $videoconferencia->nro_expediente, $videoconferencia->detalles, $string_1, $string_2, $string_3, $string_4, $videoconferencia->videoconferencia_id);

                        $text .= $form;

                        $text .='
                        <a class="quick_edit" href="#" name="'.$videoconferencia->videoconferencia_id.'">Edición rápida</a>&nbsp;&nbsp;
                        <a href="#" target="_blank">Editar</a>&nbsp;&nbsp;
                        <a class="delete" href="#" id="'.$videoconferencia->videoconferencia_id.'">Eliminar</a>
                        ';

                        if ($cantidad == 0) {
                          $first_row_html .= '%s';
                          $first_row_html = sprintf($first_row_html, $text);
                        } else {
                          $rest_rows_html .= '
                          <tr><td class="text-left">%s</td></tr>
                          ';

                          $rest_rows_html = sprintf($rest_rows_html, $text);
                        }

                        $cantidad++;
                      }

                    }
                  ?>
                  <tr>
                    <th class="active" rowspan="<?php echo $cantidad; ?>" scope="row">
                      <a class="link" id="<?php echo $hora ?>"></a>
                      <label><?php echo $hora ?></label>
                    </th>
                    <td class="text-left"><?php echo $first_row_html; ?></td>
                  </tr>
                  <?php
                    if ($cantidad >= 2) {
                      echo $rest_rows_html;
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>

          </div>

        </div>
      </div>

      <div id="push"></div>
    </div>

    <?php include("footer.php"); ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/vendor/bootstrap-datepicker.js"></script>
        <script src="js/vendor/bootstrap-datepicker.es.js" charset="UTF-8"></script>

        <script src="js/plugins.js"></script>
        <script src="js/agenda.js"></script>
    </body>
</html>
