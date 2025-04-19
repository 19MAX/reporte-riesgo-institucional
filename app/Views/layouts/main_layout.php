<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('title'); ?></title>
    <?= view('partials/head') ?>
</head>

<body id="page-top">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= view('partials/sidebar') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= view('partials/topbar') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <input type="hidden" id="csrf_token_name" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                    <?= $this->renderSection('content') ?>
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?= view('partials/footer') ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?= view('partials/scripts') ?>

    <script>
        const base_url = "<?= base_url() ?>";
    </script>

    <?= $this->renderSection('scripts'); ?>
</body>

</html>