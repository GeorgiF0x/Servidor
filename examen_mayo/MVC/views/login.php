<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text text-center">
                <h1 class="fw-bold">Login</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" class="ms-2 mx-2 mt-3 mb-3">
                        <label for="nombre">Nombre de usuario:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']?>">
                        </div>
                        <?php if (isset($errores)) { escribirErrores($errores, 'nombre'); } ?>

                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="pass">
                        <?php if (isset($errores)) { escribirErrores($errores, 'pass'); } ?>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="recordar" name="recordar" <?php if (isset($_COOKIE['username'])) echo 'checked'; ?>>
                            <label class="form-check-label" for="recordar">Recordar sesión</label>
                        </div>

                        <?php if (isset($errores)) { escribirErrores($errores, 'validado'); } ?>

                        <button type="submit" name="login" class="btn btn-primary ">Iniciar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


