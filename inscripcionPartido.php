<?php include './clases/Coneccion.php';?>
<?php session_start(); ?>
<?php 
    if (isset($_SESSION['usuario'])) {
        
    

 ?>
<?php
$conexion = new mysqli('127.0.0.1', 'root', '', 'sistema_electoral');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta property="og:title" content="Simulador de votación"/>
<link rel="shortcut icon" href="imgs/icon.png">
<title>Sistema de votación</title>

<link href="./css/estilos.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
<script src="./libs/jquery-2.10.js"></script>
<script src="./libs/jquery-ui/js/jquery.js"></script>
<script src="./libs/validacion/jquery.validate.min.js"></script>
<script src="./libs/validacion/jquery.messages.min.js"></script>
<script src="./libs/validacion/validacion_text_y_num.js"></script>


     <script type="text/javascript">
            
function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
document.tree.miSelect.options[indice].text
}
var patron = new Array(2,2,4)
var patron2 = new Array(1,3,3,3,3)
var patron3 = new Array(8,1)
function mascara(d,sep,pat,nums){
if(d.valant != d.value){
  val = d.value
  largo = val.length
  val = val.split(sep)
  val2 = ''
  for(r=0;r<val.length;r++){
    val2 += val[r]  
  }
  if(nums){
    for(z=0;z<val2.length;z++){
      if(isNaN(val2.charAt(z))){
        letra = new RegExp(val2.charAt(z),"g")
        val2 = val2.replace(letra,"")
      }
    }
  }
  val = ''
  val3 = new Array()
  for(s=0; s<pat.length; s++){
    val3[s] = val2.substring(0,pat[s])
    val2 = val2.substr(pat[s])
  }
  for(q=0;q<val3.length; q++){
    if(q ==0){
      val = val3[q]
    }
    else{
      if(val3[q] != ""){
        val += sep + val3[q]
        }
    }
  }
  d.value = val
  d.valant = val
  }
}

        </script>
</head>
<body class="inicio">

<header>
<img src="imgs/deka.png" width="250px" height="50"><br>
<h1 class="px">Deka Copyright Elections<br>
<span>¡El Salvador!</span></h1>
<p>Inscripción de Partido Politico</p>
</header>
 <div class="container">


    <form action="manejadorPartido.php?accion=save" method="post" enctype="multipart/form-data">
        <table class="table-bordered">
          <div class="row">
            
                <div class="col-xs-2">
                    Nombre:
                </div>
               <div class="col-xs-2">
                   <input type="text" name="nombre" title="Insertar Nombre Partido" class="required form-control" placeholder="Nombre de Partido" minlength="2" required="true" onkeydown="return validarLetras(event)">
               </div>
           </div>
           <br>
        <div class="row">
        <div class="col-xs-2">
        Bandera:
        </div>
       
        <div id="preview" class="thumbnail">

        <a href="#" id="file-select" title="Insertar Bandera"class="btn btn-default">Elegir archivo</a>
        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNzEiIGhlaWdodD0iM
        TgwIj48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijg1LjU
        iIHk9IjkwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhb
        nMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTcxeDE4MDwvdGV4dD48L3N2Zz4=" title="Insertar Bandera"/>
        <input class="input" id="filename" name="filename" type="file"/>
      </div>
    </div>
    <!--<span class="alert alert-info" id="file-info">No hay archivo aún</span>-->
         <br>
        <div class="row">
            
                <div class="col-xs-2">
                    DUI:
                </div>
               <div class="col-xs-2">
                   <input type="text" name="dui" title="Insertar DUI" onkeyup="mascara(this,'-',patron3,true)" onkeypress="return justNumbers(event);" maxlength="10" placeholder="00000000-0" class="required form-control" minlength="10" required="true" onkeydown="return validarNumeros(event)">

               </div>
           </div>
<br>
       
           
            <div class="row">
            
                <div class="col-xs-2">
                    Representante:
                </div>
               <div class="col-xs-2">
                   <input type="text" name="representante" title="Insertar Representante" class="required form-control" placeholder="Nombre Representante" minlength="2" required="true" onkeydown="return validarLetras(event)"> 
               </div>
           </div>
             
             

<br>
            <div class="row">
            
                <div class="col-xs-2">
                    Departamento:
                </div>
               <div class="col-xs-2">
               <Select name="depa" id="depto" class="required form-control" title="Insertar Departamento" required="true" onkeydown="return validarLetras(event)">
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
               <Select name="muni" id="municipio" title="Insertar Municipio" class="required form-control" required="true" onkeydown="return validarLetras(event)">
                        <option value="">[Seleccionar...]</option>
                       
               </select>
               </div>
           </div> 
            
 <br>                  
             <div class="row">
                <td colspan="2">
                    
                    <input type="submit" name='bot' value='Enviar' class="btn btn-primary">
                    <input type="submit" name='reset' value='Cancelar' class="btn btn-primary">
                    
                </div>


                  <div class="panel-heading">
            <a href="menu.php" class="label label-primary">Menu Principal</a><br>
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
<script language="javascript">
    $(document).ready(function(){
        $("#depto").change(function () {
            $("#depto option:selected").each(function () {
                id_depto = $(this).val();
                $.post("municipio.php", { id_depto: id_depto }, function(data){
                    $("#municipio").html(data);
                });
            });
        })
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
