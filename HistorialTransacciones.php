<?php
require_once 'CajaAhorro.php';
require_once 'CuentaCorriente.php';

session_start();
$cuenta= unserialize($_SESSION['cuenta']);

foreach ($cuenta->getTransacciones() as $valor) {
    echo $valor;
}

?>