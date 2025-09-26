<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/crud-alojamientos/config/Database.php";

class UserAccommodation {

    // Obtener los alojamientos seleccionados por un usuario
    public static function getByUser($userId) {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("
            SELECT ua.id as ua_id, a.* 
            FROM usuario_alojamiento ua
            JOIN alojamientos a ON ua.alojamiento_id = a.id
            WHERE ua.usuario_id = ?
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Agregar alojamiento a la lista del usuario
    public static function add($userId, $accommodationId) {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("INSERT INTO usuario_alojamiento (usuario_id, alojamiento_id) VALUES (?, ?)");
        return $stmt->execute([$userId, $accommodationId]);
    }

    // Eliminar alojamiento de la lista del usuario
    public static function remove($userId, $accommodationId) {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("DELETE FROM usuario_alojamiento WHERE usuario_id = ? AND alojamiento_id = ?");
        return $stmt->execute([$userId, $accommodationId]);
    }
}
