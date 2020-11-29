<!DOCTYPE html>
<html>
<?php
$fallo = false;
if ($_REQUEST)
    $fallo = $_REQUEST['fallo'];
?>

<body>
    <?php include_once "../../admin/encabezado.php" ?>
    <br>
    <br>
    <br>
    <div class="container">
        <?php
        if ($fallo) {
            echo "<div class='alert alert-danger' role='alert' id='alerta'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <strong>Error!</strong>    RUT o RFID ingresado, ya exite.
            </div>";
                }
        ?>
        <div class="text-center">
            <h1>Registrar Persona</h1>
        </div>
        <br>
        <form action="insertarpersona.php" method="POST">
            <div class="form-row">
                <div class="col-3"></div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input required name="nombre" class="form-control text-uppercase" id="nombre" placeholder="Nombre de la persona">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input required name="apellidos" class="form-control text-uppercase" id="apellidos" placeholder="Apellidos de la persona">
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
            <div class="form-row">
                <div class="col-3"></div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="rut">RUT</label>
                        <input required name="rut" class="form-control text-uppercase" id="rut" placeholder="RUT de la persona">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="rfid">RFID</label>
                        <input required name="rfid" class="form-control text-uppercase" id="rfid" placeholder="RFID de la persona">
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>

        </form>
    </div>
    <br><br><br>
    <?php include_once "../../pie.php" ?>

</html>