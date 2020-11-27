<?php
$file = '../params.dat';

$exito = false;
$texto = false;
if ($_REQUEST) {
  $fp = fopen($file, 'w');
  fwrite($fp, utf8_decode('data="" +
"$user=' . $_REQUEST['u'] . '" +
"$pass=' . $_REQUEST['p'] . '" +
"$camera1=' . $_REQUEST['ip1'] . '" +
"$camera1_counter1=true" +
"$camera1_counter2=true" +
"$camera2=' . $_REQUEST['ip2'] . '" +
"$camera2_counter1=true" +
"$camera2_counter2=" +
"$camera3=' . $_REQUEST['ip3'] . '" +
"$camera3_counter1=true" +
"$camera3_counter2=" +
"$camera4=' . $_REQUEST['ip4'] . '" +
"$camera4_counter1=true" +
"$camera4_counter2=" +
"$camera5=' . $_REQUEST['ip5'] . '" +
"$camera5_counter1=true" +
"$camera5_counter2=" +
"$camera6=' . $_REQUEST['ip6'] . '" +
"$camera6_counter1=true" +
"$camera6_counter2=" +
"$camera7=' . $_REQUEST['ip7'] . '" +
"$camera7_counter1=true" +
"$camera7_counter2=" +
"$camera8=' . $_REQUEST['ip8'] . '" +
"$camera8_counter1=true" +
"$camera8_counter2=" +
"$max=5" +
"$correction=" +
"$refresh=1" +
"$logo_file=' . $_REQUEST['logo_file'] . '" +
"$logo_width=150" +
"$header=' . $_REQUEST['header'] . '" +
"$stop=' . $_REQUEST['stop'] . '" +
"$go=' . $_REQUEST['go'] . '" +
"$scrolling=' . $_REQUEST['scrolling'] . '" +
"$debug=" +
"$negative="
'));
  fclose($fp);
  chmod($file, 0777);
  header("Location: ajustes.php?exito=1");
}

?>