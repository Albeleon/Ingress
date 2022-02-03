<?php 

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Agent;
use App\Entity\StatsEvent;
use App\Entity\Event;

//Controlador de la página de perfil.
class PerfilController extends AbstractController
{
    //Función que se ejecuta al entrar en la página "/perfil". Crea la página de perfil, solo en caso de que haya una variable de sesión
    //del usuario, si no devuelve a la página principal. Consigue los datos del usuario y se los pasa a la vista PerfilPage.
    //También consigue los datos de las estadísticas iniciales y finales de cada evento que el usuario participó que les pasa en un array
    //de un par de las estadísticas.
    public function boot() {
        if (isset($_SESSION["user"])) {
            $em = (new EntityManager())->get();
            $repository = $em->getRepository(Agent::class);
            $dataUser = $repository->getUser($_SESSION["user"]);

            //Para que TWIG pueda imprimir cómodamente la diferencia de estadísticas de eventos,
            //vamos a crear un array que se componga de arrays de dos StatsEvents del usuario.
            //Para ello primero tenemos que conseguir los eventos en los que participó.
            $events = [];
            $statsEvents = $dataUser->getStatsEvents();

            foreach ($statsEvents as $s) {
                if (!in_array($s->getEvento(), $events)) {
                    array_push($events, $s->getEvento());
                }
            }

            //Luego a partir del evento creamos un array de dos elementos con los dos StatsEvents de ese evento.
            //Hay que asegurarse que ignora otros agentes que participasen en el evento.
            $arrayStatsEvents = [];

            foreach ($events as $event) {
                $pairStatsEvents = [];
                foreach ($event->getStatsEvents() as $s) {
                    if ($s->getAgente() == $dataUser) {
                        array_push($pairStatsEvents, $s);
                    }
                }
                array_push($arrayStatsEvents, $pairStatsEvents);
            }
            
            //Pasamos los datos del usuario y el array de pareados de StatsEvents a la plantilla de TWIG.
            $this->render("perfil.html", [ "dataUser" => $dataUser, "arrayStatsEvents" => $arrayStatsEvents ]);
        }
        else {
            header("location:/");
        }
    }
}