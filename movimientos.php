<?php 
require_once 'CajaAhorro.php';
require_once 'CuentaCorriente.php';
require_once 'CajaAhorroEspecial.php';
require_once 'Cuenta.php';


//Indicamos que continuamos con la sesión iniciada anteriormente...
session_start();
//... y recuperamos la cuenta del usuario cuya sesión está activa.
$cuenta= unserialize($_SESSION['cuenta']);


$cuenta->muestraMovimientos($cuenta->movimientos);

 ?>