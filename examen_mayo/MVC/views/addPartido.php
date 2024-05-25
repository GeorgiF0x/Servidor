<h1 class="text text-center">Nuevo Partido</h1>
<form action="">
                <div class="row d-flex justify-content-around text-center mb-3">
                    <div class="col-5 mx-1">
                        <div class="mb-3">
                            <label for="nuevoJug1" class="form-label">Jugador 1:</label>
                            
                            <input type="text" class="form-control text-center" id="nuevoJug1" aria-describedby="newName" value="" name="add_jugador1">
                        </div>
                    </div>
                    <?php if (isset($errores)) { escribirErrores($errores, 'add_jugador1'); } ?>
                    <div class="col-5">
                        <div class="mb-3">
                            <label for="nuevoJug2" class="form-label">jugador 2 :</label>
                            <input type="text" class="form-control text-center" id="nuevoJug2" aria-describedby="newEmail" value="" name="add_jugador2">
                        </div>
                    </div>
                    <?php if (isset($errores)) { escribirErrores($errores, 'add_jugador2'); } ?>
                    <div class="col-5">
                        <div class="mb-3">
                            <label for="nuevaFecha" class="form-label">fecha :</label>
                            <input type="date" class="form-control text-center" id="nuevaFecha" aria-describedby="newEmail" value="" name="add_fecha">
                        </div>
                    </div>
                    <?php if (isset($errores)) { escribirErrores($errores, 'nueva_fecha'); } ?>
                    <div class="col-5">
                        <div class="mb-3">
                            <label for="nuevoRes" class="form-label">resultado :</label>
                            <input type="text" class="form-control text-center" id="nuevoRes" aria-describedby="newEmail" value="" name="add_resultado">
                        </div>
                    </div>

                    <?php if (isset($errores)) { escribirErrores($errores, 'add_resultado'); } ?>

                </div>
                <div class="row d-flex justify-content-end">
                    <div class="col-3 text-end mx-5 mb-3">
                        <input class="btn btn-dark " type="submit" value="Aplicar Cambios" name="crear_partido">
                    </div>
                </div>
            </form>