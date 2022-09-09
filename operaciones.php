<?php
require_once 'CajaAhorro.php';
require_once 'CuentaCorriente.php';


//Indicamos que continuamos con la sesión iniciada anteriormente...
session_start();
//... y recuperamos la cuenta del usuario cuya sesión está activa.
$cuenta= unserialize($_SESSION['cuenta']);
?>
<!DOCTYPE html>
<html lang="es-ar">
<head>
<meta charset="UTF-8">
<title>Orientación a objetos</title>
</head>
<body>
<h1>Home banking</h1>
<p id="mensaje" style="color:red;">
<?php if (isset($_GET['m'])) { echo $_GET['m'];} ?>
</p>
<form action="operacion.php" method="post">
    <label for="saldo">Saldo de la cuenta:</label>
    <input name="saldo" id="saldo" readonly value="<?php echo $_GET['s'];  ?>"><br>
    <label for="tipo">Tipo de operación: </label>
    <select name="tipo">
        <option value="e">Extracción</option>
        <option value="d">Depósito</option>
    </select><br>
    <label for="monto">Monto: </label>
    <input name="monto" type="number"><br>
    <input type="submit" value="Realizar operación">
</form>
<ul>
    <?php
        $cuenta->movimientosCuenta();
    ?>
</ul>
</body>
</html>

