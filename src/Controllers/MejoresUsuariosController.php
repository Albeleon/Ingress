<?php 

namespace App\Controllers;

use App\Core\AbstractController;
use App\Entity\Agent;
use App\Entity\Stats;
use App\Core\EntityManager;

//Controlador de la página de mostrar usuarios según estadísticas.
class MejoresUsuariosController extends AbstractController
{
    //Función que se ejecuta al entrar en la página "/mejoresUsuarios". Crea la página de mostrar usuarios ordenados según estadísticas,
    //consiguiendo la lista de comparadores, el comparador actual (por defecto escoge el primero), y con ello consigue la lista de usuarios
    //ordenados descendentement en base al valor más alto que tenga en ese comparador, y los muestra por pantalla, junto a un combobox
    //para escoger por qué otro parámetro comparar.
    public function boot() {
        $em = (new EntityManager())->get();
        $statsRepository = $em->getRepository(Stats::class);
        $comparadores = $statsRepository->getComparadores();
        $comparador = isset($_POST["comparador"]) ? $_POST["comparador"] : $comparadores[0];

        $agentRepository = $em->getRepository(Agent::class);
        $users = $agentRepository->getRankingUsers($comparador);
        $this->render("comparar.html", [ "comparadorActual" => $comparador, "comparadores" => $comparadores, "users" => $users ]);
    }
}