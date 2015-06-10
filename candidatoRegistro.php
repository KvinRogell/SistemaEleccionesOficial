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
<title>Sistema de votación</title>

<link href="./css/estilos.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
<script src="./libs/jquery-2.10.js"></script>
<link rel="stylesheet" href="./libs/jquery-ui/css/smoothness/jquery-ui-1.10.4.custom.min.css">
<script src="./libs/validacion/jquery.validate.min.js"></script>
<script src="./libs/validacion/jquery.messages.min.js"></script>
<script src="./libs/jquery-ui/js/jquery.js"></script>
<script src="./libs/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
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
<script languaje="javascript">

function habilita(form)
{
form.partidario.disabled=false;
}

function deshabilita(form)
{
form.partidario.disabled=true;
}

function submitForm(form){
oForm = window.document.forms[form];
formLen    = oForm.elements.length

  for (i=0; i<formLen; i++)
  {
    switch (oForm.elements[i].type)
    {
      case 'radio':
      if (oForm.elements[i].checked)
        if (oForm.elements[i].value != 'Partido'){
          valor = oForm.elements[i].value;
          document.forms[form].partidario2.value = valor;
        }
        else
        {
        if (document.forms['habilitar'].partidario.value != '' && document.forms['habilitar'].partidario.value!=0)
              {
      valor = document.forms['habilitar'].partidario.value;
      document.forms[form].partidario2.value = valor;
              }
        else{
          alert('Debe seleccionar un tipo de candidatura');
          return false
        }
      }
      break;
      
    }
  }
  window.document.forms[form].submit()
}

</script>
</head>
<body onload="javascript:document.forms[0].partidario.disabled=true;" id="candidato" class="inicio">

<header>
<img src="imgs/deka.png" width="250px" height="50"><br>
<h1 class="px">Deka Copyright Elections<br>
<span>¡El Salvador!</span></h1>
<p>Inscripción de Candidato</p>
</header>
 <div class="container">
        <form class="pager" action="manejadorCandidato.php?accion=save" method="post" id="candidato">
             <table class="table-bordered">
              <div class="row">
            
                <div class="col-xs-2">
                    DUI:
                </div>
               <div class="col-xs-2">
                   <input type="text" name="dui" onkeyup="mascara(this,'-',patron3,true)" onkeypress="return justNumbers(event);" maxlength="10" placeholder="00000000-0" class="required form-control" minlength="10" required="true" onkeydown="return validarNumeros(event)">
                   
               </div>
           </div>
<br>
          <div class="row">
            
                <div class="col-xs-2">
                    Apellido:
                </div>
               <div class="col-xs-2">
                   <input type="text" name="apellido" class="required form-control" placeholder="Apellido Candidato" minlength="2" required="true" onkeydown="return validarLetras(event)">
               </div>
           </div>

<br>
              <div class="row">
            
                <div class="col-xs-2">
                    Nombre:
                </div>
               <div class="col-xs-2">
                   <input type="text" name="nombre" placeholder="Nombre Candidato" class="required form-control" minlength="2" required="true" onkeydown="return validarLetras(event)">
               </div>
           </div>
           
           
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
          <div class="row">
               <div class="col-xs-3" >       
  
              <input type="radio" name ="opcion" onClick="habilita(this.form)" value="Partido"> Partido 
              <input type="radio" name ="opcion" onClick="deshabilita(this.form)" value="Coalision"> Coalisión
              <input type="radio" name ="opcion" onClick="deshabilita(this.form)" value="Independiente"> Independiente
               </div>
           </div>
<br>
<div class="row">
                
                <div class="col-xs-2">
                Seleccione:
                </div>
                <div class="col-xs-2">
                   <Select name="partidario" class="required form-control" required="true" onkeydown="return validarLetras(event)">
                        <option value="">[Seleccionar...]</option>
                       <?php
                  $result = $conexion->query("SELECT * FROM inscri_partido");
                  if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                  echo '<option value="'.$row['id'].'">'.utf8_encode($row['nombre_partido']).'</option>';
                  }
                }
                  ?>
               </select>
               </div>
           </div> 
           
<br> 
<div class="row">
            
                <div class="col-xs-2">
                  Departamento:
                </div>
                <div class="col-xs-2">
                   <Select name="depas" id="deptos" class="required form-control" required="true" onkeydown="return validarLetras(event)">
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
                   <Select name="munis" id="municipios" class="required form-control" required="true" onkeydown="return validarLetras(event)">
                        <option value="">[Seleccionar...]</option>
                       
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
                    <input type="submit" name='bot' value='Enviar' onclick="javascript:submitForm(this.form.name);" class="btn btn-primary">
                    <input type="submit" name='bot' value='Cancelar' class="btn btn-primary">
                </div>
             
                <div class="panel-heading">
            <a href="menu.php" class="label label-primary">Menu Principal</a><br>
            <a href="cerrar.php" class="label label-primary">Cerrar Sesion</a>
        </div>
            </div>
        </table>
           

     </form>




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
<script language="javascript">
    $(document).ready(function(){
        $("#deptos").change(function () {
            $("#deptos option:selected").each(function () {
                id_depto = $(this).val();
                $.post("municipio.php", { id_depto: id_depto }, function(data){
                    $("#municipios").html(data);
                });
            });
        })
    });
</script>
<br><br><br>
 <script type="text/javascript">
        $().ready(function () {
            $("#candidato").validate({});
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
