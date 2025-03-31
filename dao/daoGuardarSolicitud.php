<?php
include_once('db/db_Management.php');

$nomina = $_POST['nomina'];
$nombre = $_POST['nombre'];
$apu = $_POST['APU'];
$supervisor = $_POST['Supervisor'];
$shiftLeader = $_POST['ShiftLeader'];
$fecha = $_POST['Fecha'];

try {
    $con = new LocalConector();
    $conex=$con->conectar();

    $stmt = $conex->prepare("INSERT INTO `SolicitudVacaciones`(`NominaSolicitud`, `NombreSolicitud`, `APU`, `Supervisor`, `ShiftLeader`, `FechaSolicitud`, `Estatus`, `Comentarios`) VALUES (?,?,?,?,?,?,0,'')");
    $stmt->bind_param("ssssss", $nomina, $nombre, $apu, $supervisor,$shiftLeader,$fecha);

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(["success" => true, "message" => "Inserción exitosa"]);
    } else {
        echo json_encode(["success" => false, "message" => "No se pudo insertar el registro"]);
    }

    $stmt->close();
    $conex->close();

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}

?>