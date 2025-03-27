<?php

include_once('db/db_Management.php');

$shiftLeader = $_GET['shiftLeader'];

Contador($shiftLeader);

function Contador($shiftLeader)
{
    $con = new LocalConector();
    $conex = $con->conectar();

    $datos = mysqli_query($conex, "SELECT `IdSolicitud`, `NominaSolicitud`, `NombreSolicitud`, `APU`, `Supervisor`, `ShiftLeader`, `FechaSolicitud`, `Estatus` 
                                        FROM `SolicitudVacaciones` 
                                        WHERE `Estatus` <> 2 and `ShiftLeader` like '$shiftLeader'");

    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode(array("data" => $resultado));
}


?>