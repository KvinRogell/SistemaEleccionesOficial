<?php include './clases/Coneccion.php';?>
<?php session_start(); ?>
<?php 
    if (isset($_SESSION['usuario'])) {
        
    

 ?>
<pre>
<?php  
$sql ="SELECT * FROM registro WHERE id ='".$_REQUEST['id']."';";
        $datos= consultaD($con, $sql,3)
       ?>
      
       </pre>
<?php
$conexion = new mysqli('127.0.0.1', 'root', '', 'sistema_electoral');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta property="og:title" content="Simulador de votación"/>
<title>Sistema de votación :: Votante</title>

<link href="./css/estilos.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
        <script src="./libs/jquery-2.10.js"></script>
        <script src="./libs/jquery-ui/js/jquery.js"></script>
        <link rel="stylesheet" href="./libs/jquery-ui/css/smoothness/jquery-ui-1.10.4.custom.min.css">
        <script src="./libs/validacion/jquery.validate.min.js"></script>
        <script src="./libs/validacion/jquery.messages.min.js"></script>
        <script src="./libs/validacion/validacion_text_y_num.js"></script>
        <script src="./libs/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>

</head>
<body class="inicio">

<header>
<img src="imgs/deka.png" width="250px" height="50"><br>
<h1 class="px">Deka Copyright Elections<br>
<span>¡El Salvador!</span></h1>
<p>Formulario De Registro de Votantes</p>
</header>
 <div class="container">
        <form action="modificarVotante.php" method="post" id="registro" class="pager">
             <table class="table-bordered">
             <div class="row">
            
                <div class="col-xs-2">
                    DUI:
                </div>
               <div class="col-xs-2">
                  <input type="hidden" name="id" value='<?php print $datos[0][0]?>'>
                   <input type="text" name="dui" value='<?php print $datos[0][1]?>' maxlength="10" placeholder="00000000-0" class="required form-control" minlength="10" required="true" onkeydown="return validarNumeros(event)">
               </div>
           </div>
<br>
          <div class="row">
            
                <div class="col-xs-2">
                    Nombre:
                </div>
               <div class="col-xs-2">
                   <input type="text" name="nombre" value='<?php print $datos[0][2]?>' placeholder="Ingrese Su Nombre" class="required form-control" minlength="2" required="true" onkeydown="return validarLetras(event)">
               </div>
           </div>
<br>
           <div class="row">
            
                <div class="col-xs-2">
                    Apellido:
                </div>
               <div class="col-xs-2">
                   <input type="text" name="apellido" value='<?php print $datos[0][3]?>' placeholder="Ingrese Su Apellido" class="required form-control" minlength="2" required="true" onkeydown="return validarLetras(event)">
               </div>
           </div>
<br>
           <div class="row">
            
                <div class="col-xs-2">
                    Foto:
                </div>
                
               <div class="col-xs-2">
                   <input type="File" name="foto" value='<?php print $datos[0][4]?>' required="true">
               </div>
           </div>
<br>
           <div class="row">
            
                <div class="col-xs-2">
                    Gènero:
                </div>
               <div class="col-xs-3-1" >
                Hombre <input type="radio" name ="sexo" value='<?php print $datos[0][5]?>' required="">
                Mujer <input type="radio" name ="sexo" value='<?php print $datos[0][5]?>' required="">
                    
               </div>
           </div>
<br>
          <div class="row">
            
                <div class="col-xs-2">
                    Fecha de Vencimiento:
                </div>
               <div class="col-xs-5">
                   <div class="input-group">                   
                    <input type="text" name="fecha" value='<?php print $datos[0][6]?>' id="fechac" class="required form-control">
                    <span id="fechac" class="input-group-addon glyphicon glyphicon-calendar"></span>
               </div>
           </div>
       </div>
   </div>
   <br>
                 <div class="row">
            
                <div class="col-xs-2">
                    Direcciòn:
                </div>
               <div class="col-xs-2">
                <input name="direccion" value='<?php print $datos[0][7]?>' cols="40" rows="5" placeholder="Ingrese Su Direcciòn" class="required form-control"  required="true" onkeydown="return validarLetras(event)">
                   
               </div>
           </div>
<br>
            <div class="row">
            
                <div class="col-xs-2">
                    Departamento:
                </div>
               <div class="col-xs-2">
               <Select name="depa" id="depto" class="required form-control" required="true" onkeydown="return validarLetras(event)">
                  <option value='<?php print $datos[0][8]?>'>
                        <?php 
                        $sql2="select nombre from departamentos where id='".$datos[0][8]."'";
                        $da = consultaD($con,$sql2,3);                       
                        print $da[0][0];
                        ?>
                        </option>
                        <?php                
                            $sql = "SELECT id,nombre FROM departamentos WHERE id != '".$datos[0][8]."'";
                            $datos = consultaD($con, $sql);
                            foreach ($datos as $value) {
                                print "<option value='";
                                print $value['id'];
                                print "'>";
                                print $value['nombre'];
                                print "</option>";
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
                        <option value='<?php print $datos[0][9]?>'></option>
                        <?php                
                            $sql = "SELECT id,nombre FROM municipio WHERE id != '".$datos[0][9]."'";
                            $datos = consultaD($con, $sql);
                            foreach ($datos as $value) {
                                print "<option value='";
                                print $value['id'];
                                print "'>";
                                print $value['nombre'];
                                print "</option>";
                            }                
                        ?>
               </select>
               </div>
           </div> 
            
 <br>                  
            <div class="row">
                <td colspan="2">
                    <input type="submit" name='bot' value='Enviar' class="btn btn-primary">
                    <input type="submit" name='bot' value='Cancelar' class="btn btn-primary">
                </div>
                <div class="panel-heading">
            <a href="menu.php" class="label label-primary">Menu Principal</a><br><br>
            <a href="cerrar.php" class="label label-primary">Cerrar Sesion</a>
        </div>
            </div>
        </table>
           

     </form>

</div>



</div>
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
<br><br><br>
       <script type="text/javascript">
        $().ready(function () {
            $("#registro").validate({});
        });
        $(document).ready(
            function(){
                $("#fechac").datepicker(    
                    {
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: 'yy-mm-dd',
                        showAnim:'slide'
                    }
                    
                 );
            }
           
       )
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