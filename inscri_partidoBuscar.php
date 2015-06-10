<?php include './clases/Coneccion.php';?>
<?php session_start(); ?>
<?php 
    if (isset($_SESSION['usuario'])) {
        
    

 ?>
<pre>
<?php  
$sql ="SELECT * FROM inscri_partido WHERE id ='".$_REQUEST['id']."';";
        $datos= consultaD($con, $sql,3)
       ?>
      
       </pre>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta property="og:title" content="Simulador de votación"/>
<link rel="shortcut icon" href="imgs/deka.png">
<title>Sistema de votación</title>

<link href="./css/estilos.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
<script src="./libs/jquery-2.10.js"></script>
<link rel="stylesheet" href="./libs/jquery-ui/css/smoothness/jquery-ui-1.10.4.custom.min.css">
<script src="./libs/validacion/jquery.validate.min.js"></script>
<script src="./libs/validacion/jquery.messages.min.js"></script>
<script src="./libs/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="./libs/validacion/validacion_text_y_num.js"></script>
<link rel="stylesheet" href="./libs/bootstrap-3.0.3-dist/dist/css/bootstrap.min.css">
    <script src="./libs/jquery-ui/js/jquery-1.11.2.min.js"></script>
</head>
<body class="inicio">

<header>
<img src="imgs/deka.png" width="250px" height="50"><br>
<h1 class="px">Deka Copyright Elections<br>
<span>¡El Salvador!</span></h1>
<p>Inscripción de Partido Politico</p>
</header>
 <div class="container">


    <form action="modificarPartido.php" method="post">
        <table class="table-bordered">
          <div class="row">
            
                <div class="col-xs-2">
                    Nombre:
                </div>
               <div class="col-xs-2">
                <input type="hidden" name="id" value='<?php print $datos[0][0]?>'>
                <input type="text" name="nombre" value='<?php print $datos[0][1]?>' class="required form-control" placeholder="Nombre de Partido" minlength="2" required="true" onkeydown="return validarLetras(event)">
               </div>
           </div>
           <br>
        <div class="row">
        <div class="col-xs-2">
        Bandera:
        </div>
       
        <div id="preview" class="thumbnail">

        <a href="#" id="file-select" class="btn btn-default">Elegir archivo</a>
        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNzEiIGhlaWdodD0iM
        TgwIj48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijg1LjU
        iIHk9IjkwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhb
        nMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTcxeDE4MDwvdGV4dD48L3N2Zz4="/>
        <input class="input" id="filename" name="filename" value='<?php print $datos[0][2]?>' type="file"/>
      </div>
    </div>
    <!--<span class="alert alert-info" id="file-info">No hay archivo aún</span>-->
         <br>
        <div class="row">
            
                <div class="col-xs-2">
                    DUI:
                </div>
               <div class="col-xs-2">
                   <input type="text" name="dui" value='<?php print $datos[0][3]?>' maxlength="10" placeholder="00000000-0" class="required form-control" minlength="10" required="true" onkeydown="return validarNumeros(event)">

               </div>
           </div>
<br>
       
           
            <div class="row">
            
                <div class="col-xs-2">
                    Representante:
                </div>
               <div class="col-xs-2">
                   <input type="text" name="representante" value='<?php print $datos[0][4]?>' class="required form-control" placeholder="Nombre Representante" minlength="2" required="true" onkeydown="return validarLetras(event)"> 
               </div>
           </div>
             
             

<br> 
           <div class="row">
            
                <div class="col-xs-2">
                  Departamento:
                </div>
                <div class="col-xs-2">

                   <Select name="depa" id="depto" class="required form-control" required="true" onkeydown="return validarLetras(event)">
                        <option value='<?php print $datos[0][5]?>'>
                        <?php 
                        $sql2="select nombre from departamentos where id='".$datos[0][5]."'";
                        $da = consultaD($con,$sql2,3);                       
                        print $da[0][0];
                        ?>
                        </option>
                        <?php                
                            $sql = "SELECT id,nombre FROM departamentos WHERE id != '".$datos[0][5]."'";
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
                       <option value='<?php print $datos[0][6]?>'></option>
                        <?php                
                            $sql = "SELECT id,nombre FROM municipio WHERE id != '".$datos[0][6]."'";
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
             <div class="row">
                <td colspan="2">
                    <input type="submit" name='bot' value='Enviar' class="btn btn-primary">
                    <input type="submit" name='reset' value='Cancelar' class="btn btn-primary">
                    
                </div>
                  <div class="panel-heading">
            <a href="menu.php" class="label label-primary">Menu Principal</a><br><br>
            <a href="cerrar.php" class="label label-primary">Cerrar Sesion</a>
        </div>
            </div>
            </div>
        </table>

    </form>

</div>



</div>
<script>
    $(document).on('ready', function() {
    $('#preview').hover(
        function() {
            $(this).find('a').fadeIn();
        }, function() {
            $(this).find('a').fadeOut();
        }
    )
    $('#file-select').on('click', function(e) {
         e.preventDefault();
        
        $('#filename').click();
    })

    $('input[type=file]').change(function() {
        var file = (this.files[0].name).toString();
        var reader = new FileReader();
        
        $('#file-info').text('');
        $('#file-info').text(file);
        
         reader.onload = function (e) {
             $('#preview img').attr('src', e.target.result);
         }
         
         reader.readAsDataURL(this.files[0]);
    });
});
    </script>
<br><br><br>
<footer id="footer">
  Design <a href="http://www.facebook.com/DanielGarcia1994">DannyDj Garcia</a> And <a href="http://www.facebook.com/kevin.rogel08">Kvin Rögell</a> Thanks to ITCA Fepade Regional Zacatecoluca
  <p> &copy; Copyright DEKA 2015 Sistema Electoral </p>

</footer> 
</body>
</html>
 <?php }else{
    header("Location:index.php");
 } ?>