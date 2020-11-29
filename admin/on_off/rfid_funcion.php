<?php

exec("sudo sh /home/pi/shells/apaga.sh");

header("Location: rfid.php?exito=1");
