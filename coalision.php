<?php include './clases/Coneccion.php';?>
<?php session_start(); ?>
<?php 
    if (isset($_SESSION['usuario'])) {
        
    

 ?>
<?php
$conexion = new mysqli('127.0.0.1', 'root', '', 'sistema_electoral');
?>
<!DOCTYPE html>
<html>
<head>    
    <title>Sistema Votacion :: Coalisione</title>

<link type="text/css" href="./css/ui.all.css" rel="stylesheet">
<link type="text/css" href="./css/ui.base.css" rel="stylesheet">
<link href="./css/estilos.css" rel="stylesheet" type="text/css">
<link type="text/css" href="./css/ui.multiselect.css" rel="stylesheet">
<script type="text/javascript" src="./libs/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="./libs/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="./libs/js/ui.multiselect.js"></script>
<script type="text/javascript">
    $(function(){
        $.localise('ui-multiselect', {path: 'js/'});
        $(".multiselect").multiselect();        
    });
</script>
</head>
<body>
    <header>
         <h1 class="px">Deka Copyright Elections<br>
           <span>¡El Salvador!</span></h1>
           <p>Inscripción de Coalisiones Departamentales y Municipales</p>
    </header>
    <center>
<div class="container">
  <form action="manejadorCoalisiones.php?accion=save" method="post">
       <br> 
           <div class="row">
            
                <div class="col-xs-2">
                  Departamento:
                </div>
                <div class="col-xs-2">

                   <Select name="depa" id="depto" class="required form-control" required="true" onkeydown="return validarLetras(event)">
                        <option value="">[Seleccionar...]</option>
                        
                  <?php
                  $result = $conexion->query("SELECT * FROM departamentos");
                  if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                  echo '<option value="'.$row['codigo'].'">'.utf8_encode($row['nombre']).'</option>';
                  }
                }
                  ?>
               </select>
               </div>
           </div> 
           
<br> 
       <div class="row">
                
                <div class="col-xs-2">
                  Municipio:
                </div>
                <div class="col-xs-2">
                   <Select name="muni" id="municipio" class="required form-control" required="true" onkeydown="return validarLetras(event)">
                        <option value="">[Seleccionar...]</option>
                       
               </select>
               </div>
           </div> 
           
<br> 
               
    <p>Seleccione partidos en Coalision:</p>
                
            
       <select id="tags" name="tags" class="multiselect" multiple="multiple" >
       <?php
                  $result = $conexion->query("SELECT * FROM inscri_partido");
                  if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                  echo '<option value="'.$row['id'].'">'.utf8_encode($row['nombre_partido']).'</option>';
                  }
                }
                  ?>
       </select>
       
      <br> 

      <div class="row">
            
                <div class="col-xs-2">
                 Coalision:
                </div>
                <div class="col-xs-2">
                   <Select name="tipo" class="required form-control" required="true" onkeydown="return validarLetras(event)">
                        <option value="">[Seleccionar...]</option>
                        <option value="Departamental">Departamental</option>
                        <option value="Municipal">Municipal</option>
                  
               </select>
               </div>
           </div> 
       <br>
       <div class="row">
            
                <div class="col-xs-2">
                  Cargo:
                </div>
                <div class="col-xs-2">
                   <Select name="cargo" class="required form-control" required="true" onkeydown="return validarLetras(event)">
                        <option value="">[Seleccionar...]</option>
                  <?php
                  $result = $conexion->query("SELECT * FROM cargo" );
                  if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                  echo '<option value="'.$row['id'].'">'.utf8_encode($row['tipo_cargo']).'</option>';
                  }
                }
                  ?>
               </select>
               </div>
           </div> 
           
<br> 
           <div class="row">
                <td colspan="2">
                    <input type="submit" name='bot' value='Enviar'  class="btn btn-primary">
                    <input type="submit" name='bot' value='Cancelar' class="btn btn-primary">
                </div>
             <br>
                <div class="panel-heading">
            <a href="menu.php" class="label label-primary">Menu Principal</a><br>
            <a href="cerrar.php" class="label label-primary">Cerrar Sesion</a>
        </div>
    </form>
</div>
  </center>
  <script language="javascript">
    $(document).ready(function(){
        $("#depto").change(function () {
            $("#depto option:selected").each(function () {
                id_depto = $(this).val();
                $.post("municipios.php", { id_depto: id_depto }, function(data){
                    $("#municipio").html(data);
                });
            });
        })
    });
</script>
</body>
<footer id="footer">
  Design <a href="http://www.facebook.com/DanielGarcia1994">DannyDj Garcia</a> And <a href="http://www.facebook.com/kevin.rogel08">Kvin Rögell</a> Thanks to ITCA Fepade Regional Zacatecoluca
  <p> &copy; Copyright DEKA 2015 Sistema Electoral </p>

</footer>
</html>
 <?php }else{
    header("Location:index.php");
 } ?>
