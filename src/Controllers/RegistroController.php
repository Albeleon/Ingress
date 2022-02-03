<?php 

namespace App\Controllers;

use App\Core\AbstractController;

//Controlador de la página de registro.
class RegistroController extends AbstractController
{
    //Función que se ejecuta al entrar en la página "/registro". Crea la página de registro, mostrando mensaje de error
    //si se entra en /registro/error. Si se tiene sesión de usuario redirige a la página principal.
    public function boot($error = null) {
        if (!isset($_SESSION["user"])) {
            $this->render("registro.html", [ "error" => $error != null ]);
        }
        else {
            header("location:/");
        }
    }
}