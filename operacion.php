<?php
require_once 'CajaAhorro.php';
require_once 'CuentaCorriente.php';


//Indicamos que continuamos con la sesión iniciada anteriormente...
session_start();
//... y recuperamos la cuenta del usuario cuya sesión está activa.
$cuenta= unserialize($_SESSION['cuenta']);


$mensaje="Operación no realizada";
$ultimo="";

/* Como ahora existen 2 botones, se condiciona el funcionamiento dependiendo de cual
   se seleccione mediante el name.
*/

if (isset($_REQUEST['rc'])){

    switch($_POST["tipo"]) {
    case "e":
        //Polimorfismo: No sabemos si $cuenta es CajaAhorro o CuentaCorriente,
        //pero igualmente le enviamos el mensaje extraer, que hará lo correcto
        //en cualquiera de los dos casos:

/* Como tiraba ERROR en caso de que no se inserte ningún monto, 
se agregó este condicional
*/
        if ($_POST['monto']==""){
            $mensaje="Debe insertar un monto";
            break;
        }else{
            $mensaje=$cuenta->extraer($_POST['monto']);
        break;
        }
        
    case "d":
        //Polimorfismo con el mensaje depositar:
        if ($_POST['monto']==""){
            $mensaje="Debe insertar un monto";
            break;
        }else{
            $mensaje=$cuenta->depositar($_POST['monto']);
        break;
        };
    default:
        $mensaje="Operacion inexistente";
        break;                
    }
//Sobreescribo la variable de sesión con los nuevos datos.
$_SESSION['cuenta'] = serialize($cuenta);
$redirigir = 'operaciones.php?s='.$cuenta->getSaldo()."&m=$mensaje";

header("Location: $redirigir");

}

if (isset($_REQUEST["um"])){

/*
A la nueva variable $ultimo se le asigna el texto que retornará la funcion mostarUltim
y se resetea la variable $mensaje.
*/
    $ultimo=$cuenta->mostrarUltim();
    $mensaje="";

    $_SESSION['cuenta'] = serialize($cuenta);
    
    $redirigir = 'operaciones.php?s='.$cuenta->getSaldo()."&m=$mensaje"."&u=$ultimo";

    header("Location: $redirigir");
}


