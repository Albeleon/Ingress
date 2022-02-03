<?php
namespace App\Entity;
use App\Repository\EventRepository;
use App\Entity\StatsEvent;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

//Clase entidad del Evento.
/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 * @ORM\Table(name="events") 
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_event")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\Column(type="string", name="name_event", unique="true", length="100") */
    private $name;

    /** @ORM\Column(type="string", name="alias_event", length="100") */
    private $aliasName;

    /** @ORM\Column(type="string", name="descrip_event", length="250", nullable="true") */
    private $description;

    /** @ORM\Column(type="datetime", name="date_event") */
    private $date;

    /** @ORM\Column(type="string", name="place_event", length="250") */
    private $place;

    /** @ORM\OneToMany(targetEntity="StatsEvent", mappedBy="event") */
    private $statsEvents;


    // Se inicializan los ArrayCollection de las asociaciones de OneToMany que tenemos
    public function __construct(){
        $this->statsEvents = new ArrayCollection();
    }

    // Getter del ID 
    public function getId()
    {
        return $this->id;
    }

    // Getter del nombre de alias 
    public function getNombreAlias()
    {
        return $this->name;
    }

    // Setter del nombre de alias 
    /**
     * @return  self
     */
    public function setNombreAlias($aliasName)
    {
        $this->aliasName = $aliasName;
        return $this;
    }

    // Getter del nombre 
    public function getNombre()
    {
        return $this->name;
    }

    // Setter del nombre 
    /**
     * @return  self
     */
    public function setNombre($name)
    {
        $this->name = $name;
        return $this;
    }

    // Getter de la descripción
    public function getDescripcion()
    {
        return $this->description;
    }

    // Setter de la descripción
    /**
     * @return  self
     */ 
    public function setDescripcion($description)
    {
        $this->description = $description;
        return $this;
    }

    // Getter de la fecha
    public function getFecha()
    {
        return $this->date->format('Y-m-d');
    }

    // Setter de la fecha
    /**
     * @return  self
     */ 
    public function setFecha($date)
    {
        $this->fechaCreacion = $fechaCreacion;
        return $this;
    }

    // Getter del lugar
    public function getLugar()
    {
        return $this->place;
    }

    // Setter del lugar
    /**
     * @return  self
     */ 
    public function setLugar($place)
    {
        $this->place = $place;
        return $this;
    }

    // Getter de los statsEvents 
    public function getStatsEvents()
    {
        return $this->statsEvents;
    }

    // Añadir a statsEvents
    /**
     * @return  self
     */ 
    public function addStatsEvents(Upload $statsEvent): self
    {
        if (!$this->statsEvents->contains($statsEvent)) {
            $this->statsEvents[] = $statsEvent;
            $statsEvent->setAgente($this);
        }
        return $this;
    }

}