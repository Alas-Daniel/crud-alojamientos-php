<?php
require_once __DIR__ . "/../models/UserAccommodation.php";
require_once __DIR__ . "/../models/Accommodation.php";

class UserPanelController {

    // Obtener todos los alojamientos activos
    public function getAvailableAccommodations() {
        return Accommodation::getAllActive();
    }

    // Obtener los alojamientos del usuario
    public function getMyAccommodations($userId) {
        return UserAccommodation::getByUser($userId);
    }

    // Agregar alojamiento a la lista del usuario
    public function addToMyList($userId, $accommodationId) {
        // Verificar si ya existe para no insertar duplicado
        $myAccommodations = $this->getMyAccommodations($userId);
        foreach ($myAccommodations as $accommodation) {
            if ($accommodation['id'] == $accommodationId) {
                return false; // ya existe
            }
        }
        return UserAccommodation::add($userId, $accommodationId);
    }

    // Eliminar alojamiento de la lista del usuario
    public function removeFromMyList($userId, $accommodationId) {
        return UserAccommodation::remove($userId, $accommodationId);
    }
}
