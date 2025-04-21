<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
Formulario de seguridad
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<button class="btn btn-primary mt-3" id="generatePDF">Generar PDF</button>
<div class="container mt-5 row">
    <div class="p-0 col-6">
        <canvas class="p-5" id="myChart"></canvas>
    </div>
    <div class="p-0 col-6">
        <canvas class="p-5" id="barChart"></canvas>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    let id_ficha = "<?= $id_ficha ? $id_ficha : null ?>";
    let dataLogo = "<?= base_url("logo_istel.png") ?>";
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@2.2.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="<?= base_url("assets/js/admin/pdf/content.js") ?>"></script>
<?= $this->endSection() ?>