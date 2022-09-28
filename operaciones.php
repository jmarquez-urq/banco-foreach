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
    <input type="button" value="Ultimos Movimientos" onclick="mostrar()">
<?php
session_start();
    $arr = $_SESSION['arrOperaciones'];
    if (count($arr) > 0){
        echo "<table style='display:none' id='tablaMovimientos' border='1'><tr><th>Registro de Operaciones</th></tr>";
        foreach ($arr as $key => $value) {
            echo "<tr><td>".$value."</td></tr>";
        }
        echo "</table>";
    }
?>
<script>
    function mostrar(){
        tabla = document.getElementById('tablaMovimientos')
        if (tabla.style.display == 'none') {
            tabla.style.display = 'table'
        }else{
            tabla.style.display = 'none'
        }
        
    }
    </script>
</body>
</html>

