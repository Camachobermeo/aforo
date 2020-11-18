<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Conexión de PHP con PostgreSQL usando PDO">
    <meta name="author" content="Parzibyte">
    <title>Totem</title>
    <link href="/aforo/utiles/bootstrap.min.css" rel="stylesheet">
    <script src="/aforo/utiles/jquery.js" type="text/javascript"></script>
    <script src="/aforo/utiles/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/aforo/admin/admin.php">Aforo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto text-center">
                <li class="nav-item">
                    <a class="nav-link" href="/aforo/admin/ajustes.php">Ajustes</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aforo/admin/logo/tabla_logo.php">Logos</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aforo/admin/video/tablavideo.php">Videos</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aforo/admin/index.php">Salir</a>
                </li>
            </ul>
        </div>

        <div class="text-center">
            <img src="/aforo/utiles/logo1.jpg" class="rounded" width="100" height="75">
        </div>

    </nav>

</body>

<script>
    setTimeout(function() {
        document.getElementById('alerta') ? document.getElementById('alerta').hidden = true : null;
        document.getElementById('alerta2') ? document.getElementById('alerta2').hidden = true : null;
        if (typeof window.history.pushState == 'function') {
            window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
        }
    }, 8000);
</script>