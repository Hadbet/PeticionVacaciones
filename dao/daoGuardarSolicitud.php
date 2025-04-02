<?php
header('Content-Type: application/json');
include_once('db/db_Management.php');

$nomina = $_POST['nomina'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$apu = $_POST['APU'] ?? '';
$supervisor = $_POST['Supervisor'] ?? '';
$shiftLeader = $_POST['ShiftLeader'] ?? '';
$fecha = $_POST['Fecha'] ?? '';
$validarConcurrencia = $_POST['validarConcurrencia'] ?? false;

try {
    $con = new LocalConector();
    $conex = $con->conectar();

    // Iniciar transacción
    $conex->begin_transaction();

    // Validación de concurrencia
    if ($validarConcurrencia) {
        // 1. Obtener límite configurado para el Shift Leader
        $stmtLimit = $conex->prepare("
            SELECT Descripcion 
            FROM configuraciones 
            WHERE Tipo = 'Dias habilitados' 
            AND ShiftLeader = ?
        ");
        $stmtLimit->bind_param("s", $shiftLeader);
        $stmtLimit->execute();
        $resultLimit = $stmtLimit->get_result()->fetch_assoc();
        $limite = $resultLimit ? (int)$resultLimit['Descripcion'] : 1;

        // 2. Contar solicitudes existentes (con LOCK)
        $stmtCount = $conex->prepare("
            SELECT COUNT(*) as total 
            FROM SolicitudVacaciones 
            WHERE FechaSolicitud = ? 
            AND ShiftLeader = ?
            FOR UPDATE
        ");
        $stmtCount->bind_param("ss", $fecha, $shiftLeader);
        $stmtCount->execute();
        $resultCount = $stmtCount->get_result()->fetch_assoc();

        if ($resultCount['total'] >= $limite) {
            $conex->rollback();
            echo json_encode([
                "success" => false,
                "message" => "Límite de solicitudes alcanzado para este día",
                "error" => "concurrencia"
            ]);
            exit;
        }
    }

    // Insertar nueva solicitud
    $stmtInsert = $conex->prepare("
        INSERT INTO SolicitudVacaciones
        (NominaSolicitud, NombreSolicitud, APU, Supervisor, ShiftLeader, FechaSolicitud, Estatus, Comentarios) 
        VALUES (?, ?, ?, ?, ?, ?, 0, '')
    ");
    $stmtInsert->bind_param("ssssss", $nomina, $nombre, $apu, $supervisor, $shiftLeader, $fecha);
    $stmtInsert->execute();

    if ($stmtInsert->affected_rows > 0) {
        $conex->commit();
        echo json_encode([
            "success" => true,
            "message" => "Inserción exitosa",
            "id" => $stmtInsert->insert_id
        ]);
    } else {
        $conex->rollback();
        echo json_encode([
            "success" => false,
            "message" => "No se pudo insertar el registro"
        ]);
    }

    $stmtInsert->close();
    $conex->close();

} catch (Exception $e) {
    if (isset($conex)) {
        $conex->rollback();
    }
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Error en el servidor: " . $e->getMessage()
    ]);
}
?>