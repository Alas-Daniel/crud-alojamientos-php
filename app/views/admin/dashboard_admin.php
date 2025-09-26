<?php
session_start();

require_once __DIR__ . "/../../controllers/AccommodationController.php";

$accommodationController = new AccommodationController();

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: /crud-alojamientos/app/views/public/login.php");
    exit;
}

// Agregar alojamiento
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_accommodation'])) {
    $result = $accommodationController->store([
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion'],
        'precio' => $_POST['precio'],
        'imagen' => $_POST['imagen']
    ]);
    header("Location: dashboard_admin.php");
    exit;
}

// Actualizar alojamiento
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_accommodation'])) {
    $id = $_POST['id'];
    $data = [
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion'],
        'precio' => $_POST['precio'],
        'imagen' => $_POST['imagen']
    ];

    $result = $accommodationController->update($id, $data);
    header("Location: dashboard_admin.php");
    exit;
}

$accommodations = $accommodationController->index();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/landing.css">
</head>

<body class="bg-light">

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="/crud-alojamientos/app/views/admin/dashboard_admin.php">Panel de Administrador</a>
            <div class="mx-auto text-white fw-semibold">
                Bienvenido, Administrador
            </div>
            <div class="ms-auto d-flex gap-2">
                <a href="/crud-alojamientos/app/views/public/home.php" class="btn btn-outline-light">Ir a la Landing</a>
                <a href="/crud-alojamientos/app/views/public/logout.php" class="btn btn-danger">Cerrar sesión</a>
            </div>
        </div>
    </nav>

    <section class="container py-5">
        <!-- Agregar alojamiento -->
        <div class="card mb-5 shadow-sm p-4">
            <h5 class="mb-3">Agregar Nuevo Alojamiento</h5>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Alojamiento</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del alojamiento" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción breve" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio por noche</label>
                    <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio por noche" required>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">URL de la imagen</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" placeholder="https://example.com/imagen.jpg" required>
                </div>
                <button type="submit" name="add_accommodation" class="btn btn-success w-100">Agregar Alojamiento</button>
            </form>
        </div>

        <!-- Alojamientos existentes -->
        <h3 class="mb-4 text-secondary">Alojamientos existentes</h3>
        <div class="row g-4">
            <?php foreach ($accommodations as $accommodation): ?>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="<?= $accommodation['imagen'] ?>" class="card-img-top" alt="<?= $accommodation['nombre'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $accommodation['nombre'] ?></h5>
                            <p class="card-text"><?= $accommodation['descripcion'] ?></p>
                            <p class="text-primary fw-bold">$<?= $accommodation['precio'] ?> / noche</p>
                            <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#editModal<?= $accommodation['id'] ?>">Editar</button>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editModal<?= $accommodation['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $accommodation['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel<?= $accommodation['id'] ?>">Editar Alojamiento</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?= $accommodation['id'] ?>">
                                    <div class="mb-3">
                                        <label for="nombre<?= $accommodation['id'] ?>" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre<?= $accommodation['id'] ?>" name="nombre" value="<?= $accommodation['nombre'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcion<?= $accommodation['id'] ?>" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="descripcion<?= $accommodation['id'] ?>" name="descripcion" rows="3" required><?= $accommodation['descripcion'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="precio<?= $accommodation['id'] ?>" class="form-label">Precio</label>
                                        <input type="number" class="form-control" id="precio<?= $accommodation['id'] ?>" name="precio" value="<?= $accommodation['precio'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagen<?= $accommodation['id'] ?>" class="form-label">URL de la imagen</label>
                                        <input type="text" class="form-control" id="imagen<?= $accommodation['id'] ?>" name="imagen" value="<?= $accommodation['imagen'] ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="update_accommodation" class="btn btn-success">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>