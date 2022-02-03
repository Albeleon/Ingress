<?php 

namespace App\Controllers;

use App\Core\AbstractController;

//Controlador de la página de logout.
class LogoutController extends AbstractController
{
    //Función que se ejecuta al entrar en la página "/logout". Comprueba si hay usuario en la variable de sesión, y en ese caso la destruye.
    //Después redirige a la página principal.
    public function boot() {
        if (isset($_SESSION["user"])) {
            session_destroy();
        }

        header("location:/");
    }
}