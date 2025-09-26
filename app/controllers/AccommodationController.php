<?php
require_once __DIR__ . "/../models/Accommodation.php";

class AccommodationController
{
    // Mostrar alojamientos activos
    public function index()
    {
        return Accommodation::getAllActive();
    }

    // Guardar un nuevo alojamiento (con link de imagen)
    public function store($data)
    {
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $precio = $data['precio'];
        $imagen = $data['imagen']; // URL Cloudinary

        return Accommodation::create($nombre, $descripcion, $precio, $imagen);
    }

    // Actualizar alojamiento
    public function update($id, $data)
    {
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $precio = $data['precio'];
        $imagen = $data['imagen']; 

        return Accommodation::update($id, $nombre, $descripcion, $precio, $imagen);
    }

    // Obtener un alojamiento por ID para edición
    public function edit($id)
    {
        return Accommodation::findById($id);
    }

    // Eliminar alojamiento (soft delete)
    // public function delete($id)
    // {
    //     return Accommodation::delete($id);
    // }
}
