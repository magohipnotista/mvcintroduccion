<?php
session_start();
$url_global = Rutas::ctrrutas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="node_modules/summernote-0.8.18-dist/summernote-bs4.css" rel="stylesheet">
    <link rel="icon" href="vista/img/inon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

    <link rel="stylesheet" href="vista/css/styles.css">

    <title>Introduccion A MVC con php</title>
</head>
<body>
    <div class="container mt-2 ">
        <!-- INICIO VARIABLE GET -->
        <?php if (isset($_GET["pagina"])) : ?>
            <!-- INICIO DE SESION INICIO -->
            <?php if (isset($_SESSION["validarSesion"]) && $_SESSION["validarSesion"] === "ok") : ?>
                <?php if (
                    $_GET["pagina"] == "ingreso" ||
                    $_GET["pagina"] == "tareas"  ||
                    $_GET["pagina"] == "salir"
                ) : ?>
                    <?php
                    include "vista/modulos/menu.php";
                    include "vista/modulos/" . $_GET["pagina"] . ".php";
                    ?>
                <?php else : ?>
                    <?php
                    include "vista/modulos/error404.php";
                    ?>
                <?php endif ?>
            <?php else : ?>
                <?php if (
                    $_GET["pagina"] == "ingreso"
                ) : ?>
                    <?php
                    include "vista/modulos/menu.php";
                    include "vista/modulos/" . $_GET["pagina"] . ".php";
                    ?>
                <?php else : ?>
                    <?php
                    include "vista/modulos/error404.php";
                    ?>
                <?php endif ?>
            <?php endif ?>
            <!-- INICIO DE SESION FINAL -->

        <?php else : ?>
            <?php
            include "vista/modulos/menu2.php";
            include "vista/modulos/registro.php";
            ?>
        <?php endif ?>
        <!-- FINAL VARIABLE GET -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
    <script src="vista/js/scripts.js"></script>
    <script src="vista/js/validaremail.js"></script>
    <script src="node_modules/feather-icons/dist/feather.js"></script>
    <script src="node_modules/summernote-0.8.18-dist/summernote-bs4.js"></script>
    <script>
        feather.replace();
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 200,
                toolbar: [
                    /*['style', ['style']],*/
                    ['font', ['bold', 'underline']],
                    /* ['color', ['color']],*/
                    ['para', ['ul', 'ol', 'paragraph']],
                    /* ['table', ['table']],*/
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',

                buttons: [
                    'copy', 'excel', 'pdf', 'csv', 'colvis'
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                },
                colVis: {
                    buttonText: 'Columnas'
                },
                pagingType: 'full_numbers',
                responsive: true,
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example2').DataTable({
                dom: 'Bfrtip',

                buttons: [
                    'copy', 'excel', 'pdf', 'csv', 'colvis'
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                },
                colVis: {
                    buttonText: 'Columnas'
                },
                pagingType: 'full_numbers',
                responsive: true,
            });

        });
    </script>
</body>

</html>