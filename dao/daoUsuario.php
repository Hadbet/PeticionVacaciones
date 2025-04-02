<?php
include_once('db/db_Emp.php');
function consultarUsuarioVerificacion($usuario,$contra){
    try {
        $con = new LocalConector();
        $conex=$con->conectar();

        // Buscamos al usuario en la base de datos
        $stmt = $conex->prepare("SELECT `IdUser`, `NomUser`, `IdCentroCostos`, `IdTag`, `NombreCC`, `WC`, `NombreWC` FROM `Empleados` 
                                                                                    WHERE `IdUser` = ? and `IdTag` = ?");
        $stmt->bind_param("ss", $usuario,$contra);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return ['status' => 1, 'idUser' => $row['IdUser'], 'nomUser' => $row['NomUser'], 'idTag' => $row['idTag']];
        } else {
            return ['status' => 2];
        }

        $stmt->close();
        $conex->close();

    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => $e->getMessage()]);
    }
}

?>