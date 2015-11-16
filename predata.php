<?php include("variables_get.php"); ?>
<?php include("funciones.php"); ?>
<?php
$variables_get['includerFile'] = __FILE__;
ScopedInclude('check_get.php', $variables_get);

//enlace a la base de datos
$db_link = get_db_link();

//consulta sedes de csj.lambayeque (id=1)
$sql = '
SELECT * FROM sedes WHERE sede_padre_id= 1 ORDER BY nombre
';
$resultado = mysqli_query( $db_link, $sql );
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="es"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="es"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Predata | Agéndame</title>
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

      <input id="solicita" type="hidden" value="<?php echo $solicita; ?>" />

      <!-- Begin page content -->
      <div class="container">
        
        <?php /*if($solicita=='casa'): ?>
        <div class="row">
          <div class="col-md-12">
            <h2>¿Su sala posee un equipo Polycom?</h2>
            <div class="radio">
              <label><input name="tp" type="radio" value="1">Sí</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label><input name="tp" type="radio" value="0">No</label>
            </div>
           
          </div>
        </div>
        <?php endif;*/ ?>
        
        <div class="row">
          <div class="col-md-12">
            <h2>¿Entre qué sedes se realizará la videoconferencia?</h2>
            <div class="row">
              <div class="col-md-12">
                <h3>Corte de Lambayeque</h3>
                <div class="checkbox">
                  <?php
                  while ($sede = mysqli_fetch_object($resultado)) {
                  ?>
                  <label><input type="checkbox" value="<?php echo $sede->codigo?>"><?php echo $sede->nombre?></label><br/>
                  <?php
                  }
                  ?>
                </div>

                <?php if($solicita=='casa'):
                //consulta sedes de csj.lambayeque (id=1)
                $sql = '
                SELECT * FROM sedes WHERE sede_padre_id= 0 AND sede_id!=1 ORDER BY nombre
                ';
                $resultado = mysqli_query( $db_link, $sql );
                ?>
                <h3>Otras Cortes</h3>
                <div class="checkbox">
                <?php
                while ($sede = mysqli_fetch_object($resultado)) {
                ?>
                <label><input type="checkbox" value="<?php echo $sede->codigo?>"><?php echo $sede->nombre?></label><br/>
                <?php
                }
                ?>
                  <br/>
                </div>
                <?php endif; ?>
              </div>
            </div>
            
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
              <p><a class="btn btn-primary" href="#" id="btn-next" role="button">Siguiente &raquo;</a></p>
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
        <script src="js/predata.js"></script>
    </body>
</html>
