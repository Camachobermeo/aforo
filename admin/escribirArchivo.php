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
"$camera1_counter1=' . $_REQUEST['ip1_c1'] . '" +
"$camera1_counter2=' . $_REQUEST['ip1_c2'] . '" +
"$camera2=' . $_REQUEST['ip2'] . '" +
"$camera2_counter1=' . $_REQUEST['ip2_c1'] . '" +
"$camera2_counter2=' . $_REQUEST['ip2_c2'] . '" +
"$camera3=' . $_REQUEST['ip3'] . '" +
"$camera3_counter1=' . $_REQUEST['ip3_c1'] . '" +
"$camera3_counter2=' . $_REQUEST['ip3_c2'] . '" +
"$camera4=' . $_REQUEST['ip4'] . '" +
"$camera4_counter1=' . $_REQUEST['ip4_c1'] . '" +
"$camera4_counter2=' . $_REQUEST['ip4_c2'] . '" +
"$camera5=' . $_REQUEST['ip5'] . '" +
"$camera5_counter1=' . $_REQUEST['ip5_c1'] . '" +
"$camera5_counter2=' . $_REQUEST['ip5_c2'] . '" +
"$camera6=' . $_REQUEST['ip6'] . '" +
"$camera6_counter1=' . $_REQUEST['ip6_c1'] . '" +
"$camera6_counter2=' . $_REQUEST['ip6_c2'] . '" +
"$camera7=' . $_REQUEST['ip7'] . '" +
"$camera7_counter1=' . $_REQUEST['ip7_c1'] . '" +
"$camera7_counter2=' . $_REQUEST['ip7_c2'] . '" +
"$camera8=' . $_REQUEST['ip8'] . '" +
"$camera8_counter1=' . $_REQUEST['ip8_c1'] . '" +
"$camera8_counter2=' . $_REQUEST['ip8_c2'] . '" +
"$max=' . $_REQUEST['max'] . '" +
"$correction=' . $_REQUEST['correction'] . '" +
"$refresh=' . $_REQUEST['refresh'] . '" +
"$logo_file=' . $_REQUEST['logo_file'] . '" +
"$logo_width=' . $_REQUEST['logo_width'] . '" +
"$header=' . $_REQUEST['header'] . '" +
"$stop=' . $_REQUEST['stop'] . '" +
"$go=' . $_REQUEST['go'] . '" +
"$scrolling=' . $_REQUEST['scrolling'] . '" +
"$debug=' . $_REQUEST['debug'] . '" +
"$negative=' . $_REQUEST['negative'] . '"
'));
  fclose($fp);
  chmod($file, 0777);
  header("Location: ajustes.php?exito=1");
}

?>