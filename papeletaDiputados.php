<?php include './clases/Coneccion.php';?>

<?php
session_start();

if(isset($_SESSION['barra'])) {?>

<!doctype html>
<html>
<head>

<meta charset="utf-8">
<meta property="og:title" content="Simulador de votación"/>
<link rel="shortcut icon" href="imgs/deka.png">
<title>Sistema de votación</title>


<link href="./css/styleDipu.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
<script src="./reporte/jquery.min.js"></script>
<script src="./libs/jquery-ui/js/script.js"></script>
<script language="JavaScript">
<!--
  javascript:window.history.forward(1);
//-->
</script> 

<style type="text/css">
  
.bloque{
  position: relative;
  display: inline-block;
  margin: auto 0;
  margin-left: 40px;
  margin-right: 45px;
  padding: 10px 0px 0 10px;

}


ul,ol {
      list-style: none;
    
      }

div > li > img {
  float: left;
}


</style>

</head>
<body class="inicio">

<header>
<img src="imgs/deka.png"><br><br>


<p>ELECCIONES ASAMBLEA LEGISLATIVA</p>
</header>
 <div>
    <?php


 $sql = 'SELECT * FROM inscri_partido';
        $datoss =  consultaD($con, $sql);

foreach ($datoss as $key)
  
 {
 
    print(' 
      
        <div class="bloque">
         <form action="manejadorDiputados.php?accion=save" method="post">
         <input type="hidden" class="contadorClicks" name="var1" value="'.$_REQUEST['var1'].'">
         <input type="hidden" class="contadorClicks" name="var2" value="'.$_REQUEST['var2'].'">
         <input type="hidden" class="contadorClicks" name="var3" value="'.$_REQUEST['var3'].'">
            <div>
            <input type="hidden" class="contadorClicks" name="candidatura" value="Diputados">
            </div>
            <input type="hidden" class="contadorClicks" name="voto" value='.$key['nombre_partido'].'>
            <img src='.$key['bandera'].' class="contadorClicks"  width="200" height="150" /><br>
            <input type="submit" name="bot" value="Votar" class="btn btn-primary">
            </form>
          </div>
      
            ');
            
 
 }

?>
        
<br><br><br>
<footer id="footer">
 <h6> Design <a href="http://www.facebook.com/DanielGarcia1994">DannyDj Garcia</a> And <a href="http://www.facebook.com/kevin.rogel08">Kvin Rögell</a> Thanks to ITCA Fepade Regional Zacatecoluca
  <p> &copy; Copyright DEKA 2015 Sistema Electoral </p></h6>

</footer> 
</body>
</html>
 <?php }else{
    header("Location:index.php");
 } ?>
