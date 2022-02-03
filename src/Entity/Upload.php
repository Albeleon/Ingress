<?php
namespace App\Entity;
use App\Repository\UploadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

//Clase entidad de un Upload.
/**
 * @ORM\Entity(repositoryClass=UploadRepository::class)
 * @ORM\Table(name="uploads") 
 */
class Upload
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_upload")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\Column(type="date", name="date") */
    private $date;

    /** @ORM\Column(type="time", name="time") */
    private $time;

    /**
     * @ORM\ManyToOne(targetEntity="Agent", inversedBy="uploads")
     * @ORM\JoinColumn(name="id_agent", referencedColumnName="id_agent")
     */
    private $agent;

    /**
     * @ORM\ManyToOne(targetEntity="Span", inversedBy="uploads")
     * @ORM\JoinColumn(name="time_span", referencedColumnName="id_span")
     */
    private $timeSpan;
    
    /** @ORM\Column(type="integer", name="id_event", type="boolean") */
    private $event;

    /**
     * @ORM\OneToOne(targetEntity="Stats", mappedBy="upload")
     * @ORM\JoinColumn(name="id_upload", referencedColumnName="id_upload")
     */
    private $stats;

    /**
     * @ORM\OneToOne(targetEntity="StatsEvent", mappedBy="upload")
     * @ORM\JoinColumn(name="id_upload", referencedColumnName="id_upload")
     */
    private $statsEvent;

    // Getter del ID
    public function getId()
    {
        return $this->id_upload;
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
        $this->date = $date;
        return $this;
    }

    // Getter de la hora
    public function getHora()
    {
        return $this->time->format('H:i:s');
    }

    // Setter de la hora
    /**
     * @return  self
     */ 
    public function setHora($time)
    {
        $this->time = $time;
        return $this;
    }

    // Getter del agente
    public function getAgente()
    {
        return $this->agent;
    }

    // Setter del agente
    /**
     * @return  self
     */ 
    public function setAgente($agent)
    {
        $this->agent = $agent;
        return $this;
    }

    // Getter del time span
    public function getTimeSpan()
    {
        return $this->timeSpan;
    }

    // Setter del time span
    /**
     * @return  self
     */ 
    public function setTimeSpan($timeSpan)
    {
        $this->timeSpan = $timeSpan;
        return $this;
    }

    // Getter del evento
    public function getEvento()
    {
        return $this->event;
    }

    // Setter del evento
    /**
     * @return  self
     */ 
    public function setEvento($event)
    {
        $this->event = $event;
        return $this;
    }

    // Getter de los stats 
    public function getStats()
    {
        return $this->stats;
    }

    // Setter del evento
    /**
     * @return  self
     */ 
    public function setStats($stats)
    {
        $this->stats = $stats;
        return $this;
    }
    
    // Getter de los statsEvents 
    public function getStatsEvents()
    {
        return $this->statsEvents;
    }

    // Setter del statsEvent
    /**
     * @return  self
     */ 
    public function setStatsEvent($statsEvent)
    {
        $this->statsEvent = $statsEvent;
        return $this;
    }

}