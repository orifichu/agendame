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

      <!-- Begin page content -->
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>¿Su sala posee un equipo Polycom?</h2>
            <div class="radio">
              <label><input type="radio" value="0">No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label><input type="radio" value="1">Sí</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2>¿Con qué lugar(es) desea conectarse?</h2>
            <div class="row">
              <div class="col-md-12 col-md-push-1">
                <h3>Corte de Lambayeque</h3>
                <div class="checkbox">
                  <label><input type="checkbox" value="0">Sede Principal</label><br/>
                  <label><input type="checkbox" value="1">Penal de Chiclayo</label>
                </div>

                <h3>Otras Cortes</h3>
                <div class="checkbox">
                  <label><input type="checkbox" value="0">Corte de Tumbes</label><br/>
                  <label><input type="checkbox" value="1">Corte de Lima</label>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <br>
            <p><a class="btn btn-primary " href="horario.php" role="button">Siguiente &raquo;</a></p>
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
        <script src="js/main.js"></script>
    </body>
</html>
