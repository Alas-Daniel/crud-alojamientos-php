<?php
session_start();
require_once __DIR__ . "/../../controllers/UserPanelController.php";

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] === 'admin') {
    header("Location: /crud-alojamientos/app/views/public/login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$userName = $_SESSION['user_name'];

$controller = new UserPanelController();

// Agregar alojamiento
if (isset($_GET['add'])) {
    $controller->addToMyList($userId, $_GET['add']);
    header("Location: dashboard_user.php");
    exit;
}

// Eliminar alojamiento
if (isset($_GET['remove'])) {
    $controller->removeFromMyList($userId, $_GET['remove']);
    header("Location: dashboard_user.php");
    exit;
}

$availableAccommodations = $controller->getAvailableAccommodations();
$myAccommodations = $controller->getMyAccommodations($userId);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/landing.css">
</head>

<body class="bg-light">

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="/crud-alojamientos/app/views/user/dashboard_user.php">Panel de Usuario</a>
            <div class="mx-auto text-white fw-semibold">
                Bienvenido, <?= htmlspecialchars($userName) ?>
            </div>
            <div class="ms-auto d-flex gap-2">
                <a href="/crud-alojamientos/app/views/public/home.php" class="btn btn-outline-light">Ir a la Landing</a>
                <a href="/crud-alojamientos/app/views/public/logout.php" class="btn btn-danger">Cerrar sesión</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">

        <!-- Alojamientos disponibles -->
        <h3 class="mb-4 text-dark">Alojamientos disponibles</h3>
        <div class="row g-4 mb-5">
            <?php foreach ($availableAccommodations as $accommodation):
                $alreadyAdded = false;
                foreach ($myAccommodations as $my) {
                    if ($my['id'] == $accommodation['id']) {
                        $alreadyAdded = true;
                        break;
                    }
                }
            ?>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="<?= htmlspecialchars($accommodation['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($accommodation['nombre']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($accommodation['nombre']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($accommodation['descripcion']) ?></p>
                            <p class="text-primary fw-bold">$<?= htmlspecialchars($accommodation['precio']) ?> / noche</p>
                            <a href="?add=<?= $accommodation['id'] ?>" class="btn btn-success w-100 <?= $alreadyAdded ? 'disabled' : '' ?>">
                                <?= $alreadyAdded ? 'Agregado' : 'Agregar a mi lista' ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Mis alojamientos -->
        <h3 class="mb-4 text-dark">Mis alojamientos</h3>
        <div class="row g-4">
            <?php foreach ($myAccommodations as $accommodation): ?>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="<?= htmlspecialchars($accommodation['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($accommodation['nombre']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($accommodation['nombre']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($accommodation['descripcion']) ?></p>
                            <p class="text-primary fw-bold">$<?= htmlspecialchars($accommodation['precio']) ?> / noche</p>

                            <!-- Botón para abrir modal -->
                            <button type="button" class="btn btn-danger w-100"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal<?= $accommodation['id'] ?>">
                                Eliminar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal individual -->
                <div class="modal fade" id="deleteModal<?= $accommodation['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $accommodation['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel<?= $accommodation['id'] ?>">Confirmar Eliminación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                ¿Estás seguro de que quieres eliminar el alojamiento "<?= htmlspecialchars($accommodation['nombre']) ?>"?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <a href="?remove=<?= $accommodation['id'] ?>" class="btn btn-danger">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>