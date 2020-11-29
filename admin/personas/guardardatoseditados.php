<?php

?>

<?php

if (
    !isset($_POST["nombre"]) ||
    !isset($_POST["apellidos"]) ||
    !isset($_POST["rut"]) ||
    !isset($_POST["rfid"])
) {
    exit();
}


include_once "../../utiles/base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$rut = $_POST["rut"];
$rfid = $_POST["rfid"];

try {

    $sentencia = $base_de_datos->prepare("UPDATE persona SET nombre = ?, apellidos = ?, rut = ?, rfid = ? WHERE id_persona = ?;");
    $resultado = $sentencia->execute([strtoupper($nombre), strtoupper($apellidos), strtoupper($rut), strtoupper($rfid), $id]);

    if ($resultado === true) {
        header("Location: listarpersona.php?guardado=1");
    } else {
        header("Location: editarpersona.php?id=$id&&daniado=1");
    }
} catch (\Throwable $th) {
    header("Location: editarpersona.php?id=$id&&daniado=1");
}
