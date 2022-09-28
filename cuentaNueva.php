<?php
require_once 'CajaAhorro.php';
require_once 'CuentaCorriente.php';

if (isset($_POST['nombre']) && $_POST['nombre'] !== '' && isset($_POST['saldo'])) {
    if($_POST['tipo'] === "ca") {
        $cuenta = new CajaAhorro(rand(1000, 9999), $_POST['nombre'], (int) $_POST['saldo']);
    }
    elseif ($_POST['tipo'] === "cc" ) {
        $cuenta = new CuentaCorriente(rand(1000, 9999), $_POST['nombre'], (int) $_POST['saldo']);
    }
    else {
        die("Error en el tipo de cuenta");
    }
}
else {
    die("Error en el nombre o el saldo");
}

//Definimos variables de sesión:
session_start();
$_SESSION['cuenta'] = serialize($cuenta);
$arr = array();
$_SESSION['arrOperaciones'] = $arr;
$redirigir = 'operaciones.php?s='.$cuenta->getSaldo()."&m=Cuenta creada correctamente";
//Redirigimos al "Home banking", enviando por GET el saldo de la cuenta:
header("Location: $redirigir");
