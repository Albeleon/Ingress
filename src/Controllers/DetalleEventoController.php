<?php 

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Event;
use App\Entity\StatsEvent;

//Controlador de la página de detalle de un evento.
class DetalleEventoController extends AbstractController
{
    //Función que se ejecuta al entrar en la página "/detalleEvento" junto a un parámetro con la ID de un evento.
    //Muestra los datos del evento, incluyendo la lista de agentes asociados a dicho evento.
    public function boot($idEvento) {
        $em = (new EntityManager())->get();
        $repository = $em->getRepository(Event::class);
        $event = $repository->findOneBy(["id" => $idEvento]);

        //Conseguir StatsEvents a partir del Evento, y a partir de StatsEvents conseguir todos los distintos agentes.
        $agents = [];
        $statsEvents = $event->getStatsEvents();

        foreach ($statsEvents as $s) {
            if (!in_array($s->getAgente(), $agents)) {
                array_push($agents, $s->getAgente());
            }
        }

        //Imprimir plantilla TWIG pasando el evento y los agentes con los que está asociao.
        $this->render("detalleEvento.html", [ "event" => $event, "agents" => $agents ]);
    }
}