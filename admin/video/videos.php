<html>
<?php include_once "../../admin/encabezado.php" ?>
<br>

<body>
    <div class="container">
        <div class="text-center">
            <h1>Subir Videos</h1>
            <br>
            <br>
            <br>
            <br>
            <br>
            <form enctype="multipart/form-data" action="listar_video.php" method="POST">
                <table class="table table-active">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h3><input name="archivo" id="archivo" type="file" accept="video/mp4"/>
                            <input name="subir" type="submit" value="Subir archivo" /></h3></td>
                        <td></td>
                    </tr>
                </table>
            </form>

        </div>
    </div>
</body>
<?php include_once "../../pie.php" ?>
</html>