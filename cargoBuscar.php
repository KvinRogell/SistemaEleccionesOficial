<?php include './clases/Coneccion.php';?>
<?php session_start(); ?>
<?php 
    if (isset($_SESSION['usuario'])) {
        
    

 ?>
<pre>
<?php  
$sql ="SELECT * FROM cargo WHERE id ='".$_REQUEST['id']."';";
        $datos= consultaD($con, $sql,3)
       ?>
      
       </pre>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta property="og:title" content="Simulador de votación"/>
<title>Sistema de votación</title>

<link href="./css/estilos.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
<script src="./libs/jquery-2.10.js"></script>
<link rel="stylesheet" href="./libs/jquery-ui/css/smoothness/jquery-ui-1.10.4.custom.min.css">
<script src="./libs/validacion/jquery.validate.min.js"></script>
<script src="./libs/validacion/jquery.messages.min.js"></script>
<script src="./libs/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>

</head>
<body class="inicio">

<header>
<img src="imgs/deka.png" width="250px" height="50"><br>
<h1 class="px">Deka Copyright Elections<br>
<span>¡El Salvador!</span></h1>
<p>Tipo de Candidatura</p>
</header>
 
 <div class="container">
        <form action="modificarCargo.php" id="opciones" method="post" class="pager">
             <table class="table-bordered">
            <div class="input-sm">
                <div class="form-group ">
                <input type="hidden" name="id" value='<?php print $datos[0][0]?>'>
                <input class="checkbox-inline" type="checkbox" name="tipo" value='<?php print $datos[0][1]?>'> Presidencial <br>
                <input class="checkbox-inline" type="checkbox" name="tipo" value='<?php print $datos[0][1]?>'> Diputados <br>
                <input class="checkbox-inline" type="checkbox" name="tipo" value='<?php print $datos[0][1]?>'> Alcaldes 
                </div>
            </div>
          <br>
            <br><br> 
              <div class="row">
                <div class="col-xs-2">
                Año a Efectuar:
                </div>
                <div class="col-xs-9">
                <input type="text" name="year" id="year" placeholder="Ingrese Año Electoral a Aperturar" class="required form-control" minlength="4" required="true"><br>
                </div>
            </div>
            

            <div class="row">
                <div colspan="2">
                    <input type="submit" name='bot' value='Guardar' class="btn btn-primary"> 
                    <input type="submit" name='bot' value='Cancelar' class="btn btn-primary"> 

                </div>

            </div>
            <div class="panel-heading">
            <a href="menu.php" class="label label-primary">Menu Principal</a><br><br>
            <a href="cerrar.php" class="label label-primary">Cerrar Sesion</a>
        </div>
           </table>
     </form>

</div>



</div>
<br><br><br>
 <script type="text/javascript">
        $().ready(function () {
            $("#opciones").validate({});
        });
    </script>
	<footer id="footer">
  Design <a href="http://www.facebook.com/DanielGarcia1994">DannyDj Garcia</a> And <a href="http://www.facebook.com/kevin.rogel08">Kvin Rögell</a> Thanks to ITCA Fepade Regional Zacatecoluca
  <p> &copy; Copyright DEKA 2015 Sistema Electoral </p>

</footer>
</body>
</html>
 <?php }else{
    header("Location:index.php");
 } ?>
