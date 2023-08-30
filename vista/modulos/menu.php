
<ul class="nav nav-pills nav-fill">
    <?php if (isset($_GET["pagina"])) : ?>
        <?php if ($_SESSION["validarSesion"] == null) : ?>
            <?php if ($_GET["pagina"] == "ingreso") : ?>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="<?php echo $url_global ?>">Crear usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="ingreso">Igreso Usuario</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="<?php echo $url_global ?>">Crear usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="ingreso">Igreso Usuario</a>
                </li>
            <?php endif ?>
        <?php endif ?>

        <?php if (isset($_SESSION["validarSesion"])) : ?>
            <?php if ($_SESSION["validarSesion"] == "ok") : ?>
                <?php if ($_GET["pagina"] == "tareas") : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="tareas">Tareas</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="tareas">Tareas</a>
                    </li>
                <?php endif ?>
                
                <?php if ($_GET["pagina"] == "salir") : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="salir">Salir</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="salir">Salir</a>
                    </li>
                <?php endif ?>
            <?php endif ?>
        <?php endif ?>


    <?php endif ?>




</ul>