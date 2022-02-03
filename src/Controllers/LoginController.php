<?php 

namespace App\Controllers;

use App\Core\AbstractController;

//Controlador de la página de login.
class LoginController extends AbstractController
{
    //Función que se ejecuta al entrar en la página "/login". Crea la página de login, mostrando mensaje de error si se entra en /login/error.
    //Si se tiene sesión de usuario redirige a la página principal.
    public function boot($error = null) {
        if (!isset($_SESSION["user"])) {
            $this->render("login.html", [ "error" => $error != null ]);
        }
        else {
            header("location:/");
        }
    }
}