<?php

include_once('db/db_RH.php');

$APU = $_GET['APU'];

Contador($APU);

function Contador($APU)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT `ShiftLeader` FROM `Encargados` WHERE `APU` like '$APU';");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>