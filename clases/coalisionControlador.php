<?php
class RegistroCoalision extends RegistroMunicipal{
   
    public function guardarDatos($con,$objAlumno) {
        $variableSql = "INSERT INTO coalision ";
        $variableSql .= "(id,id_depa,id_muni,partidos,tipo,cargo)";
        $variableSql .= "VALUES (";
        $variableSql.="'".$objAlumno[0]."',";
        $variableSql.="'".$objAlumno[1]."',";
        $variableSql.="'".$objAlumno[2]."',";
        $variableSql.="'".$objAlumno[3]."',";
        $variableSql.="'".$objAlumno[4]."',";
        $variableSql.="'".$objAlumno[5]."');";        
        return consultaA($con, $variableSql);
        
        }

        public function modificarDatos($con,$objAlumno) {
        $variableSql = "UPDATE coalision SET  ";
        $variableSql .= "id_depa = '".$objAlumno[1]."'";
        $variableSql .= "  ,id_muni = '".$objAlumno[2]."'";
        $variableSql .= " ,partidos = '".$objAlumno[3]."'";
        $variableSql .= " ,tipo = '".$objAlumno[4]."'";
        $variableSql .= " ,cargo = '".$objAlumno[5]."'";               
        return consultaA($con, $variableSql);
        
        }
}