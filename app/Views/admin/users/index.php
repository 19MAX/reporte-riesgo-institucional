<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
Usuarios
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Usuarios</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"></i>
            Todos los usuarios registrados</h6>
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
                <button type="button" class="close" onclick="cerrarModal('Eliminar')" data-dismiss="modal"
                    aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de que desea eliminar al usuario ?</p>
                <form id="eliminarForm">
                    <input type="hidden" name="id_usuario" id="id_usuario" value="">
                    <input class="form-control" type="text" disabled name="user_name" id="user_name" value="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="cerrarModal('Eliminar')"
                    data-dismiss="modal">Cancelar</button>
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
                <button type="button" class="close" onclick="cerrarModal('Editar_datos')" data-dismiss="modal"
                    aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" id="id_user" value="">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="cedula" class="form-label">Cédula</label>
                            <input type="text" class="form-control" id="cedula" name="cedula">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputNombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="inputNombres" name="inputNombres">
                        </div>
                        <div class="col">
                            <label for="inputApellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="inputApellidos" name="inputApellidos">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="col">
                            <label for="rol" class="form-label">Rol</label>
                            <input type="text" class="form-control" id="rol" name="rol">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btnUpdate">Actualizar información</button>
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('Editar_datos')"
                            data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Actualizar Contraseña -->
<div class="modal fade" id="ActualizarPassword" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordModalLabel">Actualizar Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal('ActualizarPassword')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_user_password">
                <div class="form-group">
                    <label>Usuario:</label>
                    <input type="text" class="form-control" id="user_name_password" readonly>
                </div>
                <div class="form-group">
                    <label for="newPassword">Nueva Contraseña:</label>
                    <input type="password" class="form-control" id="newPassword" placeholder="Ingrese nueva contraseña">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmar Contraseña:</label>
                    <input type="password" class="form-control" id="confirmPassword"
                        placeholder="Confirme la contraseña">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarModal('ActualizarPassword')">Cancelar</button>
                <button type="button" id="btnUpdatePassword" class="btn btn-primary" >Actualizar</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url("assets/js/admin/users/content.js") ?>"></script>
<?= $this->endSection() ?>