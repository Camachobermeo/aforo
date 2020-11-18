
<?php

?>
<?php

// if (!isset($_POST["archivo"])) {
//     exit();
// }

include_once "../../utiles/base_de_datos.php";
$url = "utiles/videos/video1.mp4";
try {
$sentencia = $base_de_datos->prepare("INSERT INTO video(url_video) VALUES (?);");
$resultado = $sentencia->execute ([$url]);

 if ($resultado === true) {
    header("Location: tablavideo.php?guardado=1");
 } else {
    header("Location: videos.php?fallo=1");
 }
} catch (\Throwable $th) {
    header("Location: videos.php?fallo=1");
}
 