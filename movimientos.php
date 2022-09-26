<?php 
require_once 'CajaAhorro.php';
require_once 'CuentaCorriente.php';
require_once 'CajaAhorroEspecial.php';
require_once 'Cuenta.php';


session_start();

$cuenta= unserialize($_SESSION['cuenta']);


$cuenta->muestraMovimientos($cuenta->movimientos);

 ?>