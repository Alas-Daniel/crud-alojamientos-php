<?php
session_start();
require_once __DIR__ . "/../../controllers/AuthController.php";

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirmar'];

    if ($password !== $confirm) {
        $error = "Passwords do not match!";
    } else {
        $result = AuthController::register($name, $email, $password);
        if ($result === true) {
            $success = "Account created successfully! <a href='login.php'>Login here</a>";
        } else {
            $error = $result;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/landing.css">
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow p-4" style="max-width: 450px; width: 100%;">
        <h3 class="text-center mb-4 text-success">Crear Cuenta</h3>
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($success)) : ?>
            <div class="alert alert-success">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Juan Pérez" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@mail.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
            </div>
            <div class="mb-3">
                <label for="confirmar" class="form-label">Confirmar contraseña</label>
                <input type="password" class="form-control" id="confirmar" name="confirmar" placeholder="********" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Registrarse</button>
        </form>
        <div class="text-center mt-3">
            <small>¿Ya tienes cuenta? <a href="/crud-alojamientos/app/views/public/login.php" class="text-decoration-none">Inicia sesión</a></small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>