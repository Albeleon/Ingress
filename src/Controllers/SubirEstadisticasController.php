<?php 

namespace App\Controllers;

use App\Core\AbstractController;

//Controlador de la página de subir estadísticas.
class SubirEstadisticasController extends AbstractController
{
    //Función que se ejecuta al entrar en la página "/subirEstadisticas". Crea la página de subir estadísticas, mostrando mensaje de error
    //si se entra en /subirEstadisticas/error y mensaje de éxito si se entra en subirEstadisticas/error.
    //Si no se tiene sesión de usuario redirige a la página principal.
    public function boot($text = null) {
        $this->render("estadisticas.html", [ "error" => $text == "error", "success" => $text == "success" ]);
    }
}