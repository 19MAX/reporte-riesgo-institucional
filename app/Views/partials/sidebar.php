<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?modulo=home">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-land-mine-on"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Riesgo institucional</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($modulo === 'home') ? 'active menu-open' : '' ?>">
        <a href="<?=base_url("admin")?>" class="nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Panel</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item <?= ($modulo === 'fichas') ? 'active menu-open' : '' ?>">
        <a class="nav-link" href="<?= base_url("admin/fichas")?>">
            <i class="fas fa-paste"></i>
            <span>Fichas</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item <?= ($modulo === 'institutos') ? 'active' : '' ?>">
        <a class="nav-link" href="<?=base_url("admin/institutos")?>">
            <i class="fa fa-map-marker"></i>
            <span>Institutos</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item <?= ($modulo === 'USERS') ? 'active' : '' ?>">
        <a class="nav-link" href="<?=base_url("admin/users")?>">
            <i class="fas fa-user"></i>
            <span>Usuarios</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
