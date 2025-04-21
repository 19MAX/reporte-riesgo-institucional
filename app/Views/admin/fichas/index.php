<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
Usuarios
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Fichas</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Todas los fichas generadas</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="fichas" width="100%" cellspacing="0">
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url("assets/js/admin/fichas/index.js") ?>"></script>
<?= $this->endSection() ?>