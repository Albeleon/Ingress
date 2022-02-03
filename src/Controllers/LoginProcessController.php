<?php 

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Agent;

//Controlador del procesado de Login.
class LoginProcessController extends AbstractController
{
    //Función que se ejecuta al entrar en la página "/loginProcess". Comprueba si los datos por post son correctos y si es así crea la variable
    //de sesión y redirige a la página principal. Si no, devuelve a la página de login con error.
    public function boot() {
        $em = (new EntityManager())->get();
        $repository = $em->getRepository(Agent::class);
        if ($repository->checkUserPassword($_POST["user"], $_POST["pass"])) {
            $_SESSION["user"] = $_POST["user"];
            header("location:/");
        }
        else {
            header("location:/login/error");
        }
    }
}