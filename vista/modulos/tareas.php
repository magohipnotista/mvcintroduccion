<div class="container-fluid">
    <div class="row mt-5 row_principal">
        <div class="col-lg-4">
            <h1>Bienvenido <?php echo $_SESSION["email"] ?></h1>
            <hr>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#nuevatarea">Agregar Tarea</button>
            <?php
            $item = "token";
            $valor = $_SESSION["dato_unico"];
            $traertareas_personales = ControladorTareas::ctrTreasPersonales($item, $valor);
            $total = count($traertareas_personales);
            ?>
            <?php if ($total == 0) : ?>
            <?php else : ?>
                <button type="button" class="btn btn-success btn-sm btn-mis-tareas" id="mistareas">Mis Tareas</button>
            <?php endif ?>

        </div>
        <div class="col-lg-8">
            <div class="todas_tareas">
                <h1>Tareas</h1>
                <?php
                $traertareas = ControladorTareas::ctrTraertareas();
                ?>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tarea</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($traertareas); $i++) : ?>
                            <tr>
                                <td><?php echo $i + 1 ?></td>
                                <td><?php echo $traertareas[$i]["nombre"] ?></td>
                                <td><?php echo $traertareas[$i]["apellido"] ?></td>
                                <td><?php echo $traertareas[$i]["tarea"] ?></td>
                                <td><?php echo $traertareas[$i]["descripcion"] ?></td>
                            </tr>
                        <?php endfor ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tarea</th>
                            <th>Descripcion</th>
                        </tr>
                    </tfoot>
                </table>

            </div>

            <div class="mistareas" style="display:none;">
                <h1>Mis Tareas</h1>
                <?php
                $item = "token";
                $valor = $_SESSION["dato_unico"];
                $traertareas_personales = ControladorTareas::ctrTreasPersonales($item, $valor);

                ?>
                <table id="example2" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tarea</th>
                            <th>Descripcion</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($traertareas_personales); $i++) : ?>
                            <tr>
                                <td><?php echo $i + 1 ?></td>
                                <td><?php echo $traertareas_personales[$i]["nombre"] ?></td>
                                <td><?php echo $traertareas_personales[$i]["apellido"] ?></td>
                                <td><?php echo $traertareas_personales[$i]["tarea"] ?></td>
                                <td><?php echo $traertareas_personales[$i]["descripcion"] ?></td>

                                <td>
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#edittask-<?php echo $i ?>">
                                        <i data-feather="edit-2"></i> </a>
                                </td>


                                <td>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $traertareas_personales[$i]["id"] ?>" name="id_borrar">
                                        <button type="submit" class="borrar sweet-multiple_edit_task_modal">
                                            <i data-feather="trash-2"></i>
                                        </button>
                                        <?php $borrarTarea = ControladorTareas::ctrBorrarTarea(); ?>
                                        <?php if ($borrarTarea == "ok") : ?>
                                            <script>
                                                setTimeout(function() {
                                                    if (window.history.replaceState) {
                                                        window.history.replaceState(null, null, window.location.assign("tareas"));
                                                    }
                                                }, 1);
                                            </script>
                                        <?php endif ?>
                                    </form>

                                </td>
                            </tr>

                            <!-- Modal editar-->
                            <div class="modal fade" id="edittask-<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <input type="hidden" class="form-control" id="id" value="<?php echo $traertareas_personales[$i]["id"] ?>" name="id">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="nombre" class="form-label">Nombre</label>
                                                            <input type="text" class="form-control" id="nombre" value="<?php echo $traertareas_personales[$i]["nombre"] ?>" name="nombre_edit">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="apellido" class="form-label">Apellido</label>
                                                            <input type="text" class="form-control" id="apellido" value="<?php echo $traertareas_personales[$i]["apellido"] ?>" name="apellido_edit">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="tarea" class="form-label">Nombre de la tarea</label>
                                                            <input type="text" class="form-control" id="tarea" value="<?php echo $traertareas_personales[$i]["tarea"] ?>" name="tarea_edit">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <textarea id="summernote-<?php echo $i ?>" name="descripcion_edit">
                                                        <?php echo $traertareas_personales[$i]["descripcion"] ?>   
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Editar Tarea</button>
                                            </div>
                                            <?php $enviartarea_edit = ControladorTareas::ctrenviartareaedit();
                                            ?>
                                            <?php if ($enviartarea_edit == "ok") : ?>
                                                <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
                                                <script>
                                                    swal("Hurra!", "Tarea: <?php echo $_POST["tarea_edit"] ?> editada!", "success")
                                                        .then(() => {
                                                            setTimeout(function() {
                                                                if (window.history.replaceState) {
                                                                    window.history.replaceState(null, null, window.location.assign("tareas"));
                                                                }
                                                            }, 1);
                                                        });
                                                </script>
                                            <?php endif ?>
                                        </form>
                                        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                                        <script src="node_modules/summernote-0.8.18-dist/summernote-bs4.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                $('#summernote-<?php echo $i ?>').summernote({
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
                                    </div>
                                </div>
                            </div>
                        <?php endfor ?>

                        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('.sweet-multiple_edit_task_modal').on('click', function(event) {
                                    event.preventDefault(); // Evita el envío del formulario por defecto

                                    var form = $(this).closest("form"); // Almacena una referencia al formulario

                                    swal({
                                            title: "Despues de elminado no se puede recuperar?",
                                            icon: "warning",
                                            buttons: true,
                                            dangerMode: true,
                                        })
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                swal("Poof! Tarea elmiminada!", {
                                                    icon: "success",
                                                });
                                                setTimeout(function() {
                                                    form.submit(); 
                                                }, 3000);
                                            } else {
                                                swal("No se Borro La Tarea", {
                                                    icon: "success",
                                                });
                                            }
                                        });
                                });
                            });
                        </script>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tarea</th>
                            <th>Descripcion</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="nuevatarea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="tarea" class="form-label">Nombre de la tarea</label>
                                <input type="text" class="form-control" id="tarea" name="tarea">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea id="summernote" name="descripcion"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Enviar Tarea</button>
                </div>
                <?php $enviartarea = controladorUsuarios::ctrenviartarea(); ?>
                <?php if ($enviartarea == "ok") : ?>
                    <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
                    <script>
                        swal("Hurra!", "Tarea: <?php echo $_POST["tarea"] ?> creada!", "success")
                            .then(() => {
                                setTimeout(function() {
                                    if (window.history.replaceState) {
                                        window.history.replaceState(null, null, window.location.assign("tareas"));
                                    }
                                }, 1);
                            });
                    </script>
                <?php endif ?>
            </form>
        </div>
    </div>
</div>