<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="#">LuxeStay</a>

        <!-- Botón que abre el offcanvas -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNav"
            aria-controls="offcanvasNav" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-none d-lg-flex" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/crud-alojamientos/app/views/public/home.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/crud-alojamientos/app/views/public/alojamientos.php">Alojamientos</a>
                </li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item ms-lg-2">
                        <?php if ($_SESSION['user_role'] === 'admin'): ?>
                            <a class="btn btn-light px-4 fw-semibold" href="/crud-alojamientos/app/views/admin/dashboard_admin.php">Gestionar</a>
                        <?php else: ?>
                            <a class="btn btn-light px-4 fw-semibold" href="/crud-alojamientos/app/views/user/dashboard_user.php">Gestionar</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-danger px-4 fw-semibold" href="/crud-alojamientos/app/views/public/logout.php">Cerrar sesión</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-outline-light px-4 fw-semibold" href="/crud-alojamientos/app/views/public/login.php">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-warning px-4 fw-semibold" href="/crud-alojamientos/app/views/public/register.php">Registrarse</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Offcanvas para mobile -->
<div class="offcanvas offcanvas-end bg-primary text-white"
    tabindex="-1" id="offcanvasNav" aria-labelledby="offcanvasNavLabel"
    style="width:280px;">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title fw-bold" id="offcanvasNavLabel">LuxeStay</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>

    <div class="offcanvas-body">
        <ul class="navbar-nav text-start">
            <li class="nav-item">
                <a class="nav-link text-white" href="/crud-alojamientos/app/views/public/home.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/crud-alojamientos/app/views/public/alojamientos.php">Alojamientos</a>
            </li>

            <?php if (isset($_SESSION['user_id'])): ?>
                <li class="nav-item mt-3">
                    <?php if ($_SESSION['user_role'] === 'admin'): ?>
                        <a class="btn btn-light w-100 fw-semibold" href="/crud-alojamientos/app/views/admin/dashboard_admin.php">Gestionar</a>
                    <?php else: ?>
                        <a class="btn btn-light w-100 fw-semibold" href="/crud-alojamientos/app/views/user/dashboard_user.php">Gestionar</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item mt-2">
                    <a class="btn btn-danger w-100 fw-semibold" href="/crud-alojamientos/app/views/public/logout.php">Cerrar sesión</a>
                </li>
            <?php else: ?>
                <li class="nav-item mt-3">
                    <a class="btn btn-outline-light w-100 fw-semibold" href="/crud-alojamientos/app/views/public/login.php">Iniciar Sesión</a>
                </li>
                <li class="nav-item mt-2">
                    <a class="btn btn-warning w-100 fw-semibold" href="/crud-alojamientos/app/views/public/register.php">Registrarse</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>