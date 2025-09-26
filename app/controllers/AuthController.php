<?php
require_once __DIR__ . "/../models/User.php";


class AuthController
{
    //Funcion para registrarse
    public static function register($name, $email, $password, $role = "usuario")
    {
        if (User::findByEmail($email)) {
            return "Email already exists!";
        }
        return User::create($name, $email, $password, $role);
    }

    //Funcion de login
    public static function login($email, $password)
    {
        $user = User::verifyCredentials($email, $password);
        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nombre'];
            $_SESSION['user_role'] = $user['rol'];

            if ($user['rol'] === 'admin') {
                header("Location: /crud-alojamientos/app/views/admin/dashboard_admin.php");
            } else {
                header("Location: /crud-alojamientos/app/views/user/dashboard_user.php");
            }
            exit;
        } else {
            return "Invalid credentials!";
        }
    }

    //Funcion para cerrar la sesion
    public static function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: home.php");
        exit;
    }
}
