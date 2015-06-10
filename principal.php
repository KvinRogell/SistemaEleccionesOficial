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
<div class="jumbotron">
	<div class="container-fluid">
		<div class="panel panel-default">
  			<div class="panel-heading">
    			<h3 class="panel-title">Bienvenido :D </h3>   

  			</div>
  		<div class="panel-body">
    		<p>Usuario: <?php print $_SESSION['usuario']; ?></p>
            <p>Tipo: <?php print $_SESSION['tipo']; ?></p>
  		</div>
  		<div class="panel-heading">
            <a href="menu.php" class="label label-warning">Menu Principal</a>
        </div>
        <div class="panel-heading">
            <a href="cerrar.php" class="label label-warning">cerrar sesion</a>
        </div>
	</div>
</div>
</div>

	
</body>
</html>
 <?php }else{
    header("Location:index.php");
 } ?>