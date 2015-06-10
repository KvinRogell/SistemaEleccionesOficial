<?php include './clases/Coneccion.php';?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta property="og:title" content="Simulador de votación"/>
<title>Sistema de votación :: Inicio Sesión</title>

<link href="./css/estilos.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./libs/bootstrap/css/bootstra.css">

     
  <style>
    .container-fluid{
      width: 500px;
    }
   
  </style>
</head>
<body class="inicio">

<header>
<img src="imgs/deka.png"><br>
<h1>Deka Copyright Elections<br>
<span>¡El Salvador!</span></h1>
</header>
 
<div class="jumbotron" class="pager">
  <div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">LOGIN DEKA COPYRIGHT</h3>
        </div>
      <div class="panel-body">
        <form action="sesion.php" method="post">
          <div class="container">
            <div class="row">
              <div class="col-xs-4">Usuario:</div>
              <div class="col-xs-2">
                <input type="text" name="usuario" class="form controls">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-4">Clave:</div>
              <div class="col-xs-2">
                <input type="password" name="clave"  class="form controls">
              </div>
            </div>
            <br>
                    <?php if (isset($_REQUEST['msg'])) { ?>
                    <div class="row">
                        <div class="col-xs-4"></div>
                        <div class="col-xs-2">
                            <div class='label alert-danger'>
                               <?php  print "Error al inicio de sesion";?> 
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php }  ?>
            <div class="row">
              <div class="col-xs-4"></div>
              <div class="col-xs-2">
                <input type="submit" name="bot" value="Entrar" class="btn btn-primary">
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
</div>
<footer id="footer">
  Design <a href="http://www.facebook.com/DanielGarcia1994">DannyDj Garcia</a> And <a href="http://www.facebook.com/kevin.rogel08">Kvin Rögell</a> Thanks to ITCA Fepade Regional Zacatecoluca
  <p> &copy; Copyright DEKA 2015 Sistema Electoral </p>

</footer> 
</body>
</html>
