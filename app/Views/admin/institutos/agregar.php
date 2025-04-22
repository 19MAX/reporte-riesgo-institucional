<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
Agregar Instituto
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Agregar Instituto</h1>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Agregar instituto
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data">
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
                                <option value="Santo Domingo de los Tsáchilas">Santo Domingo de los Tsáchilas</option>
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
                            <label for="cord_x" class="form-label">Latitud</label>
                            <input type="text" class="form-control" id="cord_x" name="cord_x">
                        </div>
                        <div class="col">
                            <label for="cord_y" class="form-label">Longitud</label>
                            <input type="text" class="form-control" id="cord_y" name="cord_y">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="logoInput" class="form-label">Logo del instituto</label>
                            <input class="form-control form-control-sm" id="logoInput" type="file" name="logoInput"
                                accept="image/*" onchange="previewImage(event)">
                        </div>
                    </div>
                    <div class="row mb-3 text-center">
                        <div class="col">
                            <img class="img-fluid w-25" id="preview" src="../../public/img/img.jpg"
                                alt="Vista previa del logo">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="btnInsertar">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>

    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function () {
            const preview = document.getElementById('preview');
            preview.src = reader.result;
        };
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script src="<?= base_url("assets/js/admin/institutos/agregar.js") ?>"></script>
<?= $this->endSection() ?>