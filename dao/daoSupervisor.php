<?php

include_once('db/db_RH.php');

$APU = $_GET['APU'];

try {
    Contador($APU);
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

function Contador($APU)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    if (!$conex) {
        throw new Exception('No se pudo conectar: ' . mysqli_error($conex));
    }

    $datos = mysqli_query($conex, "SELECT `Supervisor` FROM `Encargados` WHERE `APU` LIKE '$APU' GROUP BY `Supervisor`;");

    if (!$datos) {
        throw new Exception('Error en la consulta: ' . mysqli_error($conex));
    }

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}

?>