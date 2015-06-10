<?php include './clases/Coneccion.php';?>
<?php session_start(); ?>
<?php 
    if (isset($_SESSION['usuario'])) {
        
    

 ?>
<pre>
<?php  
$sql ="SELECT * FROM candidato WHERE id ='".$_REQUEST['id']."';";
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
<p>Formulario De Inscripción De Candidato</p>
</header>
 <div class="container">
        <form class="pager" action="modificarCandidato.php" method="post" id="candidato">
             <table class="table-bordered">
              <div class="row">
            
                <div class="col-xs-2">
                    DUI:
                </div>
               <div class="col-xs-2">
               <input type="hidden" name="id" value='<?php print $datos[0][0]?>'>
               <input type="text" name="dui"  value='<?php print $datos[0][1]?>' maxlength="10" placeholder="00000000-0" class="required form-control" minlength="10" required="true" onkeydown="return validarNumeros(event)">
                   
               </div>
           </div>
<br>
          <div class="row">
            
                <div class="col-xs-2">
                    Apellido:
                </div>
               <div class="col-xs-2">
                   <input type="text" name="apellido" value='<?php print $datos[0][2]?>' class="required form-control" placeholder="Apellido Candidato" minlength="2" required="true" onkeydown="return validarLetras(event)">
               </div>
           </div>

<br>
              <div class="row">
            
                <div class="col-xs-2">
                    Nombre:
                </div>
               <div class="col-xs-2">
                   <input type="text" name="nombre" value='<?php print $datos[0][3]?>' placeholder="Nombre Candidato" class="required form-control" minlength="2" required="true" onkeydown="return validarLetras(event)">
               </div>
           </div>
           
           
<br> 
           <div class="row">
            
                <div class="col-xs-2">
                  Departamento:
                </div>
                <div class="col-xs-2">

                   <Select name="depa" id="depto" class="required form-control" required="true" onkeydown="return validarLetras(event)">
                        <option value='<?php print $datos[0][4]?>'>
                        <?php 
                        $sql2="select nombre from departamentos where id='".$datos[0][4]."'";
                        $da = consultaD($con,$sql2,3);                       
                        print $da[0][0];
                        ?>
                        </option>
                        <?php                
                            $sql = "SELECT id,nombre FROM departamentos WHERE id != '".$datos[0][4]."'";
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
                       <option value='<?php print $datos[0][5]?>'></option>
                        <?php                
                            $sql = "SELECT id,nombre FROM municipio WHERE id != '".$datos[0][5]."'";
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
               <div class="col-xs-3" >       
  
              <input type="radio" name ="opcion" value='<?php print $datos[0][6]?>' onClick="habilita(this.form)" value="Partido"> Partido 
              <input type="radio" name ="opcion" value='<?php print $datos[0][6]?>' onClick="deshabilita(this.form)" value="Coalision"> Coalisión
              <input type="radio" name ="opcion" value='<?php print $datos[0][6]?>' onClick="deshabilita(this.form)" value="Independiente"> Independiente
              
               </div>
           </div>
<br>
<div class="row">
                
                <div class="col-xs-2">
                Seleccione:
                </div>
                <div class="col-xs-2">
                   <Select name="partidario" class="required form-control" required="true" onkeydown="return validarLetras(event)">
                        <option value='<?php print $datos[0][7]?>'>
                        
                        </option>
                        <?php                
                            $sql = "SELECT id,nombre_partido FROM inscri_partido WHERE id != '".$datos[0][7]."'";
                            $datos = consultaD($con, $sql);
                            foreach ($datos as $value) {
                                print "<option value='";
                                print $value['id'];
                                print "'>";
                                print $value['nombre_partido'];
                                print "</option>";
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
                   <Select name="munis" id="municipios" class="required form-control" required="true" onkeydown="return validarLetras(event)">
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
            <a href="menu.php" class="label label-primary">Menu Principal</a><br><br>
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