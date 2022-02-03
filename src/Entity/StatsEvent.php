<?php
namespace App\Entity;
use App\Repository\StatsEventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

//Clase entidad de las estadísticas de eventos.
/**
 * @ORM\Entity(repositoryClass=StatsEventRepository::class)
 * @ORM\Table(name="stats_events") 
 */
class StatsEvent
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_stats")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="statsEvents")
     * @ORM\JoinColumn(name="id_event", referencedColumnName="id_event")
     */
    private $event;

    /**
     * @ORM\OneToOne(targetEntity="Upload", inversedBy="statsEvent")
     * @ORM\JoinColumn(name="id_upload", referencedColumnName="id_upload")
     */
    private $upload;

    /**
     * @ORM\ManyToOne(targetEntity="Agent", inversedBy="statsEvents")
     * @ORM\JoinColumn(name="id_agent", referencedColumnName="id_agent")
     */
    private $agent;

    /** @ORM\Column(type="integer", name="lifetime_ap") */
    private $lifetimeAp;

    /** @ORM\Column(type="integer", name="unique_portals_visited", nullable="true") */
    private $uniquePortalsVisited;

    /** @ORM\Column(type="integer", name="resonators_deployed", nullable="true") */
    private $resonatorsDeployed;

    /** @ORM\Column(type="integer", name="links_created", nullable="true") */
    private $linksCreated;

    /** @ORM\Column(type="integer", name="control_fields_created", nullable="true") */
    private $controlFieldsCreated;

    /** @ORM\Column(type="integer", name="xm_recharged", nullable="true") */
    private $xmRecharged;

    /** @ORM\Column(type="integer", name="portals_captured", nullable="true") */
    private $portalsCaptured;

    /** @ORM\Column(type="integer", name="hacks", nullable="true") */
    private $hacks;

    /** @ORM\Column(type="integer", name="resonators_destroyed", nullable="true") */
    private $resonatorsDestroyed;

    // Getter del ID
    public function getId()
    {
        return $this->id;
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

    // Getter del upload
    public function getUpload()
    {
        return $this->upload;
    }

    // Setter del upload
    /**
     * @return  self
     */ 
    public function setUpload($upload)
    {
        $this->upload = $upload;
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

    // Getter del LifetimeAp
    public function getLifetimeAp()
    {
        return $this->lifetimeAp;
    }

    // Setter del LifetimeAp
    /**
     * @return  self
     */ 
    public function setLifetimeAp($lifetimeAp)
    {
        $this->lifetimeAp = $lifetimeAp;
        return $this;
    }

    // Getter del UniquePortalsVisited
    public function getUniquePortalsVisited()
    {
        return $this->uniquePortalsVisited;
    }

    // Setter del UniquePortalsVisited
    /**
     * @return  self
     */ 
    public function setUniquePortalsVisited($uniquePortalsVisited)
    {
        $this->uniquePortalsVisited = $uniquePortalsVisited;
        return $this;
    }

    // Getter del ResonatorsDeployed
    public function getResonatorsDeployed()
    {
        return $this->resonatorsDeployed;
    }

    // Setter del ResonatorsDeployed
    /**
     * @return  self
     */ 
    public function setResonatorsDeployed($resonatorsDeployed)
    {
        $this->resonatorsDeployed = $resonatorsDeployed;
        return $this;
    }

    // Getter del LinksCreated
    public function getLinksCreated()
    {
        return $this->linksCreated;
    }

    // Setter del LinksCreated
    /**
     * @return  self
     */ 
    public function setLinksCreated($linksCreated)
    {
        $this->linksCreated = $linksCreated;
        return $this;
    }

    // Getter del ControlFieldsCreated
    public function getControlFieldsCreated()
    {
        return $this->controlFieldsCreated;
    }

    // Setter del ControlFieldsCreated
    /**
     * @return  self
     */ 
    public function setControlFieldsCreated($controlFieldsCreated)
    {
        $this->controlFieldsCreated = $controlFieldsCreated;
        return $this;
    }

    // Getter del XmRecharged
    public function getXmRecharged()
    {
        return $this->xmRecharged;
    }

    // Setter del XmRecharged
    /**
     * @return  self
     */ 
    public function setXmRecharged($xmRecharged)
    {
        $this->xmRecharged = $xmRecharged;
        return $this;
    }

    // Getter del PortalsCaptured
    public function getPortalsCaptured()
    {
        return $this->portalsCaptured;
    }

    // Setter del PortalsCaptured
    /**
     * @return  self
     */ 
    public function setPortalsCaptured($portalsCaptured)
    {
        $this->portalsCaptured = $portalsCaptured;
        return $this;
    }

    // Getter del Hacks
    public function getHacks()
    {
        return $this->hacks;
    }

    // Setter del Hacks
    /**
     * @return  self
     */ 
    public function setHacks($hacks)
    {
        $this->hacks = $hacks;
        return $this;
    }

    // Getter del ResonatorsDestroyed
    public function getResonatorsDestroyed()
    {
        return $this->resonatorsDestroyed;
    }

    // Setter del ResonatorsDestroyed
    /**
     * @return  self
     */ 
    public function setResonatorsDestroyed($resonatorsDestroyed)
    {
        $this->resonatorsDestroyed = $resonatorsDestroyed;
        return $this;
    }

}