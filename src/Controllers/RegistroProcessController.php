<?php 

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Agent;

//Controlador del procesado de registro.
class RegistroProcessController extends AbstractController
{
    //Función que se ejecuta al entrar en la página "/registroProcess". Comprueba si el usuario por post no existe y entonces
    //crea el usuario y redirige a la página principal. Si existe, redirige a la página de registro con el aviso de error.
    public function boot() {
        $em = (new EntityManager())->get();
        $repository = $em->getRepository(Agent::class);
        if (!$repository->checkUser($_POST["user"])) {
            $repository->registerUser($_POST["user"], $_POST["pass"], $_POST["faccion"]);
            header("location:/");
        }
        else {
            header("location:/registro/error");
        }
    }
}