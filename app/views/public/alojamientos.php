<?php
session_start();
require_once __DIR__ . "/../../controllers/AccommodationController.php";

$accommodationController = new AccommodationController();
$accommodations = $accommodationController->index(); // Trae todos los alojamientos activos
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxeStay - Alojamientos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/landing.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            padding-top: 56px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php include __DIR__ . "/../layouts/header.php"; ?>

    <!-- Hero -->
    <section class="hero-section text-light position-relative d-flex align-items-center"
        style="background: url('https://res.cloudinary.com/drztldzvn/image/upload/v1758422437/pexels-biong-abdalla-369197604-33967688_ixctqx.jpg') no-repeat center center; 
        background-size: cover; 
        min-height: 90vh;">

        <div class="overlay position-absolute top-0 start-0 w-100 h-100"
            style="background-color: rgba(0,0,0,0.6);"></div>

        <div class="container-lg position-relative" style="z-index: 1;">
            <h1 class="display-5 fw-bold mb-4">Descubre nuestros alojamientos</h1>
            <p class="fs-5 mb-4">
                En LuxeStay te ofrecemos los mejores alojamientos al mejor precio.
            </p>
        </div>
    </section>

    <!-- Sección de Alojamientos -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5" style="color:#2E7D32;">Todos los Alojamientos</h2>
            <div class="row g-4">

                <?php if (!empty($accommodations)): ?>
                    <?php foreach ($accommodations as $accommodation): ?>
                        <div class="col-md-4">
                            <div class="card shadow-sm h-100">
                                <img src="<?= htmlspecialchars($accommodation['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($accommodation['nombre']) ?>">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?= htmlspecialchars($accommodation['nombre']) ?></h5>
                                    <p class="card-text text-secondary"><?= htmlspecialchars($accommodation['descripcion']) ?></p>
                                    <p class="fw-bold text-primary mb-3">$<?= htmlspecialchars($accommodation['precio']) ?> / noche</p>
                                    <a href="/crud-alojamientos/app/views/public/login.php" class="btn btn-success">Agregar ahora</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">No hay alojamientos disponibles en este momento.</p>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include __DIR__ . "/../layouts/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>