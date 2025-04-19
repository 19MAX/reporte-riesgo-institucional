<?= $this->extend('layouts/login_layout'); ?>

<?= $this->section('title') ?>
Login
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card-body p-0">
    <div class="row">
        <div class="col-lg-6 d-none d-lg-block bg-login-image text-center">
            <img class="img-fluid" src="<?= base_url('assets/img/auth-img.png') ?>" alt="Lg">
        </div>
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">IES</h1>
                    <img class="img-fluid" src="<?= base_url('assets/img/logos/logo_sncyt.png') ?>" alt="">
                </div>
                <form class="user" id="loginForm" action="<?=base_url("login")?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" name="email" id="email"
                            aria-describedby="emailHelp" placeholder="Correo electrónico...">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password" id="password"
                            placeholder="Contraseña...">
                    </div>
                    <button type="submit" id="btnentrar" class="btn btn-primary btn-user btn-block">
                        Iniciar Sesión
                    </button>
                    <hr>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="<?= base_url('auth/forgot-password') ?>">¿Olvidó su
                        contraseña?</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
