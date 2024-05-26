<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <span class="input-group-text bg-white">
                        <img src="<?php echo IMG . 'nuevoLogo.png'; ?>" class="card-img-top img-fluid" alt="Imagen" style="width: 150px;">
                        <h2 class="card-title text-center fw-bold align-self-center mx-5">Inicio de Sesión</h2>
                    </span>
                    <form action="" method="post">
        <div class="form-group ms-2 mx-2">
            <label for="nombre">Nombre de usuario:</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']?>">
            </div>
            <?php if (isset($errores)) { escribirErrores($errores, 'nombre'); } ?>
        </div>
        
        <div class="form-group ms-2 mx-2">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="pass">
            <?php if (isset($errores)) { escribirErrores($errores, 'pass'); } ?>
        </div>

        <div class="form-group form-check ms-2 mx-2">
            <input type="checkbox" class="form-check-input" id="recordar" name="recordar" <?php if (isset($_COOKIE['username'])) echo 'checked'; ?>>
            <label class="form-check-label" for="recordar">Recordar sesión</label>
        </div>

        <?php if (isset($errores)) { escribirErrores($errores, 'validado'); } ?>

        <div class="form-group ms-2 mx-2 mb-2">
            <button type="submit" name="login" class="btn btn-primary mr-2">Iniciar sesión</button>
            <button type="submit" name="registrar" class="btn btn-secondary">Registrar</button>
        </div>
        <?php if (isset($errores)) { escribirErrores($errores, 'login'); } ?>
    </form>
                </div>
            </div>
        </div>
    </div>
</div>


