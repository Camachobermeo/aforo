
<?php

?>
<?php

if (!isset($_POST["nombre"]) || !isset($_POST["apellidos"]) || !isset($_POST["rut"]) || !isset($_POST["rfid"])) {
    exit();
}

include_once "../../utiles/base_de_datos.php";
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$rut = $_POST["rut"];
$rfid = $_POST["rfid"];

try {
$sentencia = $base_de_datos->prepare("INSERT INTO persona(nombre, apellidos, rut, rfid) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([strtoupper($nombre), strtoupper($apellidos), strtoupper($rut), strtoupper($rfid)]);

 if ($resultado === true) {
    header("Location: listarpersona.php?guardado=1");
 } else {
    header("Location: persona.php?fallo=1");
 }
} catch (\Throwable $th) {
    header("Location: persona.php?fallo=1");
}
 