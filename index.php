<!DOCTYPE html>
<html>

<head>
  <title>Totem</title>
  <link rel="stylesheet" href="utiles/bootstrap.min.css">
  <script src="utiles/jquery.js" type="text/javascript"></script>
  <script src="utiles/bootstrap.min.js" type="text/javascript"></script>
  <script src="reloj.js" type="text/javascript"></script>
</head>

<body class="p-2 mt-5">
  <br>

  <div class="row m-0">
    <div class="col-md-4">
      <div>
        <br><br>
        <h3 class='text-center' style='font-size: 40px' id="tambiente"> </h3>
      </div>
    </div>
    <div class="col-md-4 text-center">
      <img src="utiles/logo1.jpg" class="img-fluid" alt="..."></div>
    <input type="text" id="idRegistro" hidden>
    <div class="col-md-4">
      <br><br>
      <div id="reloj"></div>
    </div>
  </div>

  <br><br>

  <div class="row m-0 mt-5">
    <div id="car1" class="carousel-item active" style="border: 0;">
      <video id="mi-video" autoplay muted class="d-block w-100" style="border: 0;">
        <source src="utiles/video1.mp4" type="video/mp4">
      </video>
    </div>
  </div>

  <br><br>

  <div class="mt-5">
    <br><br>
    <div id="cuerpo"></div>
  </div>
  <br>
  <div id="aviso" hidden class="mt-4">
    <div class="text-center">
      <ul>
        <li style="list-style: none;">
          <h1><b> ① </b>Registra tu asistencia</h1>
        </li>
        <li style="list-style: none;">
          <h1><b> ② </b>Checkea tu temperatura</h1>
        </li>
        <li style="list-style: none;">
          <h1><b> ③ </b> Desinfecta tus manos</h1>
        </li>
      </ul>
      <h1>... Todo sin contacto</h1>
      <h1>#cuidemonosentretodos</h1><br>
    </div>
  </div>

  <br>

  <br><br>
</body>

<footer class="page-footer font-small stylish-color-dark pt-4 mb-4" style="bottom: 0; position: fixed; width: 100%;">

  <div class="row m-0">
    <div class="col-md-4">
    </div>
    <div class="col-md-4 text-center">
      <img src="utiles/logo2.jpg" class="img-fluid" alt="..."></div>
    <div class="col-md-4">
    </div>
  </div>

  <div class="footer-copyright text-center py-3 bg-light mt-3">
    <img src="utiles/logo1.jpg" class="rounded-circle" width="40" height="34">
    <a href="https://www.checkseguro.com/">www.checkseguro.com </a>
    <img src="utiles/icono_instagram.jpg" class="rounded-circle" width="63" height="43">@check_seguro
    <img src="utiles/icono_facebook.jpg" class="rounded-circle" width="50" height="40">Check Seguro

  </div>
</footer>

</html>

<script>
  $("#mi-video").on('ended', function() {
    var $fuente = "";
    $('#mi-video').find('source').each(function() {
      $fuente = $(this).attr('src');
    });

    switch ($fuente) {
      case "utiles/video1.mp4":
        $('source', $('#mi-video')).attr('src', "utiles/video2.mp4");
        break;
      case "utiles/video2.mp4":
        $('source', $('#mi-video')).attr('src', "utiles/video3.mp4");
        break;
      case "utiles/video3.mp4":
        $('source', $('#mi-video')).attr('src', "utiles/video4.mp4");
        break;
      case "utiles/video4.mp4":
        $('source', $('#mi-video')).attr('src', "utiles/video1.mp4");
        break;
      default:
        $('source', $('#mi-video')).attr('src', "utiles/video1.mp4");
        break;
    }
    $('#mi-video')[0].load();
    $('#mi-video')[0].play();
  });

  setInterval(function() {
    var idRegistro = document.getElementById("idRegistro").value;
    var cuerpo = document.getElementById("cuerpo").innerHTML;
    $("#cuerpo").load("funciones.php", {
      'idRegistro': idRegistro,
      'cuerpo': cuerpo
    });
  }, 300);
  setInterval(function() {
    location.reload();
  }, 500000);
</script>