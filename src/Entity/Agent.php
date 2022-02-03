<?php
namespace App\Entity;
use App\Repository\AgentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

//Clase entidad del Agente.
/**
 * @ORM\Entity(repositoryClass=AgentRepository::class)
 * @ORM\Table(name="agent") 
 */
class Agent
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_agent")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\Column(type="string", name="agent_name", unique="true", length="100") */
    private $name;

    /** @ORM\Column(type="string", name="`password`", length="64") */
    private $password;

    /** @ORM\Column(type="string", name="faction", length="100") */
    private $faction;

    /** @ORM\OneToMany(targetEntity="Upload", mappedBy="agent") */
    private $uploads;

    /** @ORM\OneToMany(targetEntity="Stats", mappedBy="agent") */
    private $stats;

    /** @ORM\OneToMany(targetEntity="StatsEvent", mappedBy="agent") */
    private $statsEvents;

    
    // Se inicializan los ArrayCollection de las asociaciones de OneToMany que tenemos
    public function __construct(){
        $this->uploads = new ArrayCollection();
        $this->stats = new ArrayCollection();
        $this->statsEvents = new ArrayCollection();
    }

    // Getter del ID 
    public function getId()
    {
        return $this->id;
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

    // Getter de la contraseña 
    public function getContraseña()
    {
        return $this->password;
    }

    // Setter de la contraseña 
    /**
     * @return  self
     */
    public function setContraseña($password)
    {
        $this->password = $password;

        return $this;
    }

    // Getter de la facción 
    public function getFaccion()
    {
        return $this->faction;
    }

    // Setter de la facción 
    /**
     * @return  self
     */
    public function setFaccion($faction)
    {
        $this->faction = $faction;

        return $this;
    }
    
    // Getter de los uploads 
    public function getUploads()
    {
        return $this->uploads;
    }

    // Añadir a uploads
    /**
     * @return  self
     */ 
    public function addUploads(Upload $upload): self
    {
        if (!$this->uploads->contains($upload)) {
            $this->uploads[] = $upload;
            $upload->setAgente($this);
        }
        return $this;
    }
    
    // Getter de los stats 
    public function getStats()
    {
        return $this->stats;
    }

    // Añadir a stats
    /**
     * @return  self
     */ 
    public function addStats(Upload $stats): self
    {
        if (!$this->stats->contains($stats)) {
            $this->stats[] = $stats;
            $stats->setAgente($this);
        }
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