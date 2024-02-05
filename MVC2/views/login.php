<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <a class="navbar-brand" href="../index.php">
                                    <img class="logo img-responsive" src="../Media/tiburonpng.png" alt="" width="270px">
                                </a>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <h2 class="card-title text-center fw-bold">Inicio De Sesion</h2>
                            </div>
                        </div>

                        <form method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de usuario:</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php recuerda('username'); ?>" >
                                <?php printerror($errores, 'username'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="password" name="password" >
                                <?php printerror($errores, 'password'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        </form>

                        <?php
                        if (!empty($errores['login'])) {
                            echo '<p class="text-danger mt-3">' . $errores['login'] . '</p>';
                        }
                        ?>

                        <p class="mt-3">¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>