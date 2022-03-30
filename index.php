<?php
function carga($clase){
    require("clases/$clase.php");
}

spl_autoload_register(carga);

if (isset($_POST['submit'])) {


    $operacion = null;
    $cadena =$_POST['operacion'];
    $tipo_operacion = Operacion::tipo_operacion($cadena);   // REAL RACIONAL ERROR

    switch ($tipo_operacon) {
        case Operacion::REAL:
            $operacion = new Operacion($cadena);
            $resultado = $operacion->calcula();
            $msj = "La operacion $operacion da como resultado $resultado es Real";
            break;
        case Operacion::RACIONAL:
            $operacion = new Operacion($cadena);
            $resultado = $operacion->calcula();
            $msj = "La operacion $operacion da como resultado $resultado es Real";
            $msj = "La operacion es Racional";
            break;
        case Operacion::ERROR:
            $msj = "La operacion no es permitida";
    }


    echo "<h1>He creado un objeto a partir del string <span style='color:green'>$cadena</h1>";
    echo "<h1>El tipo de operacion es $msj</h1>";
    if (!is_null($operacion))
        echo "valor de operacion :<h2> $operacion</h2>";

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="POST">
    Operacion <input type="text" name="operacion" id="">
    <input type="submit" value="Opera" name="submit">


</form>

</body>
</html>



