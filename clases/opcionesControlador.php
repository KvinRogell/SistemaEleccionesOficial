<?php
class OpcionesControlador extends Opciones{
   
    public function guardarDatos($con,$objAlumno) {
        $variableSql = "INSERT INTO cargo ";
        $variableSql .= "(id,tipo_cargo,year_electoral) ";
        $variableSql .= "VALUES (";
        $variableSql.="'".$objAlumno[0]."',";
        $variableSql.="'".$objAlumno[1]."',";
        $variableSql.="'".$objAlumno[2]."');";        
        return consultaA($con, $variableSql);
        
        }

        public function modificarDatos($con,$objAlumno) {
        $variableSql = "UPDATE cargo SET  ";
        $variableSql .= "tipo_cargo = '".$objAlumno[1]."'";
        $variableSql .= " ,year_electoral = '".$objAlumno[2]."'";        
        $variableSql .= " WHERE id = ".$objAlumno[0].";";                
        return consultaA($con, $variableSql);
        
        }
}
