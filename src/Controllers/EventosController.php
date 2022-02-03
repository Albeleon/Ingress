<?php 

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Event;

//Controlador de la página de eventos.
class EventosController extends AbstractController
{
    //Función que se ejecuta al entrar en la página "/eventos". Crea la página de eventos con la lista
    //de los eventos que se hayan hecho.
    public function boot() {
        $em = (new EntityManager())->get();
        $repository = $em->getRepository(Event::class);
        $events = $repository->findAll();
        $this->render("eventos.html", [ "events" => $events ]);
    }
}