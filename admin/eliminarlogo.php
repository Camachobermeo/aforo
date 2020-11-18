<?php

if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "../utiles/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM logo WHERE id_logo = ?;");
$resultado = $sentencia->execute([$id]);
if ($resultado === true) {
    header("Location: tabla_logo.php?guardado=1");
} else {
    echo "Algo salió mal";
}