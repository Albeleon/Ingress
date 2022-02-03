<?php

namespace App\Repository;

use App\Entity\Tareas;
use App\Core\EntityManager;
use App\Entity\Upload;
use Doctrine\ORM\EntityRepository;

//Clase del repositorio de la entidad Upload.
class UploadRepository extends EntityRepository
{
    //Función que inserta en la lista de uploads uno.
    //Devuelve la ID del upload si se registró correctamente, si no un null.
    public function registerUpload($date, $time, $idAgent, $timeSpan, $evento) {
        $upload = new Upload();
        $upload->setFecha(\DateTime::createFromFormat('Y-m-d', $date));
        $upload->setHora(\DateTime::createFromFormat('h:i:s', $time));
        $upload->setAgente($idAgent);
        $upload->setTimeSpan($timeSpan);
        $upload->setEvento($evento);
        
        $this->getEntityManager()->persist($upload);
        $this->getEntityManager()->flush();
        
        return $upload;
    }
}


