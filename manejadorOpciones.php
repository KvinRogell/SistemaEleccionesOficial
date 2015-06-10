<?php session_start(); ?>
<?php 
    if (isset($_SESSION['usuario'])) {
        
    

 ?>
<html>
    <head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link href="./css/estilos.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
    <script src="./libs/jquery-2.1.0.js"></script>
    <link rel="stylesheet" href="./libs/jquery-ui/css/smoothness/jquery-ui-1.10.4.custom.min.css">
    <script src="./libs/validacion/jquery.validate.min.js"></script>
    <script src="./libs/validacion/messages.js"></script>
    <script src="./libs/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
    </head>
    <body>
<?php
include './clases/Coneccion.php';
include './clases/opciones.php';
include './clases/opcionesControlador.php';


$alumnoA = new OpcionesControlador();

$accion= $_REQUEST['accion'];
switch ($accion) {
    case 'save':
        if(isset($_REQUEST['bot'])){
           $alumnoA->setId('NULL');
           $alumnoA->setTipo($_REQUEST['tipo']);
           $alumnoA->setYear($_REQUEST['year']);
           $datosObj=array($alumnoA->getId(),
                           $alumnoA->getTipo(),                           
                           $alumnoA->getYear());
           print $alumnoA->guardarDatos($con,$datosObj);
           print '<a href=\'manejadorOpciones.php?accion=con\'>Ver datos</a>';
       }else{
           print 'No se ha enviado datos ';
       }
        break;
    case 'con':        
        $sql = 'SELECT * FROM cargo';
        $datoss =  consultaD($con, $sql);

        print imprimetabla($datoss,"cargo","table table-bordered table-striped",1);
        break;
        default:
        print 'No hay Accion que realizar';
        break;
      }
 ?>  
<center>
 <div class="boton">
<center><a href="menu.php">Menu Principal</a></center> 
</div></center> 
     </body>
</html>
 <?php }else{
    header("Location:index.php");
 } ?>




    
