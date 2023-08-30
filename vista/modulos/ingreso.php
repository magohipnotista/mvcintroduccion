<div class="d-flex justify-content-center  form_padre">
    <form class="form_registro" method="post">
        <div class="mb-3">
            <img src="vista/img/logo.png" class="img-fluid" alt="logo">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email </label>
            <input type="email" class="form-control" id="email" name="ingresoemail">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password </label>
            <input type="password" class="form-control" id="password" name="ingresopassword">
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-primary" id="submitButton" disabled>INGRESAR</button>
        </div>
        <script>
            const emailInput = document.getElementById('email');
            const submitButton = document.getElementById('submitButton');

            emailInput.addEventListener('input', function() {
                submitButton.disabled = emailInput.value.length === 0;
            });
        </script>
        <?php $ingresar = controladorUsuarios::ctrIngresoUsuario(); ?>
        <?php if ($ingresar == "ok") : ?>
            <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                swal({
                        title: "Hurra!",
                        text: "Usuario validado <?php echo $_SESSION['email']; ?>",
                        icon: "success",
                        button: "Continuar!",
                    })
                    .then(() => {
                        setTimeout(function() {
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.assign("tareas"));
                            }
                        }, 1);
                    });
            </script>
        <?php endif ?>
        <?php if ($ingresar == "contrasena_incorrecta") : ?>
            <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                swal("Error!", "Contraseña incorrecta", "error")
                    .then(() => {
                        setTimeout(function() {
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.assign("ingreso"));
                            }
                        }, 1);
                    });
            </script>
        <?php endif ?>
        <?php if ($ingresar == "usuario_no_existe") : ?>
            <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                swal("Error!", "Usuario <?php echo $_POST["ingresoemail"] ?> No Existe", "error")
                    .then(() => {
                        setTimeout(function() {
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.assign("ingreso"));
                            }
                        }, 1);
                    });
            </script>
        <?php endif ?>
        <?php if ($ingresar == "no_se_aceptan_caracteres_especiales") : ?>
            <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                swal("Error!", "No Se Aceptan Caracteres Especiales", "error")
                    .then(() => {
                        setTimeout(function() {
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.assign("ingreso"));
                            }
                        }, 1);
                    });
            </script>
        <?php endif ?>

    </form>
</div>