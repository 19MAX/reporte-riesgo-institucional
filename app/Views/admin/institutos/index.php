<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
Institutos
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Institutos</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-institution"></i> Todos los institutos registrados</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="institutos" width="100%" cellspacing="0">

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
                <button type="button" class="close" onclick="cerrarModal('Eliminar')" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de que desea eliminar al instituto ?</p>
                <form id="eliminarForm">
                    <input type="hidden" name="id_ies" id="id_ies" value="">
                    <input class="form-control" type="text" disabled name="institutoName" id="institutoName" value="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  onclick="cerrarModal('Eliminar')" data-dismiss="modal">Cancelar</button>
                <button type="button" form="eliminarForm" class="btn btn-danger" id="btn-delete">Eliminar</button>
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
                <h5 class="modal-title" id="modalAdminLabel">Editar datos del instituto</h5>
                <button type="button" class="close"  onclick="cerrarModal('Editar_datos')" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" enctype="multipart/form-data">
                    <input type="hidden" name="id_ies" value="">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nombreInput" class="form-label">Nombre del instituto</label>
                            <input type="text" class="form-control" id="nombreInput" name="nombreInput">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="codigoInput" class="form-label">Código</label>
                            <input type="text" class="form-control" id="codigoInput" name="codigoInput">
                        </div>
                        <div class="col">
                            <label for="provinciaSelect" class="form-label">Provincia</label>
                            <select class="form-select form-control" id="provinciaSelect" name="provinciaInput">
                                <option disabled selected>Selecciona una provincia</option>
                                <option value="Azuay">Azuay</option>
                                <option value="Bolívar">Bolívar</option>
                                <option value="Cañar">Cañar</option>
                                <option value="Carchi">Carchi</option>
                                <option value="Chimborazo">Chimborazo</option>
                                <option value="Cotopaxi">Cotopaxi</option>
                                <option value="El Oro">El Oro</option>
                                <option value="Esmeraldas">Esmeraldas</option>
                                <option value="Galápagos">Galápagos</option>
                                <option value="Guayas">Guayas</option>
                                <option value="Imbabura">Imbabura</option>
                                <option value="Loja">Loja</option>
                                <option value="Los Ríos">Los Ríos</option>
                                <option value="Manabí">Manabí</option>
                                <option value="Morona Santiago">Morona Santiago</option>
                                <option value="Napo">Napo</option>
                                <option value="Orellana">Orellana</option>
                                <option value="Pastaza">Pastaza</option>
                                <option value="Pichincha">Pichincha</option>
                                <option value="Santa Elena">Santa Elena</option>
                                <option value="Santo Domingo de los Tsáchilas">Santo Domingo de los Tsáchilas
                                </option>
                                <option value="Sucumbíos">Sucumbíos</option>
                                <option value="Tungurahua">Tungurahua</option>
                                <option value="Zamora Chinchipe">Zamora Chinchipe</option>
                            </select>
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

                    <div class="row mb-3">
                        <div class="col">
                            <label for="direccionInput" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccionInput" name="direccionInput">
                        </div>
                        <div class="col">
                            <label for="acreditacionInput" class="form-label">Acreditación</label>
                            <input type="text" class="form-control" id="acreditacionInput" name="acreditacionInput">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="regionInput" class="form-label">Región</label>
                            <select class="form-select form-control" id="regionInput" name="regionInput">
                                <option disabled selected>Selecciona una región</option>
                                <option value="SIERRA">Sierra</option>
                                <option value="COSTA">Costa</option>

                            </select>
                        </div>
                        <div class="col">
                            <label for="zonaInput" class="form-label">Zona</label>
                            <input type="text" class="form-control" id="zonaInput" name="zonaInput">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="logoInput" class="form-label">Logo del instituto</label>
                            <input class="form-control form-control-sm" id="logoInput" type="file" name="logoInput">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btnUpdate">Actualizar información</button>
                        <button type="button" class="btn btn-secondary"  onclick="cerrarModal('Editar_datos')" data-dismiss="modal">Cerrar</button>
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
                <button type="button" class="close"  onclick="cerrarModal('agregarSede')" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <input type="hidden" name="id_ies" id="id_ies_sede" value="">
                    <div class="row mb-3">
                        <div class="col">
                            <label>Sede para :</label>
                            <input type="text" class="form-control" disabled id="nombreIes" name="nombreIes">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nombreSede" class="form-label">Nombre de la sede</label>
                            <input type="text" class="form-control" id="nombreSede" name="nombreSede">
                        </div>
                    </div>
                    <input type="hidden" name="nombre_ies" value="">

                    <div class="row mb-3">
                        <div class="col">
                            <label for="direccionInput" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccionSede" name="direccionInput">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-add">Agregar sede</button>
                        <button type="button" class="btn btn-secondary"  onclick="cerrarModal('agregarSede')" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url("assets/js/admin/institutos/content.js") ?>"></script>
<?= $this->endSection() ?>