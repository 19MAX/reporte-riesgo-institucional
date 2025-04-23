<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
Usuarios
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Agregar nueva ficha</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Selecciona el campus o el analista al que dará soporte</h6>
        </div>
        <div class="card-body">
            <form id="form_campus">
                <div class="row mb-3" id="contenedorCampus">
                    <div class="col">
                        <label class="form-label">Campus</label>
                        <select class="form-select select2" id="user_campus" name="id_campus" style="width:100%;">
                            <option selected value="">Selecciona un campus</option>
                        </select>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-outline-success" type="button" id="btnCampus">Proceder con la ficha</button>
                </div>
            </form>
        </div>
    </div>

    <?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url("assets/js/admin/fichas/content.js") ?>"></script>
<?= $this->endSection() ?>