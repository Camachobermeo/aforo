<html>

<head>
  <?php
  $guardado = false;
  if ($_REQUEST)
    $guardado = $_REQUEST['exito'];
  ?>
  <?php include_once "encabezado.php" ?>
  <br>
  <script type="text/javascript">
    function changeParams() {
      // document.forms["loginForm"]["p"].value = window.btoa(document.forms["loginForm"]["p"].value);
      return true;
    }

    function enableCheckboxes(textbox, checkbox1, checkbox2) {
      var text = document.getElementById(textbox).value;
      document.getElementById(checkbox1).disabled = (text.length == 0);
      document.getElementById(checkbox2).disabled = (text.length == 0);
    }
  </script>
</head>
<div class="container">
  <div class="text-center">
    <?php
    if ($guardado) {
      echo "<div class='alert alert-success' role='alert' id='alerta'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <strong>Exito!</strong>    La operación solicitada se ha realizado correctamente.
     </div>";
    }
    ?>

    <body>

      <h1>Contador De Personas</h1>
      <br>
      <form name="loginForm" method="GET" action="escribirArchivo.php" onsubmit="changeParams()">
        <table class="table table-light">
          <tr>
            <td><label for="user">Usuario:</label></td>
            <td><input type="text" class="form-control" id="user" name="u"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><label for="pass">Clave:</label></td>
            <td><input type="password" class="form-control" id="pass" name="p"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><label for="camera1">Cámara 1:</label></td>
            <td><input type="text" class="form-control" id="camera1" name="ip1" oninput="enableCheckboxes('camera1', 'camera1_counter1', 'camera1_counter2')"></td>
            <td><input type="checkbox" id="camera1_counter1" name="ip1_c1" value="true" checked><label for="camera1_counter1"> Contador 1 </label></td>
            <td><input type="checkbox" id="camera1_counter2" name="ip1_c2" value="true"><label for="camera1_counter2"> Contador 2 </label></td>
          </tr>
          <tr>
            <td><label for="camera2">Cámara 2:</label></td>
            <td><input type="text" class="form-control" id="camera2" name="ip2" oninput="enableCheckboxes('camera2', 'camera2_counter1', 'camera2_counter2')"></td>
            <td><input type="checkbox" id="camera2_counter1" name="ip2_c1" value="true" checked><label for="camera2_counter1"> Contador 1 </label></td>
            <td><input type="checkbox" id="camera2_counter2" name="ip2_c2" value="true"><label for="camera2_counter2"> Contador 2 </label></td>
          </tr>
          <tr>
            <td><label for="camera3">Cámara 3:</label></td>
            <td><input type="text" class="form-control" id="camera3" name="ip3" oninput="enableCheckboxes('camera3', 'camera3_counter1', 'camera3_counter2')"></td>
            <td><input type="checkbox" id="camera3_counter1" name="ip3_c1" value="true" checked><label for="camera3_counter1"> Contador 1 </label></td>
            <td><input type="checkbox" id="camera3_counter2" name="ip3_c2" value="true"><label for="camera3_counter2"> Contador 2 </label></td>
          </tr>
          <tr>
            <td><label for="camera4">Cámara 4:</label></td>
            <td><input type="text" class="form-control" id="camera4" name="ip4" oninput="enableCheckboxes('camera4', 'camera4_counter1', 'camera4_counter2')"></td>
            <td><input type="checkbox" id="camera4_counter1" name="ip4_c1" value="true" checked><label for="camera4_counter1"> Contador 1 </label></td>
            <td><input type="checkbox" id="camera4_counter2" name="ip4_c2" value="true"><label for="camera4_counter2"> Contador 2 </label></td>
          </tr>
          <tr>
            <td><label for="camera5">Cámara 5:</label></td>
            <td><input type="text" class="form-control" id="camera5" name="ip5" oninput="enableCheckboxes('camera5', 'camera5_counter1', 'camera5_counter2')"></td>
            <td><input type="checkbox" id="camera5_counter1" name="ip5_c1" value="true" checked><label for="camera5_counter1"> Contador 1 </label></td>
            <td><input type="checkbox" id="camera5_counter2" name="ip5_c2" value="true"><label for="camera5_counter2"> Contador 2 </label></td>
          </tr>
          <tr>
            <td><label for="camera6">Cámara 6:</label></td>
            <td><input type="text" class="form-control" id="camera6" name="ip6" oninput="enableCheckboxes('camera6', 'camera6_counter1', 'camera6_counter2')"></td>
            <td><input type="checkbox" id="camera6_counter1" name="ip6_c1" value="true" checked><label for="camera6_counter1"> Contador 1 </label></td>
            <td><input type="checkbox" id="camera6_counter2" name="ip6_c2" value="true"><label for="camera6_counter2"> Contador 2 </label></td>
          </tr>
          <tr>
            <td><label for="camera7">Cámara 7:</label></td>
            <td><input type="text" class="form-control" id="camera7" name="ip7" oninput="enableCheckboxes('camera7', 'camera7_counter1', 'camera7_counter2')"></td>
            <td><input type="checkbox" id="camera7_counter1" name="ip7_c1" value="true" checked><label for="camera7_counter1"> Contador 1 </label></td>
            <td><input type="checkbox" id="camera7_counter2" name="ip7_c2" value="true"><label for="camera7_counter2"> Contador 2 </label></td>
          </tr>
          <tr>
            <td><label for="camera8">Cámara 8:</label></td>
            <td><input type="text" class="form-control" id="camera8" name="ip8" oninput="enableCheckboxes('camera8', 'camera8_counter1', 'camera8_counter2')"></td>
            <td><input type="checkbox" id="camera8_counter1" name="ip8_c1" value="true" checked><label for="camera8_counter1"> Contador 1 </label></td>
            <td><input type="checkbox" id="camera8_counter2" name="ip8_c2" value="true"><label for="camera8_counter2"> Contador 2 </label></td>
          </tr>
          <tr>
            <td><label for="max">Límite máximo:</label></td>
            <td><input type="text" class="form-control" class="form-control" id="max" name="max"></td>
            <td>personas.</td>
            <td></td>
          </tr>
          <tr>
            <td><label for="correction">Corrección:</label></td>
            <td><input type="text" class="form-control" id="correction" name="correction"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><label for="refresh">Actualizar:</label></td>
            <td><input type="text" class="form-control" id="refresh" name="refresh"></td>
            <td>segundos.</td>
            <td></td>
          </tr>
          <tr>
            <td><label for="logo_file">Archivo de logotipo:</label></td>
            <td><input type="text" class="form-control" id="logo_file" name="logo_file"></td>
            <td><label for="logo_width">Ancho (px):</label></td>
            <td><input type="text" class="form-control" id="logo_width" name="logo_width"></td>
          </tr>
          <tr>
            <td><label for="header">Encabezamiento</label></td>
            <td><input type="text" class="form-control" id="header" name="header"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><label for="stop">Detener mensaje:</label></td>
            <td><input type="text" class="form-control" id="stop" name="stop"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><label for="go">Ir mensaje:</label></td>
            <td><input type="text" class="form-control" id="go" name="go"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><label for="scrolling">Mensaje de desplazamiento</label></td>
            <td colspan="3"><textarea class="form-control" rows="3" cols="50" maxlength="150" id="scrolling" name="scrolling"></textarea></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="checkbox" id="debug" name="debug" value="true">
              <label for="debug"> Información de depuración</label></td>
            <td></td>
            <td class="text-right"><button type="submit" class="btn btn-primary">Enviar</button></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="checkbox" id="negative" name="negative" value="true">
              <label for="negative"> Permitir negativo</label></td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </form>

      <script src="../params.dat"></script>
      <script type="text/javascript">
        var dict = parseParams();
        var msg = "";

        for (var item in dict) {
          var key = item;
          var value = dict[item];

          if (value.length == "")
            continue;

          console.log(key + " = " + value);

          if (document.getElementById(key).type.toLowerCase() == 'checkbox') {
            document.getElementById(key).checked = (value === 'true');
            continue;
          }
          document.getElementById(key).value = value;
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
      </script>
      <br><br><br>

  </div>
</div>
<?php include_once "../pie.php" ?>
</body>

</html>