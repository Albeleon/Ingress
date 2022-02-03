<?php

namespace App\Repository;

use App\Entity\Tareas;
use App\Core\EntityManager;
use App\Entity\Stats;
use App\Entity\Agent;
use App\Entity\Upload;
use Doctrine\ORM\EntityRepository;

//Clase del repositorio de la entidad Agent.
class AgentRepository extends EntityRepository
{
    //Función que comprueba si el usuario existe, devuelve un bool.
    public function checkUser($user) {
        $agente = $this->findOneBy(['name' => $user]);
        return !is_null($agente);
    }

    //Función que comprueba si el usuario existe y tiene esa misma contraseña, devuelve un bool.
    public function checkUserPassword($user, $password) {
        $agente = $this->findOneBy(['name' => $user]);
        if (!is_null($agente) && !empty($agente)) {
            return password_verify($password, $agente->getContraseña());
        }
    }

    //Función que inserta en la lista de agentes con los datos introducidos.
    //Devuelve el agente si se registró correctamente, si no un null.
    public function registerUser($user, $password, $faccion) {
        $agente = $this->findOneBy(['name' => $user]);
        if(is_null($agente) || empty($agente)){
            $nuevoAgente = new Agent();
            $nuevoAgente->setNombre($user);
            $nuevoAgente->setContraseña(password_hash($password, PASSWORD_BCRYPT));
            $nuevoAgente->setFaccion($faccion);
            
            $this->getEntityManager()->persist($nuevoAgente);
            $this->getEntityManager()->flush();
            
            return $nuevoAgente;
        }
        
        return null;
    }

    //Función que devuelve un objeto del agente según su nombre de usuario.
    public function getUser($user) {
        $agente = $this->findOneBy(['name' => $user]);
        return $agente;
    }

    //Función que devuelve los nombres de todos los usuarios de la base de datos.
    public function getUsers() {
        $agentes = $this->findAll();
        return $agentes;
    }

    //Función que devuelve los nombres de todos los usuarios de la base de datos con estadísticas ordenados por el valor del tipo
    //de estadística a comparar y junto a su valor.
    //(Por la complejidad de la petición y fracaso al intentar implementarlo con consultas normales, se ha utilizado DQL)
    public function getRankingUsers($comparador) {
        $em = $this->getEntityManager();

        //Conseguir el nombre del parámetro a consultar en formato SQL.
        $repository = $em->getRepository(Stats::class);
        $formatedComparador = $repository->formatComparador($comparador);

        //Hacer consulta DQL.
        $dql = "SELECT agent.name, stats.$formatedComparador AS mainValue FROM App\Entity\Agent agent INNER JOIN agent.uploads u WITH agent.id = u.agent INNER JOIN agent.stats stats WITH u.id = stats.upload WHERE u.id = ANY (SELECT uploads.id FROM App\Entity\Upload uploads WHERE agent = u.agent) ORDER BY mainValue DESC";
        $query = $em->createQuery($dql);
        $result = $query->getResult();
        return $result;
    }
}


