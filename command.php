<?php 
include 'conexion.php';

$cmd = $_REQUEST["cmd"]; //$_POST O $_GET



switch ($cmd){
     

    case "listarProfesiones":

       
        $sql = "SELECT * FROM funciones.profesion";
 
     
        $result = pg_query($conn, $sql);      
        $lastError = pg_last_error($conn );
        print_r($result);

        $obj = array();

        if ($lastError) {
           
            array_push($obj, array("error" => $lastError 
            ));
        }else{
            while ($row = pg_fetch_object($result)) {
                array_push($obj, array(
                    "idprofesion" => $row->idprofesion,
                    "nombre"    => utf8_encode($row->nombre)
                   
                ));
            }
        }
        
        
        echo json_encode($obj);
    break;
    
    default:
        die("cmd incorrecto");
    break;
}

?>