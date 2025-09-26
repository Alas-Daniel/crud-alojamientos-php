<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/crud-alojamientos/config/Database.php";


class User {
    //Insertar usuario
    public static function create($name, $email, $password, $role = "user") {
        $pdo = Connection::getInstance()->getConnection();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre,email,password,rol) VALUES (?,?,?,?)");
        return $stmt->execute([$name, $email, $hashedPassword, $role]);
    }

    //Traer usuario especifico
    public static function findByEmail($email) {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Verificar usuario
    public static function verifyCredentials($email, $password) {
        $user = self::findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

}
