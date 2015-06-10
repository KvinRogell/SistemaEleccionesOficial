<?php
class VotanteControlador extends RegistroVotante{
   
    public function guardarDatos($con,$objAlumno) {
        $variableSql = "INSERT INTO registro ";
        $variableSql .= "(id,dui,nombre,apellido,foto,genero,";
        $variableSql .= "fecha,direccion,id_depa,id_muni) ";
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
        $variableSql.="'".$objAlumno[9]."');";        
        return consultaA($con, $variableSql);
        
        }

        public function modificarDatos($con,$objAlumno) {
        $variableSql = "UPDATE registro SET  ";
        $variableSql .= "dui = '".$objAlumno[1]."'";
        $variableSql .= "  ,nombre = '".$objAlumno[2]."'";
        $variableSql .= " ,apellido = '".$objAlumno[3]."'";
        $variableSql .= " ,foto = '".$objAlumno[4]."'";
        $variableSql .= " ,genero = '".$objAlumno[5]."'";
        $variableSql .= " ,fecha = '".$objAlumno[6]."'";
        $variableSql .= " ,direccion = '".$objAlumno[7]."'";
        $variableSql .= " ,id_depa = '".$objAlumno[8]."'";
        $variableSql .= " ,id_muni = '".$objAlumno[9]."'";
        $variableSql .= " WHERE id = ".$objAlumno[0].";";                
        return consultaA($con, $variableSql);
        
        }
}