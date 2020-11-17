<html>
<head>

<?php include_once "encabezado.php" ?>
<br>
<script type="text/javascript">
function changeParams() {
document.forms["loginForm"]["p"].value = window.btoa(document.forms["loginForm"]["p"].value);
return true;
}
function enableCheckboxes(textbox, checkbox1, checkbox2) {
var text = document.getElementById(textbox).value;
document.getElementById(checkbox1).disabled = (text.length == 0);
document.getElementById(checkbox2).disabled = (text.length == 0);
}
</script>
</head>
<body style="font-family:verdana;">

<h1>People Counter Login</h1>
<br>
<form name="loginForm" method="GET" action="./funcion-de-ajuste.php" onsubmit="changeParams()">
<table>
<div type="center">
<tr>
<td><label for="user">Username:</label></td>
<td><input type="text" id="user" name="u" value="totem"></td><td></td><td></td>
</tr>
<tr>
<td><label for="pass">Password:</label></td>
<td><input type="password" id="pass" name="p" value="Melli123"></td><td></td><td></td>
</tr>
<tr>
<td><label for="camera1">Camera 1:</label></td>
<td><input type="text" id="camera1" name="ip1" value="192.168.0.100" oninput="enableCheckboxes('camera1', 'camera1_counter1', 'camera1_counter2')"></td>
<td><input type="checkbox" id="camera1_counter1" name="ip1_c1" value="true" checked><label for="camera1_counter1">Counter 1</label></td>
<td><input type="checkbox" id="camera1_counter2" name="ip1_c2" value="true"><label for="camera1_counter2">Counter 2</label></td>
</tr>
<tr>
<td><label for="camera2">Camera 2:</label></td>
<td><input type="text" id="camera2" name="ip2" value="" oninput="enableCheckboxes('camera2', 'camera2_counter1', 'camera2_counter2')"></td>
<td><input type="checkbox" id="camera2_counter1" name="ip2_c1" value="true" checked disabled="true"><label for="camera2_counter1">Counter 1</label></td>
<td><input type="checkbox" id="camera2_counter2" name="ip2_c2" value="true" disabled="true"><label for="camera2_counter2">Counter 2</label></td>
</tr>
<tr>
<td><label for="camera3">Camera 3:</label></td>
<td><input type="text" id="camera3" name="ip3" value="" oninput="enableCheckboxes('camera3', 'camera3_counter1', 'camera3_counter2')"></td>
<td><input type="checkbox" id="camera3_counter1" name="ip3_c1" value="true" checked disabled="true"><label for="camera3_counter1">Counter 1</label></td>
<td><input type="checkbox" id="camera3_counter2" name="ip3_c2" value="true" disabled="true"><label for="camera3_counter2">Counter 2</label></td>
</tr>
<tr>
<td><label for="camera4">Camera 4:</label></td>
<td><input type="text" id="camera4" name="ip4" value="" oninput="enableCheckboxes('camera4', 'camera4_counter1', 'camera4_counter2')"></td>
<td><input type="checkbox" id="camera4_counter1" name="ip4_c1" value="true" checked disabled="true"><label for="camera4_counter1">Counter 1</label></td>
<td><input type="checkbox" id="camera4_counter2" name="ip4_c2" value="true" disabled="true"><label for="camera4_counter2">Counter 2</label></td>
</tr>
<tr>
<td><label for="camera5">Camera 5:</label></td>
<td><input type="text" id="camera5" name="ip5" value="" oninput="enableCheckboxes('camera5', 'camera5_counter1', 'camera5_counter2')"></td>
<td><input type="checkbox" id="camera5_counter1" name="ip5_c1" value="true" checked disabled="true"><label for="camera5_counter1">Counter 1</label></td>
<td><input type="checkbox" id="camera5_counter2" name="ip5_c2" value="true"><label for="camera5_counter2">Counter 2</label></td>
</tr>
<tr>
<td><label for="camera6">Camera 6:</label></td>
<td><input type="text" id="camera6" name="ip6" value="" oninput="enableCheckboxes('camera6', 'camera6_counter1', 'camera6_counter2')"></td>
<td><input type="checkbox" id="camera6_counter1" name="ip6_c1" value="true" checked disabled="true"><label for="camera6_counter1">Counter 1</label></td>
<td><input type="checkbox" id="camera6_counter2" name="ip6_c2" value="true" disabled="true"><label for="camera6_counter2">Counter 2</label></td>
</tr>
<tr>
<td><label for="camera7">Camera 7:</label></td>
<td><input type="text" id="camera7" name="ip7" value="" oninput="enableCheckboxes('camera7', 'camera7_counter1', 'camera7_counter2')"></td>
<td><input type="checkbox" id="camera7_counter1" name="ip7_c1" value="true" checked disabled="true"><label for="camera7_counter1">Counter 1</label></td>
<td><input type="checkbox" id="camera7_counter2" name="ip7_c2" value="true" disabled="true"><label for="camera7_counter2">Counter 2</label></td>
</tr>
<tr>
<td><label for="camera8">Camera 8:</label></td>
<td><input type="text" id="camera8" name="ip8" value="" oninput="enableCheckboxes('camera8', 'camera8_counter1', 'camera8_counter2')"></td>
<td><input type="checkbox" id="camera8_counter1" name="ip8_c1" value="true" checked disabled="true"><label for="camera8_counter1">Counter 1</label></td>
<td><input type="checkbox" id="camera8_counter2" name="ip8_c2" value="true" disabled="true"><label for="camera8_counter2">Counter 2</label></td>
</tr>
<tr>
<td><label for="max">Max limit:</label></td>
<td><input type="text" id="max" name="max" value="100"></td><td>people</td><td></td>
</tr>
<tr>
<td><label for="correction">Correction:</label></td>
<td><input type="text" id="correction" name="correction" value=""></td><td></td><td></td>
</tr>
<tr>
<td><label for="refresh">Refresh:</label></td>
<td><input type="text" id="refresh" name="refresh" value="5"></td><td>seconds</td><td></td>
</tr>
<tr>
<td><label for="logo_file">Logo file:</label></td>
<td><input type="text" id="logo_file" name="logo_file" value="logo.png"></td>
<td><label for="logo_width">Width (px):</label></td>
<td><input type="text" id="logo_width" name="logo_width" value="200"></td>
</tr>
<tr>
<td><label for="header">Header</label></td>
<td><input type="text" id="header" name="header" value="Bienvenido!"></td><td></td><td></td>
</tr>
<tr>
<td><label for="stop">Stop message:</label></td>
<td><input type="text" id="stop" name="stop" value="Por favor espera...!"></td><td></td><td></td>
</tr>
<tr>
<td><label for="go">Go message:</label></td>
<td><input type="text" id="go" name="go" value="Ya Puedes entrar!"></td><td></td><td></td>
</tr>
<tr>
<td><label for="scrolling">Scrolling message</label></td>
<td colspan="3"><textarea rows="3" cols="50" maxlength="150" id="scrolling" name="scrolling">No olvides tomar tu temperatura y lavarte las manos con alcohol gel en el Totem-Pro.</textarea></td>
</tr>
<tr>
<td></td><td><input type="checkbox" id="debug" name="debug" value="true">
<label for="debug">Debug Info</label></td><td></td><td></td>
</tr>
<tr>
<td></td><td><input type="checkbox" id="negative" name="negative" value="true">
<label for="negative">Allow negative</label></td><td></td><td></td>
</tr>
<tr>
<td></td><td><br><br><input type="submit" value="Submit"></td><td></td><td></td>
</tr>
</div>
</table>
</form>

<script src="params.dat"></script>
<script type="text/javascript">

var dict = parseParams();
var msg = "";

for(var item in dict) {
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

for(var i = 0; i < parts.length; i++) {
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
<?php include_once "../pie.php" ?>

</body>
</html>