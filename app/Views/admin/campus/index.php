<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
Campus
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Campus</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-landmark-dome"></i> Todas los campus de la
            sede seleccionada</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="campus" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre campus</th>
                        <th>Dirección</th>
                        <th>Canton</th>
                        <th>Parroquia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($campus as $campo): ?>
                        <tr>
                            <td>
                                <div class="dtr-control"></div>
                            </td>
                            <td><?= htmlspecialchars($campo['nombre']) ?></td>
                            <td><?= htmlspecialchars($campo['direccion']) ?></td>
                            <td><?= htmlspecialchars($campo['canton']) ?></td>
                            <td><?= htmlspecialchars($campo['parroquia']) ?></td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-outline-warning m-1 btnEditar" title="Editar"
                                        data-id="<?= $campo['id'] ?>" data-nombre="<?= $campo['nombre'] ?>"
                                        data-direccion="<?= $campo['direccion'] ?>" data-canton="<?= $campo['canton'] ?>"
                                        data-parroquia="<?= $campo['parroquia'] ?>">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger m-1 btnEliminar" title="Eliminar"
                                        data-id="<?= $campo['id'] ?>" data-nombre="<?= $campo['nombre'] ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
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
                <p>¿Está seguro de que desea eliminar al campus ?</p>
                <form id="eliminarForm" action="<?=base_url("admin/campus/delete")?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_sede" id="id_sede" value="<?= $id_sede ?>">
                    <input type="hidden" name="id_campus" id="id_campus" value="">
                    <input class="form-control" type="text" disabled name="campusName" id="campusName" value="">
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
                <h5 class="modal-title" id="modalAdminLabel">Editar datos del campus</h5>
                <button type="button" class="close" onclick="cerrarModal('Editar_datos')" data-dismiss="modal"
                    aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url("admin/campus/update")?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_sede" id="id_sede" value="<?= $id_sede ?>">
                    <input type="hidden" name="id_campus" id="id_campus" value="">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nombreInput" class="form-label">Nombre del campus</label>
                            <input type="text" class="form-control" id="nombreInput" name="nombreCampus">
                        </div>
                        <div class="col">
                            <label for="direccionCampus" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccionCampus" name="direccionCampus">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="cantonCampus" class="form-label">Cantón</label>
                            <input type="text" class="form-control" id="cantonCampus" name="cantonInput">
                        </div>
                        <div class="col">
                            <label for="parroquiaCampus" class="form-label">Parroquia</label>
                            <input type="text" class="form-control" id="parroquiaCampus" name="parroquiaInput">
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
                <form action="<?= base_url("admin/campus/add") ?>" method="post" enctype="multipart/form-data">

                    <?= csrf_field() ?>
                    <input type="hidden" name="id_sede" id="id_sede" value="<?= $id_sede ?>">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nombreCampus" class="form-label">Nombre del campus</label>
                            <input type="text" class="form-control" id="nombreCampus" name="nombreCampus">
                        </div>
                        <div class="col">
                            <label for="direccionInput" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccionInput" name="direccionCampus">
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
                        <button type="submit" class="btn btn-primary" id="btn-add">Agregar campus</button>
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('agregarCampus')"
                            data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    const id_ies = <?=$id_ies?>;
</script>
<script src="<?= base_url("assets/js/admin/campus/content.js") ?>"></script>
<?= $this->endSection() ?>