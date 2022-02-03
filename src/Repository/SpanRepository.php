<?php

namespace App\Repository;

use App\Entity\Tareas;
use App\Core\EntityManager;
use Doctrine\ORM\EntityRepository;

//Clase del repositorio de la entidad Span.
class SpanRepository extends EntityRepository
{
    //Función que devuelve un objeto del span según su nombre.
    public function getSpan($span) {
        $timeSpan = $this->findOneBy(['time' => $span]);
        return $timeSpan;
    }
}


