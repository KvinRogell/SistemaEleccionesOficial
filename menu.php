<?php session_start(); ?>
<?php 
    if (isset($_SESSION['usuario'])) {
        
    

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
	<style>
		.container-fluid{
			width: 500px;
		}
		.jumbotron{
			background-color: #fff;
		}
	</style>
</head>
<body>
<link href="./css/estilos.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">

</head>
<body class="inicio">

<header>
<img src="imgs/deka.png"><br>
<h1>Deka Copyright Elections<br>
<span>¡El Salvador!</span></h1>
</header
<div class="jumbotron">
	<div class="container-fluid">
		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">MENU PRINCIPAL </h3>   

  			</div>
  		<div class="panel-body">
    		<p>Apertura de Elecciones: <a href="opciones.php">APERTURAR</a></p>
            <p>Inscripciòn de Partido Politico: <a href="inscripcionPartido.php">INSCRIBIR</a></p>
            <p>Inscripciòn de Coalisiones: <a href="coalision.php">COALISIONES</a></p>
            <p>Inscripciòn de Candidato: <a href="candidatoRegistro.php">REGISTRAR</a></p>
            <p>Inscripciòn de Votante: <a href="votanteRegistro.php">REGISTRAR</a></p>
            <p>Resultados Preliminares: <a href="menuResultados.php">VER</a></p>
            <p>Votar: <a href="dui.php">VOTAR</a></p>

  		</div>
        <div class="panel-heading">
            <a href="cerrar.php" class="label label-primary">Cerrar Sesion</a>
        </div>
	</div>
</div>
</div>

	
</body>
</html>
 <?php }else{
    header("Location:index.php");
 } ?>