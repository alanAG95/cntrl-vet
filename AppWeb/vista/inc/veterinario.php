<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veterinaria - <?php echo ucfirst($modulo); ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar navbar-light" style="background-color: #e3f2fd" role="navigation">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?modulo=usuario&accion=principal">Veterinaria<br>Arca de Noé</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mascotas <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="?modulo=mascota&accion=listar">Listar Mascotas</a></li>
                <li><a href="?modulo=mascota&accion=editar">Agregar Mascota</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Citas o Visitas <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="?modulo=cita&accion=listar">Listar Citas</a></li>
                <li><a href="?modulo=cita&accion=listar">Listar Visitas</a></li>
                <li><a href="?modulo=cita&accion=listar">Listar Emergencias</a></li>
                <li><a href="?modulo=cita&accion=calendario">Calendario</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Insumos e Instrumentos <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="?modulo=insumoEinstrumental&accion=listar">Listar Insumos e Instrumentos</a></li>
                <li><a href="?modulo=insumo&accion=editar">Agregar Insumo</a></li>
                <li><a href="?modulo=instrumental&accion=editar">Agregar Instrumental</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php?action=logout">Salir</a></li>
          </ul>
          <p class="navbar-text navbar-right">Hola <strong><?php echo $_SESSION['usuario']['nombre'] ?></strong>!</p>
        </div><!--/.nav-collapse -->
      </div>
    </div><!-- /navbar -->
    
