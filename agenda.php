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
            <li class="active"><a href="agenda.php">Agenda</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Begin page content -->
      <div class="container">
        <div class="row">

          <div class="col-md-3">
            <div class="datepicker"></div>
          </div>

          <div class="agenda col-md-9 table-responsive">
            <table class="table table-bordered table-hover table-condensed">
              <thead>
                <tr>
                  <th rowspan="2" class="hora text-center" style="vertical-align:middle;"></th>
                  <th class="sede-title" colspan="2">Nueva Sede</th>
                  <th class="sede-title" colspan="2">Penal</th>
                </tr>
                <tr>
                  <th>P 1</th>
                  <th>P 2</th>
                  <th>P 1</th>
                  <th>P 2</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">8:00 - 8:30</th>
                  <td class="active">Libre</td>
                  <td class="danger">Ocupado</td>
                  <td class="active">Libre</td>
                  <td class="active">Libre</td>
                </tr>
                <tr>
                  <th scope="row">8:30 - 9:00</th>
                  <td class="active">Libre</td>
                  <td class="active">Libre</td>
                  <td class="active">Libre</td>
                  <td class="active">Libre</td>
                </tr>
                <tr>
                  <th scope="row">9:00 - 9:30</th>
                  <td class="danger">Ocupado</td>
                  <td class="danger">Ocupado</td>
                  <td class="danger">Ocupado</td>
                  <td class="active">Libre</td>
                </tr>
                <tr>
                  <th scope="row">9:30 - 10:00</th>
                  <td class="danger">Ocupado</td>
                  <td class="danger">Ocupado</td>
                  <td class="danger">Ocupado</td>
                  <td class="danger">Ocupado</td>
                </tr>
                <tr>
                  <th scope="row">10:00 - 10:30</th>
                  <td class="danger">Ocupado</td>
                  <td class="active">Libre</td>
                  <td class="active">Libre</td>
                  <td class="active">Libre</td>
                </tr>
              </tbody>
            </table>
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
        <script src="js/main.js"></script>
    </body>
</html>
