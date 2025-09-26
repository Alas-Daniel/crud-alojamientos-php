<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/crud-alojamientos/config/Database.php";

class Accommodation
{
    // Obtener alojamientos activos
    public static function getAllActive()
    {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->query("SELECT * FROM alojamientos WHERE activo = 1");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo alojamiento
    public static function create($nombre, $descripcion, $precio, $imagen)
    {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("INSERT INTO alojamientos (nombre, descripcion, precio, imagen, activo) VALUES (?,?,?,?,1)");
        return $stmt->execute([$nombre, $descripcion, $precio, $imagen]);
    }

    // Actualizaralojamiento
    public static function update($id, $nombre, $descripcion, $precio, $imagen)
    {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("UPDATE alojamientos SET nombre=?, descripcion=?, precio=?, imagen=? WHERE id=?");
        return $stmt->execute([$nombre, $descripcion, $precio, $imagen, $id]);
    }

    // Buscar un alojamiento por ID
    public static function findById($id)
    {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM alojamientos WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

      // Soft delete: marcar alojamiento como inactivo
    // public static function delete($id)
    // {
    //     $pdo = Connection::getInstance()->getConnection();
    //     $stmt = $pdo->prepare("UPDATE alojamientos SET activo = 0 WHERE id=?");
    //     return $stmt->execute([$id]);
    // }
}
