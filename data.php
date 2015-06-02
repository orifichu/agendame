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
            <form action="constancia.php">
              <div class="form-group">
                <label for="juzgado">¿Cual es su Juzgado?</label>
                <select class="form-control" id="juzgado">
                  <option value="1jip">1er Juzgado de Investigación Preparatoria</option>
                  <option value="2jip">2do Juzgado de Investigación Preparatoria</option>
                  <option value="3jip">3er Juzgado de Investigación Preparatoria</option>
                  <option value="4jip">4to Juzgado de Investigación Preparatoria</option>
                  <option value="1jup">1er Juzgado Penal Unipersonal</option>
                  <option value="2jup">2do Juzgado Penal Unipersonal</option>
                  <option value="3jup">3er Juzgado Penal Unipersonal</option>
                  <option value="4jup">4to Juzgado Penal Unipersonal</option>
                  <option value="5jup">5to Juzgado Penal Unipersonal</option>
                  <option value="6jup">6to Juzgado Penal Unipersonal</option>
                  <option value="7jup">7mo Juzgado Penal Unipersonal</option>
                  <option value="jpcp">Juzgado Penal Colegiado Permanente</option>
                  <option value="jpct">Juzgado Penal Colegiado Transitorio</option>
                  <option value="1spa">1ra Sala Penal de Apelaciones</option>
                  <option value="2spa">2do Sala Penal de Apelaciones</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">¿Cual es el número del expediente?</label>
                <input type="text" class="form-control" id="expediente">
              </div>
              <div class="form-group">
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
              </div>
              <div class="form-group">
                <label for="oficio">¿Puede adjuntar el oficio?</label>
                <p>Si bien es cierto no es necesario adjuntar el oficio nunca está de más brindar información adicional.</p>
                <input type="file" id="oficio">
              </div>
              <div class="form-group">
                <label for="detalles">¿Algún dato más?</label>
                <p>Ingrese aquí cualquier otro dato adicional sobre la videoconferencia. Las direcciones, nombres, números y anexos; siempre son de gran ayuda para establecer una mejor coordinación.</p>
                <textarea class="form-control" rows="5" id="detalles"></textarea>
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
        <script src="js/main.js"></script>
    </body>
</html>
