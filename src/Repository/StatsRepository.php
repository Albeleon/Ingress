<?php

namespace App\Repository;

use App\Entity\Tareas;
use App\Core\EntityManager;
use App\Entity\Agent;
use App\Entity\Span;
use App\Entity\Upload;
use App\Entity\Stats;
use Doctrine\ORM\EntityRepository;

//Clase del repositorio de la entidad Stats.
class StatsRepository extends EntityRepository
{
    private $statsStructure = "Level	Lifetime AP	Current AP	Unique Portals Visited	Unique Portals Drone Visited	Furthest Drone Distance	Portals Discovered	XM Collected	OPR Agreements	Resonators Deployed	Links Created	Control Fields Created	Mind Units Captured	Longest Link Ever Created	Largest Control Field	XM Recharged	Portals Captured	Unique Portals Captured	Mods Deployed	Hacks	Drone Hacks	Glyph Hack Points	Completed Hackstreaks	Longest Sojourner Streak	Resonators Destroyed	Portals Neutralized	Enemy Links Destroyed	Enemy Fields Destroyed	Battle Beacon Combatant	Drones Returned	Max Time Portal Held	Max Time Link Maintained	Max Link Length x Days	Max Time Field Held	Largest Field MUs x Days	Forced Drone Recalls	Distance Walked	Kinetic Capsules Completed	Unique Missions Completed	Mission Day(s) Attended	NL-1331 Meetup(s) Attended	First Saturday Events	Recursions	Months Subscribed";

    //Función que comprueba si las estadísticas son válidas para usarse (el usuario incluido en ellas existe, hay paridad
    //nombre/valor, y si hay 50 o 14 pares), devuelve un bool.
    public function checkEstadisticas($text) {
        //Separar los valores.
        $lines = explode("\n", $text);
        $titles = explode("\t", $lines[0]);
        $values = explode("\t", $lines[1]);

        //Comparar tamaño adecuado y que el usuario esté en la base de datos (llamamos al repositorio de Agente).
        $countTitles = count($titles);
        $countValues = count($values);
        if ($countTitles == $countValues && ($countTitles == 50 || $countTitles == 14)) {
            $em = $this->getEntityManager();
            $repository = $em->getRepository(Agent::class);
            return $repository->checkUser($values[1]);
        }
    }

    //Función que registra las estadísticas, se asume que ya han sido validadas, insertando en uploads y stats.
    public function registerEstadisticas($text) {
        //Guardamos el repositorio al que vamos a llamar varias veces para conseguir diferentes repositorios.
        $em = $this->getEntityManager();

        //Separar los valores.
        $lines = explode("\n", $text);
        $values = explode("\t", $lines[1]);

        //Conseguimos el Agente y el Span.
        $agentRepository = $em->getRepository(Agent::class);
        $agente = $agentRepository->getUser($values[1]);

        $spanRepository = $em->getRepository(Span::class);
        $span = $spanRepository->getSpan($values[0]);

        //Insertar el upload con los datos del Agente y el Span. Guardamos el valor del Upload generado.
        $uploadRepository = $em->getRepository(Upload::class);
        $upload = $uploadRepository->registerUpload($values[3], $values[4], $agente, $span, false);

        //Creamos el Stats y asignamos características.
        $stat = new Stats();

        $stat->setUpload($upload);
        $stat->setAgente($agente);
        $stat->setLevel($values[5]);
        $stat->setLifetimeAp($values[6]);
        $stat->setCurrentAp($values[7]);

        //Si el tamaño del array de valores es 50, se insertan los datos de ese tipo. Si es de 14, se insertan del otro.
        $countValues = count($values);
        if ($countValues == 50) {
            $stat->setUniquePortalsVisited($values[8]);
            $stat->setUniquePortalsDroneVisited($values[9]);
            $stat->setFurthestDroneDistance($values[10]);
            $stat->setPortalsDiscovered($values[11]);
            $stat->setXmCollected($values[12]);
            $stat->setOprAgreements($values[13]);
            $stat->setResonatorsDeployed($values[14]);
            $stat->setLinksCreated($values[15]);
            $stat->setControlFieldsCreated($values[16]);
            $stat->setMindUnitsCaptured($values[17]);
            $stat->setLongestLinkEverCreated($values[18]);
            $stat->setLargestControlField($values[19]);
            $stat->setXmRecharged($values[20]);
            $stat->setPortalsCaptured($values[21]);
            $stat->setUniquePortalsCaptured($values[22]);
            $stat->setModsDeployed($values[23]);
            $stat->setHacks($values[24]);
            $stat->setDroneHacks($values[25]);
            $stat->setGlyphHackPoints($values[26]);
            $stat->setCompletedHackStreaks($values[27]);
            $stat->setLongestSojournerStreak($values[28]);
            $stat->setResonatorsDestroyed($values[29]);
            $stat->setPortalsNeutralized($values[30]);
            $stat->setEnemyLinksDestroyed($values[31]);
            $stat->setEnemyFieldsDestroyed($values[32]);
            $stat->setBattleBeaconCombatant($values[33]);
            $stat->setDronesReturned($values[34]);
            $stat->setMaxTimePortalHeld($values[35]);
            $stat->setMaxTimeLinkMaintained($values[36]);
            $stat->setMaxLinkLengthXDays($values[37]);
            $stat->setMaxTimeFieldHeld($values[38]);
            $stat->setLargestFieldMusXDays($values[39]);
            $stat->setForcedDroneRecalls($values[40]);
            $stat->setDistanceWalked($values[41]);
            $stat->setKineticCapsulesCompleted($values[42]);
            $stat->setUniqueMissionsCompleted($values[43]);
            $stat->setMissionDaysAttended($values[44]);
            $stat->setNL1331MeetupsAttended($values[45]);
            $stat->setFirstSaturdayEvents($values[46]);
            $stat->setAgentsRecruited($values[47]);
            $stat->setRecursions($values[48]);
            $stat->setMonthsSubscribed($values[49]);
        }
        else if ($countValues == 14) {
            $stat->setLinksActive($values[8]);
            $stat->setPortalsOwned($values[9]);
            $stat->setControlFieldsActive($values[10]);
            $stat->setMindUnitControl($values[11]);
            $stat->setCurrentHackstreak($values[12]);
            $stat->setCurrentSojournerStreak($values[13]);
        }
        $this->getEntityManager()->persist($stat);
        $this->getEntityManager()->flush();

    }
    
    //Función que devuelve un array de todos los comparadores del tipo Stat disponibles.
    public function getComparadores() {
        $array = explode("\t", $this->statsStructure);
        return $array;
    }

    //Función privada que formatea un string de un comparador para usarse en SQL, en minúscula y con _ en vez de espacios.
    public function formatComparador($text) {
        return lcfirst(str_replace(" ", "", (str_replace("(", "", (str_replace(")", "", (str_replace("-", "", $text))))))));
    }
}


