<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $this->renderSection('title'); ?></title>

    <!-- Include your CSS files -->
    <link href="<?= base_url("assets/fontawesome-free/css/all.min.css") ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?= base_url("assets/css/sb-admin-2.min.css") ?>" rel="stylesheet">

    <link href="<?= base_url("assets/css/style.css") ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <!-- Add other CSS files as needed -->

    <?= $this->renderSection('styles'); ?>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">

                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Include your JS files -->
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url("assets/js/jquery/jquery.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url("assets/js/jquery-easing/jquery.easing.min.js") ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url("assets/js/sb-admin-2.min.js") ?>"></script>

    <!-- Page level plugins -->
    <!-- <script src="<?= base_url("assets/js/chart.js/Chart.min.js") ?>"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="../../public/js/demo/chart-area-demo.js"></script>
    <script src="../../public/js/demo/chart-pie-demo.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function cerrarModal(modalId) {
            $("#" + modalId).modal("hide");
        }

    </script>

    <?= $this->renderSection('scripts'); ?>
</body>

</html>