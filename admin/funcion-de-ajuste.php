<html>
<head>
<!-- <meta http-equiv="refresh" content="10"/> -->
<style>
* {
  margin:0;
  padding:0;
  border:0;
}

@keyframes slide {
  from { left: 100%;}
  to { left: -100%;}
}
@-webkit-keyframes slide {
  from { left: 100%;}
  to { left: -100%;}
}

#marquee { 
  color:black; 
  background:#c0f0c0;
  width:100%;
  height:120px;
  line-height:120px;
  overflow:hidden;
  position:relative;
}

#scrolling {
  font-family:verdana;
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:120px;
  font-size:30px;
  animation-name: slide;
  animation-duration: 10s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
  -webkit-animation-name: slide;
  -webkit-animation-duration: 15s;
  -webkit-animation-timing-function:linear;
  -webkit-animation-iteration-count: infinite;
}
</style>
</head>
<body bgcolor="#c0f0c0" align=center style="font-family:verdana; display:flex; align-items:center; justify-content:center;">
<img id="logo" src="logo.png" width="150" style="position: absolute; left: 0; top: 0; padding: 10px;"></img></div>
<img src="./ht-logo.png" width="180" style="position: absolute; right: 0; top: 0; padding: 10px;"></img></div>
<table>
<tr><td>
<table>
<tr>
  <td width=50% align=center>
  <div id="header" style="font-size: 300%;">Bienvenido!</div><br><br>
  <div style="font-size: 200%;">Aforo Actual:</div>
  <strong><div id="div_total" style="font-size: 850%;">0</div></strong>
  <div style="font-size: 200%;">Aforo Permitido:</div>
  <div id="div_max" style="font-size: 600%;">100</div><br>
  <strong><div id="msg" style="font-size: 200%;"></div></strong></td>
  <td width=50%><img id="sign" src="./go.png" width="85%"></td>
</tr>
</table>
</td></tr>
<tr><td>
<div id="marquee"><div id="scrolling"></div></div><br>
<div id="debug" style="font-size: 80%;"></div></font>
</table>
</td></tr>
</table>

<script language="JavaScript">

// initialization //////////////////////////////////////////

updateData();

// functions //////////////////////////////////////////

function getTotal(ip, user, pass, counter, debug)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", "http://" + ip + "/stw-cgi/eventsources.cgi?msubmenu=peoplecount&action=check&Channel=0", false, user, pass); // false for synchronous request
    xmlHttp.withCredentials = true;
    xmlHttp.send(null);

    var str = xmlHttp.responseText;

    var in_key  = "." + counter + ".InCount=";
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

function updateData()
{
  var queryString = window.location.search;
  var urlParams = new URLSearchParams(queryString);

  var u = urlParams.get("u");
  var p = window.atob(urlParams.get("p"));
  var debug = urlParams.has("debug");

  if (debug)
    clearDebug();

  var max = 50;
  if (urlParams.has("max") && !isNaN(urlParams.get("max")))
    max = Number(urlParams.get("max"));

  var logo_file = "logo.png";
  if (urlParams.has("logo_file"))
    logo_file = urlParams.get("logo_file");

  var logo_width = 150;
  if (urlParams.has("logo_width") && !isNaN(urlParams.get("logo_width")))
    logo_width = Number(urlParams.get("logo_width"));


  document.getElementById("logo").src = logo_file;
  document.getElementById("logo").width = logo_width;

  var total = 0;

  for (var i=1; i<=8; i++) {
    if (urlParams.has("ip" + i)) {
      var ip = urlParams.get("ip" + i);
      var c1 = urlParams.has("ip" + i + "_c1");
      var c2 = urlParams.has("ip" + i + "_c2");

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
  if (urlParams.has("correction") && !isNaN(urlParams.get("correction")))
    correction = Number(urlParams.get("correction"));

  if (debug && !isNaN(total))
    printDebug("Correction: " + correction + "<br>");

  var header = "Bienvenido!";
  if (urlParams.has("header"))
    header = urlParams.get("header");

  document.getElementById("header").innerHTML = header;

  var msg_stop = "Por Favor Espere...!";
  if (urlParams.has("stop"))
    msg_stop = urlParams.get("stop");

  var msg_go = "Ud puede pasar!";
  if (urlParams.has("go"))
    msg_go = urlParams.get("go");

  var msg_scrolling = "";
  if (urlParams.has("scrolling"))
    msg_scrolling = urlParams.get("scrolling");
  
  total += correction;

  if (total < 0 && urlParams.has("negative") == false)
    total = 0;

  var refresh = 5;
  if (urlParams.has("refresh") && !isNaN(urlParams.get("refresh")))
    refresh = Number(urlParams.get("refresh"));
  
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
  
  if (total >= max)
  {
    document.body.style.backgroundColor = "#f0c0c0";
	document.getElementById("marquee").style.background="#f0c0c0";
    document.getElementById("div_total").style.color="red";
    document.getElementById("msg").innerHTML = msg_stop;
    document.getElementById("msg").style.color = "red";
    document.getElementById("sign").src = "./stop.png";
  }
  else
  {
    document.body.style.backgroundColor = "#c0f0c0";
	document.getElementById("marquee").style.background="#c0f0c0";
    document.getElementById("div_total").style.color="green";
    document.getElementById("msg").innerHTML = msg_go;
    document.getElementById("msg").style.color = "green";
    document.getElementById("sign").src = "./go.png";
  }
  
  document.getElementById("scrolling").innerHTML = msg_scrolling;

  setTimeout(updateData, refresh * 1000);
}

function resetCounters(ip, user, pass)
{
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("GET", "http://" + ip + "/stw-cgi/system.cgi?msubmenu=databasereset&action=control&IncludeDataType=PeopleCount", false, user, pass); // false for synchronous request
  xmlHttp.withCredentials = true;
  xmlHttp.send(null);

  updateData();
}

function printDebug(text)
{
  document.getElementById("debug").innerHTML = document.getElementById("debug").innerHTML + text;
}

function clearDebug()
{
  document.getElementById("debug").innerHTML = "Debug Info: <a onclick=\"hideDebug()\" href=\"#\"><font size='-3' color='green'>[HIDE]</font></a><br>";
}

function hideDebug()
{
  var url = window.location.href;
  url = url.replace('&debug=true', '').replace('&debug', '');
  window.location.href = url;
}

</script>
</body>
</html>