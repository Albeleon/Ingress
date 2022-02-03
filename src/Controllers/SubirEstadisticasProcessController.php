<?php 

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Stats;

//Controlador de la página de procesado de subir estadísticas.
class SubirEstadisticasProcessController extends AbstractController
{
    //Función que se ejecuta al entrar en la página "/subirEstadisticasProcess". Comprueba si los datos introducidos en el formulario
    //por POST son correctos, y si es así los inserta en la base de datos y devuelve a la página con mensaje de éxito. Si no, devuelve
    //a la página con mensaje de error.
    public function boot($text = null) {
        $em = (new EntityManager())->get();
        $repository = $em->getRepository(Stats::class);

        if ($repository->checkEstadisticas($_POST["estadistica"])) {
            $repository->registerEstadisticas($_POST["estadistica"]);
            header("location:/subirEstadisticas/success");
        }
        else {
            header("location:/subirEstadisticas/error");
        }
    }
}