<?php 

namespace App\Controllers;

use App\Core\AbstractController;

//Controlador de la página principal.
class MainController extends AbstractController
{
    //Función que se ejecuta al entrar en la página "/". Crea la página principal, teniendo en cuenta si el usuario tiene sesión o no.
    public function boot() {
        $this->render("main.html",[]);
    }
}