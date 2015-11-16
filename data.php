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
        <title>Data | Agéndame</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body class="predata">
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

      <!-- Begin page content -->
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-push-3">
            <br/>
            <form action="videoconferencia_save.php" enctype="multipart/form-data" id="data" name="data" method="post">
              <input id="videoconferencia_id" name="videoconferencia_id" type="hidden" value="0" />

              <input id="solicita" name="solicita" type="hidden" value="<?php echo $solicita; ?>" />
              <input id="tp" name="tp" type="hidden" value="<?php echo $tp; ?>" />
              <input id="lugar" name="lugar" type="hidden" value="<?php echo $lugar; ?>" />
              <input id="fecha" name="fecha" type="hidden" value="<?php echo $fecha; ?>" />
              <input id="hora" name="hora" type="hidden" value="<?php echo $hora; ?>" />

              <div class="form-group">
                <label for="solicitante">¿Cual es la dependencia solicitante?</label>
                <div class="row">
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="solicitante" name="solicitante">
                  </div>
                  <div class="col-md-4">
                    <select class="form-control" id="sede_id_solicitante" name="sede_id_solicitante">
                      <?php
                      if ($solicita=='casa') {
                      ?>
                      <option value="1">CSJ Lambayeque</option>
                      <?php
                      } else {
                        //consulta videoconferencias del día
                        $sql = '
                        SELECT * FROM sedes WHERE sede_padre_id= 0 AND sede_id!=1 ORDER BY nombre
                        ';
                        $resultado = mysqli_query( $db_link, $sql );

                        while ($sede = mysqli_fetch_object($resultado)) {
                        ?>
                        <option value="<?php echo $sede->sede_id; ?>"><?php echo $sede->nombre; ?></option>
                        <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                
              </div>
              <div class="form-group">
                <label for="nro_expediente">¿Cual es el número del expediente?</label>
                <div class="row">
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="nro_expediente" name="nro_expediente">
                  </div>
                </div>
              </div>
              <!--div class="form-group">
                <label for="participante">¿Quién se presentará a la videoconferencia?</label>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <input type="text" class="form-control" id="participante">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <select class="form-control" id="tipo-participante">
                      <option value="interno">Interno</option>
                      <option value="perito">Perito</option>
                      <option value="testigo">Testigo</option>
                    </select>
                  </div>
                </div>
              </div-->
              <div class="form-group">
                <label for="oficio">¿Puede adjuntar el oficio?</label>
                <p>Si bien es cierto no es necesario adjuntar el oficio nunca está de más brindar información adicional.</p>
                <input id="oficio" name="oficio" type="file">
              </div>
              <div class="form-group">
                <label for="detalles">¿Algún dato más?</label>
                <p>Ingrese aquí cualquier otro dato adicional sobre la videoconferencia. Las direcciones, nombres, números y anexos; siempre son de gran ayuda para establecer una mejor coordinación.</p>
                <textarea class="form-control" rows="5" id="detalles" name="detalles"></textarea>
              </div>
              <button type="submit" class="btn btn-default">Grabar</button>
            </form>
          </div>
        </div>

      </div>

      <div id="push"></div>
    </div>

    <?php include("footer.php"); ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/data.js"></script>
    </body>
</html>
