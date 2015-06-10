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

<link href="./css/estilos.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
<script src="./reporte/jquery.min.js"></script>
<script type="text/javascript">
  window.totalItems = '';
$(document).ready(function() {
  totalItems = $(".contadorClicks").length;
  console.log("totaItems es igual a: "+totalItems);
});
$(".contadorClicks").bind("click", function()
  {
  
    actualPage = this.id;
                console.log("actualPage is: "+actualPage);
    for(j=1; j<=totalItems; j++){
      if(actualPage == 'image'+j){
      var dataString = 'id='+j;
      $(".contadorClicks").fadeOut("slow", function(){
                          $("#ok").fadeIn();
                          setTimeout(function(){
                             $("#ok").fadeOut();
                          },3000);
                          
                         });
                    
          $.ajax({
          type: "POST",
          url: "manejadorPresidentes.php?accion=save",
          data: dataString,
          success: function() {
                     
          $(".contadorClicks").delay(3500).fadeIn();                                                
            
          } 
        });
      };
    }
  } );          
</script>
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
  margin-left: 45px;
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

<p>ELECCIONES PRESIDENCIALES</p>
</header>
 <div>
 
    <?php

 $sql = 'SELECT * FROM inscri_partido';
        $datoss =  consultaD($con, $sql);
//var_dump($datoss);
foreach ($datoss as $key)
  
/*$_REQUEST['var1'];
$_REQUEST['var2'];
$_REQUEST['var3'];*/

 {
 
    print(' 
      
        <div class="bloque">
         <form id="ok" action="manejadorPresidentes.php?accion=save" method="post">
         <input type="hidden" class="contadorClicks" name="var1" value="'.$_REQUEST['var1'].'">
         <input type="hidden" class="contadorClicks" name="var2" value="'.$_REQUEST['var2'].'">
         <input type="hidden" class="contadorClicks" name="var3" value="'.$_REQUEST['var3'].'">
            <div>
            <input type="hidden" class="contadorClicks" name="candidatura" value="Presidentes">
            </div>
            <input type="hidden" class="contadorClicks" name="voto" value='.$key['nombre_partido'].'>
            <img src='.$key['bandera'].' class="contadorClicks" width="200" height="150" /><br>
            <input type="submit" name="bot" value="Votar" class="btn btn-primary">
            </form>
          </div>
      
            ');
            

 }

?>
        
<br><br><br>
<footer id="footer">
  <h6>Design <a href="http://www.facebook.com/DanielGarcia1994">DannyDj Garcia</a> And <a href="http://www.facebook.com/kevin.rogel08">Kvin Rögell</a> Thanks to ITCA Fepade Regional Zacatecoluca
  <p> &copy; Copyright DEKA 2015 Sistema Electoral </p></h6>

</footer> 
</body>
</html>
 <?php }else{
    header("Location:dui.php");
 } ?>
 