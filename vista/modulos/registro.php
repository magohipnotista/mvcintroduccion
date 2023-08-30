<div class="d-flex justify-content-center  form_padre">
    <form class="form_registro" method="post">
        <div class="mb-3">
            <img src="vista/img/logo.png" class="img-fluid" alt="logo">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email </label>
            <input type="email" class="form-control emailrep" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password </label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-primary " id="submitButton" disabled>REGISTRAR</button>
        </div>
        <script>
            const emailInput = document.getElementById('email');
            const submitButton = document.getElementById('submitButton');

            emailInput.addEventListener('input', function() {
                submitButton.disabled = emailInput.value.length === 0;
            });
        </script>
        <?php $registro = controladorUsuarios::ctrNuevoUsuario(); ?>
        <?php if ($registro == "ok") : ?>
            <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                swal("Hurra!", "Usuario <?php echo $_POST["email"] ?> creado!", "success")
                    .then(() => {
                        setTimeout(function() {
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.assign("ingreso"));
                            }
                        }, 1);
                    });
            </script>
        <?php endif ?>
        <?php if ($registro == "error") : ?>
            <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                swal("Error!", "No se aceptan caracteres especiales!", "error")
                    .then(() => {
                        setTimeout(function() {
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.assign('<?php echo $url_global?>'));
                            }
                        }, 1);
                    });
            </script>
        <?php endif ?>
    </form>
</div>