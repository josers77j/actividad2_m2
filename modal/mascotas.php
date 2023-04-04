<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mx-auto" method="post" id="form_mascotas">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="raza" class="form-label">Raza:</label>
                        <input type="text" class="form-control" id="raza" name="raza">
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color:</label>
                        <input type="text" class="form-control" id="color" name="color">
                    </div>
                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso:</label>
                        <input type="number" class="form-control" id="peso" name="peso" step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="altura" class="form-label">Altura:</label>
                        <input type="number" class="form-control" id="altura" name="altura" step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo:</label>
                        <select class="form-select" id="sexo" name="sexo">
                            <option value="m">Macho</option>
                            <option value="h">Hembra</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fech_nacimiento" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fech_nacimiento" name="fech_nacimiento">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="guardar"<?= isset($tokenMascota) ? " onclick='funcionEditar()'" : ""  ?>>Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>