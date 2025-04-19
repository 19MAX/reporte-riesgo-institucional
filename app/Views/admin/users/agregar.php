<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Usuario</h1>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Agregar usuario
            </div>
            <div class="card-body">

                <form id="agregarUsuarioForm">

                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputCedula" class="form-label">Cédula</label>
                            <input type="text" class="form-control" id="inputCedula" name="cedula" required>
                        </div>
                        <div class="col">
                            <label for="inputCedula" class="form-label">Contraseña</label>
                            <input type="text" class="form-control" id="inputCedula" name="password" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputNombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="inputNombres" name="nombres" required>
                        </div>
                        <div class="col">
                            <label for="inputApellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="inputApellidos" name="apellidos" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputEmail" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" required>
                        </div>
                        <div class="col">
                            <label for="inputRol" class="form-label">Rol</label>
                            <select class="form-select form-control" id="inputRol" name="rol" required>
                                <option value="">Seleccionar...</option>
                                <option value="3">Analista</option>
                                <option value="4">Lector</option>
                                <option value="2">Supervisor</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3" id="instituteContainer" style="display: none;">
                        <label for="inputInstitute" class="form-label">Instituto</label>
                        <select class="form-select" id="inputInstitute" name="id_instituto" style="width: 100%;"></select>
                    </div>
                    <div class="mb-3" id="campusContainer" style="display: none;">
                        <label for="inputCampus" class="form-label">Campus</label>
                        <select class="form-select" id="inputCampus" name="id_campus" style="width: 100%;"></select>
                    </div>
                </form>

            </div>
            <div class="card-footer">
                <button type="submit" form="agregarUsuarioForm" id="btnSaveUsuario" class="btn btn-primary">Agregar Usuario</button>
            </div>
        </div>
    </div>


    <script src="../users/agregar.js"></script>