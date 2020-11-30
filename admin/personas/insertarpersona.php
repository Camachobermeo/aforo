
<?php

?>
<?php

if (isset($_POST['subir'])) {
    $archivo = $_FILES['archivo']['name'];
    if (isset($archivo) && $archivo != "") {
        $tamano = $_FILES['archivo']['size'];
        $temp = $_FILES['archivo']['tmp_name'];
        if (move_uploaded_file($temp, '../../utiles/persona/' . $archivo)) {
            chmod('../../utiles/persona/' . $archivo, 0777);
        }else {
            header("Location: listarpersona.php");
        }
    }else {
        header("Location: listarpersona.php?fallo=1");
    }
}else {
    header("Location: listarpersona.php?fallo=1");
}

            if (!isset($_POST["nombre"]) || !isset($_POST["apellidos"]) || !isset($_POST["rut"]) || !isset($_POST["rfid"])) {
                exit();
            }

            include_once "../../utiles/base_de_datos.php";
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $rut = $_POST["rut"];
            $rfid = $_POST["rfid"];
            $url = $archivo;
            try {
                $sentencia = $base_de_datos->prepare("INSERT INTO persona(nombre, apellidos, rut, rfid, url_foto) VALUES (?, ?, ?, ?, ?);");
                $resultado = $sentencia->execute([strtoupper($nombre), strtoupper($apellidos), strtoupper($rut), strtoupper($rfid), strtoupper($url)]);

                if ($resultado === true) {
                    header("Location: listarpersona.php?guardado=1");
                } else {
                    header("Location: persona.php?fallo=1");
                }
            } catch (\Throwable $th) {
                header("Location: persona.php?fallo=1");
            }
        



