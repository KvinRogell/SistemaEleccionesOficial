<?php
class CandidatoControlador extends RegistroCandidato{
   
    public function guardarDatos($con,$objAlumno) {
        $variableSql = "INSERT INTO candidato ";
        $variableSql .= "(id,dui,apellido,nombre,id_depa,id_muni,tipo,";
        $variableSql .= "id_inscrip_parti,id_depas,id_munis,id_cargo) ";
        $variableSql .= "VALUES (";
        $variableSql.="'".$objAlumno[0]."',";
        $variableSql.="'".$objAlumno[1]."',";
        $variableSql.="'".$objAlumno[2]."',";
        $variableSql.="'".$objAlumno[3]."',";
        $variableSql.="'".$objAlumno[4]."',";
        $variableSql.="'".$objAlumno[5]."',";
        $variableSql.="'".$objAlumno[6]."',";
        $variableSql.="'".$objAlumno[7]."',";
        $variableSql.="'".$objAlumno[8]."',";
        $variableSql.="'".$objAlumno[9]."',";
        $variableSql.="'".$objAlumno[10]."');";        
        return consultaA($con, $variableSql);
        
        }

        public function modificarDatos($con,$objAlumno) {
        $variableSql = "UPDATE candidato SET  ";
        $variableSql .= "dui = '".$objAlumno[1]."'";
        $variableSql .= "  ,apellido = '".$objAlumno[2]."'";
        $variableSql .= " ,nombre = '".$objAlumno[3]."'";
        $variableSql .= " ,id_depa = '".$objAlumno[4]."'";
        $variableSql .= " ,id_muni = '".$objAlumno[5]."'";
        $variableSql .= " ,tipo = '".$objAlumno[6]."'";
        $variableSql .= " ,id_inscrip_parti = '".$objAlumno[7]."'";
        $variableSql .= " ,id_depas = '".$objAlumno[8]."'";
        $variableSql .= " ,id_munis = '".$objAlumno[9]."'";
        $variableSql .= " ,id_cargo = '".$objAlumno[10]."'";
        $variableSql .= " WHERE id = ".$objAlumno[0].";";                
        return consultaA($con, $variableSql);
        
        }
}