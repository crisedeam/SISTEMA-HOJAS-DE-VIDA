<!DOCTYPE html>
<html lang="es">

<head>
    <title>HVV</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <!-- CSS personalizado -->
    <link rel="stylesheet" type="text/css" href="assets/css/estilosMenu.css">

    <!-- CSS para confirmación -->
    <link rel="stylesheet" href="assets/css/confirm.css">

    <!-- JS -->
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: #F0F4F8;
            /* Azul grisaceo */
        }
    </style>
</head>

<body>
    <header>
        <?php
        require_once('views/Layouts/cabecera.php');
        ?>
    </header>
    <main class="container">
        <?php
        require_once('routing.php');
        ?>
    </main>

    <!-- JS confirmación -->
    <script src="assets/js/confirm.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const botones = document.querySelectorAll(".eliminar-btn");

            botones.forEach(boton => {
                boton.addEventListener("click", function (e) {
                    e.preventDefault();
                    let url = this.getAttribute("href");
                    let nombre = this.getAttribute("data-nombre");

                    let confirm = new ConfirmDialog({
                        title: "Eliminar",
                        message: "¿Seguro que deseas eliminar: " + nombre + "?",
                        confirmText: "Sí, eliminar",
                        cancelText: "Cancelar"
                    });

                    confirm.show(() => {
                        window.location.href = url;
                    });
                });
            });
        });
    </script>
</body>

</html>