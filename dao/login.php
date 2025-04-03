<?php
require 'daoUsuario.php';

session_start();
$Nomina = $_POST['numNomina'];
$Password = $_POST['password'];

if (strlen($Nomina) == 1) { $Nomina = "0000000".$Nomina; }
if (strlen($Nomina) == 2) { $Nomina = "000000".$Nomina; }
if (strlen($Nomina) == 3) { $Nomina = "00000".$Nomina; }
if (strlen($Nomina) == 4) { $Nomina = "0000".$Nomina; }
if (strlen($Nomina) == 5) { $Nomina = "000".$Nomina; }
if (strlen($Nomina) == 6) { $Nomina = "00".$Nomina; }
if (strlen($Nomina) == 7) { $Nomina = "0".$Nomina; }

$statusLogin = consultarUsuarioVerificacion($Nomina, $Password);

if ($statusLogin['status'] == 1) {
    $_SESSION['nomina'] = $statusLogin['idUser'];
    $_SESSION['nombre'] = $statusLogin['nomUser'];
    $_SESSION['tag'] = $statusLogin['idTag'];
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../inicio.php'>";
} else if ($statusLogin['status'] == 2) {
    echo "<script>alert('Tag o Usuario incorrecta')</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../index.html'>";
}

?>