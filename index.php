<!DOCTYPE html>
<html>

<head>
  <title>Totem</title>
  <link rel="stylesheet" href="utiles/bootstrap.min.css">
  <link rel="stylesheet" href="utiles/texto.css">
  <script src="utiles/jquery.js" type="text/javascript"></script>
  <script src="utiles/bootstrap.min.js" type="text/javascript"></script>
  <script src="reloj.js" type="text/javascript"></script>
</head>

<?php
include_once "utiles/base_de_datos.php";
$url = "";
$sentencia = $base_de_datos->query("select * from video");
$videos = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach ($videos as $aforo) {
  $url = $aforo->url_video;
}
?>

<body class="p-2 mt-1">

  <div class="row m-0">
    <div class="col-md-4">
      <img src="utiles/logo1.jpg" width="150" style="position: absolute; left: 0; padding: 10px;"></img>
    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
      <img id="logo" src="utiles/logo.png" width="180" style="position: absolute; right: 0; padding: 10px;" class="mt-3"></img>
    </div>
  </div>
  <br> <br> <br> <br>
  <div class="row m-0 mt-5">
    <video id="mi-video" autoplay muted width="100%" height="630px" class="d-block" style="border: 0;">
      <source src="utiles/videos/<?php echo $url ?>" type="video/mp4">
    </video>
  </div>
  <br>
  <br>
  <br>
  <table class="container mb-5" id="tabla" style="border-radius: 10%;">
    <tr>
      <td>
        <table>
          <tr>
            <td width=50% class="text-center pt-4">
              <div id="header" style="font-size: 300%;">Bienvenido!</div><br><br>
              <div style="font-size: 200%;">Aforo Actual:</div>
              <strong>
                <div id="div_total" style="font-size: 850%;">0</div>
              </strong>
              <div style="font-size: 200%;">Aforo Permitido:</div>
              <div id="div_max" style="font-size: 600%;">100</div><br>
              <strong>
                <div id="msg" style="font-size: 200%;"></div>
              </strong>
            </td>
            <td width=50%><img id="sign" src="utiles/go.png" width="85%"></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <div id="marquee">
          <div id="scrolling"></div>
        </div><br>
        <div id="debug" style="font-size: 80%;"></div>
  </table>

  <script src="params.dat"></script>
  <script>
    // initialization //////////////////////////////////////////
    var videos = <?php echo json_encode($videos); ?>;
    var dict = parseParams();
    updateData();

    // functions //////////////////////////////////////////
    function getTotal(ip, user, pass, counter, debug) {
      var xmlHttp = new XMLHttpRequest();
      // xmlHttp.open("GET", "http://190.160.219.189:8000/init-cgi/pw_init.cgi?msubmenu=statuscheck&action=view&date=1606509030635", false, user, pass); // false for synchronous request
      xmlHttp.open("GET", "http://" + ip + "/stw-cgi/eventsources.cgi?msubmenu=peoplecount&action=check&Channel=0", false, user, pass); // false for synchronous request
      xmlHttp.withCredentials = true;
      xmlHttp.send(null);

      var str = xmlHttp.responseText;

      var in_key = "." + counter + ".InCount=";
      var out_key = "." + counter + ".OutCount=";
      var in_pos = str.indexOf(in_key) + in_key.length;
      var in_end = str.indexOf("\r", in_pos);
      var in_value = Number(str.slice(in_pos, in_end));
      var out_pos = str.indexOf(out_key) + out_key.length;
      var out_end = str.indexOf("\r", out_pos);
      var out_value = Number(str.slice(out_pos, out_end));
      var total = in_value - out_value;

      if (debug) {
        if (str.indexOf('401 - Unauthorized') >= 0)
          printDebug(' >> Connection or Login problem. Please first try to log-in to the camera(s) WebViewer page.<br>');
        else
          printDebug(" | Counter " + counter + ", In " + in_value + ", Out " + out_value + ", Total " + total);
      }
      return total;
    }

    function parseParams() {
      var dictionary = {};
      if (data.indexOf('$') === 0) {
        data = data.substr(1);
      }
      var parts = data.split('$');
      for (var i = 0; i < parts.length; i++) {
        var p = parts[i];
        var keyValuePair = p.split('=');
        var key = keyValuePair[0];
        var value = keyValuePair[1];
        dictionary[key] = value;
      }
      return dictionary;
    }

    function updateData() {
      var u = dict['user'];
      // var p = window.atob(dict['pass']);
      var p = window.atob(dict['pass']);
      var debug = dict['debug'];

      if (debug)
        clearDebug();

      var max = 50;
      if (dict["max"] && !isNaN(dict["max"]))
        max = Number(dict["max"]);

      var logo_file = "utiles/logo.png";
      if (dict["logo_file"])
        logo_file = "utiles/logos/" + dict["logo_file"];

      var logo_width = 150;
      if (dict["logo_width"] && !isNaN(dict["logo_width"]))
        logo_width = Number(dict["logo_width"]);

      document.getElementById("logo").src = logo_file;
      document.getElementById("logo").width = logo_width;

      var total = 0;

      for (var i = 1; i <= 8; i++) {
        if (dict["camera" + i]) {
          var ip = dict["camera" + i];
          var c1 = dict["camera" + i + "_counter1"];
          var c2 = dict["camera" + i + "_counter2"];

          if (ip == "" || u == "" || p == "")
            continue;

          if (debug)
            printDebug("IP " + ip);

          if (c1)
            total += getTotal(ip, u, p, 1, debug);

          if (c2)
            total += getTotal(ip, u, p, 2, debug);

          if (debug && !isNaN(total))
            printDebug(" | <a onclick=\"resetCounters('" + ip + "', '" + u + "', '" + p + "')\" href=\"#\"><font size='-3' color='red'>RESET</font></a><br>");
        }
      }

      var correction = 0;
      if (dict["correction"] && !isNaN(dict["correction"]))
        correction = Number(dict["correction"]);

      if (debug && !isNaN(total))
        printDebug("Correction: " + correction + "<br>");

      var header = "Bienvenido!";
      if (dict["header"])
        header = dict["header"];

      document.getElementById("header").innerHTML = header;

      var msg_stop = "Por Favor Espere...!";
      if (dict["stop"])
        msg_stop = dict["stop"];

      var msg_go = "Ud puede pasar!";
      if (dict["go"])
        msg_go = dict["go"];

      var msg_scrolling = "";
      if (dict["scrolling"])
        msg_scrolling = dict["scrolling"];

      total += correction;

      if (total < 0 && dict["negative"] == false)
        total = 0;

      var refresh = 5;
      if (dict["refresh"] && !isNaN(dict["refresh"]))
        refresh = Number(dict["refresh"]);

      if (isNaN(total)) {
        document.getElementById("div_total").innerHTML = "N/A";
        document.getElementById("div_max").innerHTML = "N/A";
        document.getElementById("sign").style.display = "none";
        setTimeout(updateData, refresh * 1000);
        return;
      }

      document.getElementById("div_total").innerHTML = total.toString();
      document.getElementById("div_max").innerHTML = max.toString();
      document.getElementById("sign").style.display = "";
      if (total >= max) {
        // document.body.style.backgroundColor = "#f0c0c0";
        document.getElementById("tabla").style.background = "#f0c0c0";
        // document.getElementById("marquee").style.background = "#f0c0c0";
        document.getElementById("div_total").style.color = "red";
        document.getElementById("msg").innerHTML = msg_stop;
        document.getElementById("msg").style.color = "red";
        document.getElementById("sign").src = "utiles/stop.png";
      } else {
        // document.body.style.backgroundColor = "#c0f0c0";
        document.getElementById("tabla").style.background = "#c0f0c0";
        // document.getElementById("marquee").style.background = "#c0f0c0";
        document.getElementById("div_total").style.color = "green";
        document.getElementById("msg").innerHTML = msg_go;
        document.getElementById("msg").style.color = "green";
        document.getElementById("sign").src = "utiles/go.png";
      }
      document.getElementById("scrolling").innerHTML = msg_scrolling;
      setTimeout(updateData, refresh * 1000);
    }

    function resetCounters(ip, user, pass) {
      var xmlHttp = new XMLHttpRequest();
      xmlHttp.open("GET", "http://" + ip + "/stw-cgi/system.cgi?msubmenu=databasereset&action=control&IncludeDataType=PeopleCount", false, user, pass); // false for synchronous request
      xmlHttp.withCredentials = true;
      xmlHttp.send(null);
      updateData();
    }

    function printDebug(text) {
      document.getElementById("debug").innerHTML = document.getElementById("debug").innerHTML + text;
    }

    function clearDebug() {
      document.getElementById("debug").innerHTML = "Debug Info: <a onclick=\"hideDebug()\" href=\"#\"><font size='-3' color='green'>[HIDE]</font></a><br>";
    }

    function hideDebug() {
      var url = window.location.href;
      url = url.replace('&debug=true', '').replace('&debug', '');
      window.location.href = url;
    }

    $("#mi-video").on('ended', function() {
      var $fuente = "";
      $('#mi-video').find('source').each(function() {
        $fuente = $(this).attr('src');
      });

      var index = videos.findIndex(item => "utiles/videos/" + item.url_video == $fuente);

      if (index >= 0 && index < videos.length - 1) {
        $('source', $('#mi-video')).attr('src', "utiles/videos/" + videos[index + 1].url_video);
      } else {
        $('source', $('#mi-video')).attr('src', "utiles/videos/" + videos[0].url_video);
      }
      $('#mi-video')[0].load();
      $('#mi-video')[0].play();
    });

    $('video source').last().on('error', function() {
      var $fuente = "";
      $('#mi-video').find('source').each(function() {
        $fuente = $(this).attr('src');
      });

      var index = videos.findIndex(item => "utiles/videos/" + item.url_video == $fuente);

      if (index >= 0 && index < videos.length - 1) {
        $('source', $('#mi-video')).attr('src', "utiles/videos/" + videos[index + 1].url_video);
      } else {
        $('source', $('#mi-video')).attr('src', "utiles/videos/" + videos[0].url_video);
      }
      $('#mi-video')[0].load();
      $('#mi-video')[0].play();
    });
  </script>

</body>

<footer class="page-footer font-small stylish-color-dark pt-4 mb-4" style="bottom: 0; width: 100%;">
  <div class="footer-copyright text-center py-3 bg-light mt-3">
    <img src="utiles/logo1.jpg" class="rounded-circle" width="40" height="34">
    <a href="https://www.checkseguro.com/">www.checkseguro.com </a>
    <img src="utiles/icono_instagram.jpg" class="rounded-circle" width="63" height="43">@check_seguro
    <img src="utiles/icono_facebook.jpg" class="rounded-circle" width="50" height="40">Check Seguro
  </div>
</footer>

</html>