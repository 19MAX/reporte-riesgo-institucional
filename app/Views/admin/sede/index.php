<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
Sedes
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Sede</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-map-marker"></i> Todas las sedes del instituto
            seleccionado</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="sede" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre sede</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sedes as $sede): ?>
                        <tr>
                            <td>
                                <div class="dtr-control"></div>
                            </td>
                            <td><?= htmlspecialchars($sede['nombre']) ?></td>
                            <td><?= htmlspecialchars($sede['direccion']) ?></td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-outline-success m-1 rounded-circle btnCampus"
                                        title="Agregar Campus" data-id="<?= $sede['id'] ?>">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-warning m-1 btnEditar" title="Editar"
                                        data-id="<?= $sede['id'] ?>" data-nombre="<?= $sede['nombre'] ?>"
                                        data-direccion="<?= $sede['direccion'] ?>">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger m-1 btnEliminar" title="Eliminar"
                                        data-id="<?= $sede['id'] ?>" data-nombre="<?= $sede['nombre'] ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <a href="../main/index.php?modulo=campus&sede=<?= $sede['id'] ?>"
                                        class="btn btn-outline-primary m-1" title="Campus">
                                        <i class="fa-solid fa-landmark-dome"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="modalAdminLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdminLabel">ELiminar</h5>
                <button type="button" class="close" onclick="cerrarModal('Eliminar')" data-dismiss="modal"
                    aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de que desea eliminar al instituto ?</p>
                <form id="eliminarForm" action="<?= base_url("admin/sede/delete") ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_ies" id="id_ies" value="<?= $id_ies ?>">
                    <input type="hidden" name="id_sede" id="id_sede" value="">
                    <input class="form-control" type="text" disabled name="sedeName" id="sedeName" value="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="cerrarModal('Eliminar')"
                    data-dismiss="modal">Cancelar</button>
                <button type="submit" form="eliminarForm" class="btn btn-danger" id="btn-delete">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar datos -->
<div class="modal fade" id="Editar_datos" tabindex="-1" role="dialog" aria-labelledby="modalAdminLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdminLabel">Editar datos de la sede</h5>
                <button type="button" class="close" onclick="cerrarModal('Editar_datos')" data-dismiss="modal"
                    aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url("admin/sede/update") ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_ies" id="id_ies" value="<?= $id_ies ?>">
                    <input type="hidden" name="id_sede" id="id_sede" value="">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nombreInput" class="form-label">Nombre de la sede</label>
                            <input type="text" class="form-control" id="nombreInput" name="nombreSede">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col">
                            <label for="direccionSede" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccionSede" name="direccionSede">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btnUpdate">Actualizar información</button>
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('Editar_datos')"
                            data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Campus -->
<div class="modal fade" id="agregarCampus" tabindex="-1" role="dialog" aria-labelledby="modalAdminLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdminLabel">Agregar campus</h5>
                <button type="button" class="close" onclick="cerrarModal('agregarCampus')" data-dismiss="modal"
                    aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" value="" name="id_sede" id="id_sede">
                    <div class="row mb-3">
                        <div class="col">
                            <label>Campus para :</label>
                            <input type="text" class="form-control" disabled id="nombreSede" name="nombreSede">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nombreCampus" class="form-label">Nombre del campus</label>
                            <input type="text" class="form-control" id="nombreCampus" name="nombreCampus">
                        </div>
                        <div class="col">
                            <label for="direccionInput" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccionInput" name="direccionInput">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="cantonInput" class="form-label">Cantón</label>
                            <input type="text" class="form-control" id="cantonInput" name="cantonInput">
                        </div>
                        <div class="col">
                            <label for="parroquiaInput" class="form-label">Parroquia</label>
                            <input type="text" class="form-control" id="parroquiaInput" name="parroquiaInput">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-add">Agregar campus</button>
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('agregarCampus')"
                            data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sedes -->
<div class="modal fade" id="agregarSede" tabindex="-1" role="dialog" aria-labelledby="modalAdminLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdminLabel">Agregar sede</h5>
                <button type="button" class="close" onclick="cerrarModal('agregarSede')" data-dismiss="modal"
                    aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url("admin/sede/add") ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_ies" id="id_ies" value="<?= $id_ies ?>">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nombreSede" class="form-label">Nombre de la sede</label>
                            <input type="text" class="form-control" id="nombreSede" name="nombreSede">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="direccionInput" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccionSede" name="direccionSede">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btn-add">Agregar sede</button>
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('agregarSede')"
                            data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url("assets/js/admin/sede/content.js") ?>"></script>
<?= $this->endSection() ?>