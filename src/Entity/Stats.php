<?php
namespace App\Entity;
use App\Repository\StatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

//Clase entidad de las estadísticas.
/**
 * @ORM\Entity(repositoryClass=StatsRepository::class)
 * @ORM\Table(name="stats") 
 */
class Stats
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_stats")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Upload", inversedBy="stats")
     * @ORM\JoinColumn(name="id_upload", referencedColumnName="id_upload")
     */
    private $upload;

    /**
     * @ORM\ManyToOne(targetEntity="Agent", inversedBy="stats")
     * @ORM\JoinColumn(name="id_agent", referencedColumnName="id_agent")
     */
    private $agent;

    /** @ORM\Column(type="integer", name="level") */
    private $level;

    /** @ORM\Column(type="integer", name="lifetime_ap") */
    private $lifetimeAP;

    /** @ORM\Column(type="integer", name="current_ap") */
    private $currentAP;

    /** @ORM\Column(type="integer", name="unique_portals_visited", nullable="true") */
    private $uniquePortalsVisited;

    /** @ORM\Column(type="integer", name="unique_portals_drone_visited", nullable="true") */
    private $uniquePortalsDroneVisited;

    /** @ORM\Column(type="integer", name="furthest_drone_distance", nullable="true") */
    private $furthestDroneDistance;

    /** @ORM\Column(type="integer", name="seer", nullable="true") */
    private $seer;

    /** @ORM\Column(type="integer", name="portals_discovered", nullable="true") */
    private $portalsDiscovered;

    /** @ORM\Column(type="integer", name="xm_collected", nullable="true") */
    private $xMCollected;

    /** @ORM\Column(type="integer", name="opr_agreements", nullable="true") */
    private $oPRAgreements;

    /** @ORM\Column(type="integer", name="portal_scans_uploaded", nullable="true") */
    private $portalScansUploaded;

    /** @ORM\Column(type="integer", name="uniques_scout_controlled", nullable="true") */
    private $uniquesScoutControlled;

    /** @ORM\Column(type="integer", name="resonators_deployed", nullable="true") */
    private $resonatorsDeployed;

    /** @ORM\Column(type="integer", name="links_created", nullable="true") */
    private $linksCreated;

    /** @ORM\Column(type="integer", name="control_fields_created", nullable="true") */
    private $controlFieldsCreated;

    /** @ORM\Column(type="integer", name="mind_units_captured", nullable="true") */
    private $mindUnitsCaptured;

    /** @ORM\Column(type="integer", name="longest_link_ever_created", nullable="true") */
    private $longestLinkEverCreated;

    /** @ORM\Column(type="integer", name="largest_control_field", nullable="true") */
    private $largestControlField;

    /** @ORM\Column(type="integer", name="xm_recharged", nullable="true") */
    private $xMRecharged;

    /** @ORM\Column(type="integer", name="portals_captured", nullable="true") */
    private $portalsCaptured;

    /** @ORM\Column(type="integer", name="unique_portals_captured", nullable="true") */
    private $uniquePortalsCaptured;

    /** @ORM\Column(type="integer", name="mods_deployed", nullable="true") */
    private $modsDeployed;

    /** @ORM\Column(type="integer", name="hacks", nullable="true") */
    private $hacks;

    /** @ORM\Column(type="integer", name="drone_hacks", nullable="true") */
    private $droneHacks;

    /** @ORM\Column(type="integer", name="glyph_hack_points", nullable="true") */
    private $glyphHackPoints;

    /** @ORM\Column(type="integer", name="completed_hackstreaks", nullable="true") */
    private $completedHackstreaks;

    /** @ORM\Column(type="integer", name="longest_sojourner_streak", nullable="true") */
    private $longestSojournerStreak;

    /** @ORM\Column(type="integer", name="resonators_destroyed", nullable="true") */
    private $resonatorsDestroyed;

    /** @ORM\Column(type="integer", name="portals_neutralized", nullable="true") */
    private $portalsNeutralized;

    /** @ORM\Column(type="integer", name="enemy_links_destroyed", nullable="true") */
    private $enemyLinksDestroyed;

    /** @ORM\Column(type="integer", name="enemy_fields_destroyed", nullable="true") */
    private $enemyFieldsDestroyed;

    /** @ORM\Column(type="integer", name="battle_beacon_combatant", nullable="true") */
    private $battleBeaconCombatant;

    /** @ORM\Column(type="integer", name="drones_returned", nullable="true") */
    private $dronesReturned;

    /** @ORM\Column(type="integer", name="max_time_portal_held", nullable="true") */
    private $maxTimePortalHeld;

    /** @ORM\Column(type="integer", name="max_time_link_maintained", nullable="true") */
    private $maxTimeLinkMaintained;

    /** @ORM\Column(type="integer", name="max_link_length_x_days", nullable="true") */
    private $maxLinkLengthxDays;

    /** @ORM\Column(type="integer", name="max_time_field_held", nullable="true") */
    private $maxTimeFieldHeld;

    /** @ORM\Column(type="integer", name="largest_field_mus_x_days", nullable="true") */
    private $largestFieldMUsxDays ;

    /** @ORM\Column(type="integer", name="forced_drone_recalls", nullable="true") */
    private $forcedDroneRecalls;

    /** @ORM\Column(type="integer", name="distance_walked", nullable="true") */
    private $distanceWalked;

    /** @ORM\Column(type="integer", name="kinetic_capsules_completed", nullable="true") */
    private $kineticCapsulesCompleted;

    /** @ORM\Column(type="integer", name="unique_missions_completed", nullable="true") */
    private $uniqueMissionsCompleted;

    /** @ORM\Column(type="integer", name="`mission_day(s)_attended`", nullable="true") */
    private $missionDaysAttended;

    /** @ORM\Column(type="integer", name="`nl-1331_meetup(s)_attended`", nullable="true") */
    private $nL1331MeetupsAttended ;

    /** @ORM\Column(type="integer", name="first_saturday_events", nullable="true") */
    private $firstSaturdayEvents;

    /** @ORM\Column(type="integer", name="agents_recruited", nullable="true") */
    private $agentsRecruited;

    /** @ORM\Column(type="integer", name="recursions", nullable="true") */
    private $recursions;

    /** @ORM\Column(type="integer", name="months_subscribed", nullable="true") */
    private $monthsSubscribed;

    /** @ORM\Column(type="integer", name="links_active", nullable="true") */
    private $linksActive;

    /** @ORM\Column(type="integer", name="portals_owned", nullable="true") */
    private $portalsOwned;

    /** @ORM\Column(type="integer", name="control_fields_active", nullable="true") */
    private $controlFieldsActive;

    /** @ORM\Column(type="integer", name="mind_unit_control", nullable="true") */
    private $mindUnitControl;

    /** @ORM\Column(type="integer", name="current_hackstreak", nullable="true") */
    private $currentHackstreak;

    /** @ORM\Column(type="integer", name="current_sojourner_streak", nullable="true") */
    private $currentSojournerStreak;

    // Getter del ID
    public function getId()
    {
        return $this->id;
    }

    // Getter de Upload
    public function getUpload()
    {
        return $this->upload;
    }

    // Setter de Upload
    /**
     * @return  self
     */ 
    public function setUpload($upload)
    {
        $this->upload = $upload;
        return $this;
    }

    // Getter de Agent
    public function getAgente()
    {
        return $this->agent;
    }

    // Setter de Agent
    /**
     * @return  self
     */ 
    public function setAgente($agent)
    {
        $this->agent = $agent;
        return $this;
    }

    // Getter de Level
    public function getLevel()
    {
        return $this->level;
    }

    // Setter de Level
    /**
     * @return  self
     */ 
    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    // Getter de lifetimeAP
    public function getlifetimeAp()
    {
        return $this->lifetimeAP;
    }

    // Setter de lifetimeAP
    /**
     * @return  self
     */ 
    public function setlifetimeAp($lifetimeAP)
    {
        $this->lifetimeAP = $lifetimeAP;
        return $this;
    }

    // Getter de currentAP
    public function getcurrentAp()
    {
        return $this->currentAP;
    }

    // Setter de currentAP
    /**
     * @return  self
     */ 
    public function setcurrentAp($currentAP)
    {
        $this->currentAP = $currentAP;
        return $this;
    }

    // Getter de UniquePortalsVisited
    public function getUniquePortalsVisited()
    {
        return $this->uniquePortalsVisited;
    }

    // Setter de UniquePortalsVisited
    /**
     * @return  self
     */ 
    public function setUniquePortalsVisited($uniquePortalsVisited)
    {
        $this->uniquePortalsVisited = $uniquePortalsVisited;
        return $this;
    }

    // Getter de UniquePortalsDroneVisited
    public function getUniquePortalsDroneVisited()
    {
        return $this->uniquePortalsDroneVisited;
    }

    // Setter de UniquePortalsDroneVisited
    /**
     * @return  self
     */ 
    public function setUniquePortalsDroneVisited($uniquePortalsDroneVisited)
    {
        $this->uniquePortalsDroneVisited = $uniquePortalsDroneVisited;
        return $this;
    }

    // Getter de FurthestDroneDistance
    public function getFurthestDroneDistance()
    {
        return $this->furthestDroneDistance;
    }

    // Setter de FurthestDroneDistance
    /**
     * @return  self
     */ 
    public function setFurthestDroneDistance($furthestDroneDistance)
    {
        $this->furthestDroneDistance = $furthestDroneDistance;
        return $this;
    }

    // Getter de Seer
    public function getSeer()
    {
        return $this->seer;
    }

    // Setter de Seer
    /**
     * @return  self
     */ 
    public function setSeer($seer)
    {
        $this->seer = $seer;
        return $this;
    }

    // Getter de PortalsDiscovered
    public function getPortalsDiscovered()
    {
        return $this->portalsDiscovered;
    }

    // Setter de PortalsDiscovered
    /**
     * @return  self
     */ 
    public function setPortalsDiscovered($portalsDiscovered)
    {
        $this->portalsDiscovered = $portalsDiscovered;
        return $this;
    }

    // Getter de xMCollected
    public function getXmCollected()
    {
        return $this->xMCollected;
    }

    // Setter de xMCollected
    /**
     * @return  self
     */ 
    public function setXmCollected($xMCollected)
    {
        $this->xMCollected = $xMCollected;
        return $this;
    }

    // Getter de OprAgreements
    public function getOprAgreements()
    {
        return $this->oPRAgreements;
    }

    // Setter de OprAgreements
    /**
     * @return  self
     */ 
    public function setOprAgreements($oPRAgreements)
    {
        $this->oPRAgreements = $oPRAgreements;
        return $this;
    }

    // Getter de PortalScansUploaded
    public function getPortalScansUploaded()
    {
        return $this->portalScansUploaded;
    }

    // Setter de PortalScansUploaded
    /**
     * @return  self
     */ 
    public function setPortalScansUploaded($portalScansUploaded)
    {
        $this->portalScansUploaded = $portalScansUploaded;
        return $this;
    }

    // Getter de UniquesScoutControlled
    public function getUniquesScoutControlled()
    {
        return $this->uniquesScoutControlled;
    }

    // Setter de UniquesScoutControlled
    /**
     * @return  self
     */ 
    public function setUniquesScoutControlled($uniquesScoutControlled)
    {
        $this->uniquesScoutControlled = $uniquesScoutControlled;
        return $this;
    }

    // Getter de ResonatorsDeployed
    public function getResonatorsDeployed()
    {
        return $this->resonatorsDeployed;
    }

    // Setter de ResonatorsDeployed
    /**
     * @return  self
     */ 
    public function setResonatorsDeployed($resonatorsDeployed)
    {
        $this->resonatorsDeployed = $resonatorsDeployed;
        return $this;
    }

    // Getter de LinksCreated
    public function getLinksCreated()
    {
        return $this->linksCreated;
    }

    // Setter de LinksCreated
    /**
     * @return  self
     */ 
    public function setLinksCreated($linksCreated)
    {
        $this->linksCreated = $linksCreated;
        return $this;
    }

    // Getter de ControlFieldsCreated
    public function getControlFieldsCreated()
    {
        return $this->controlFieldsCreated;
    }

    // Setter de ControlFieldsCreated
    /**
     * @return  self
     */ 
    public function setControlFieldsCreated($controlFieldsCreated)
    {
        $this->controlFieldsCreated = $controlFieldsCreated;
        return $this;
    }

    // Getter de MindUnitsCaptured
    public function getMindUnitsCaptured()
    {
        return $this->mindUnitsCaptured;
    }

    // Setter de MindUnitsCaptured
    /**
     * @return  self
     */ 
    public function setMindUnitsCaptured($mindUnitsCaptured)
    {
        $this->mindUnitsCaptured = $mindUnitsCaptured;
        return $this;
    }

    // Getter de LongestLinkEverCreated
    public function getLongestLinkEverCreated()
    {
        return $this->longestLinkEverCreated;
    }

    // Setter de LongestLinkEverCreated
    /**
     * @return  self
     */ 
    public function setLongestLinkEverCreated($longestLinkEverCreated)
    {
        $this->longestLinkEverCreated = $longestLinkEverCreated;
        return $this;
    }

    // Getter de LargestControlField
    public function getLargestControlField()
    {
        return $this->largestControlField;
    }

    // Setter de LargestControlField
    /**
     * @return  self
     */ 
    public function setLargestControlField($largestControlField)
    {
        $this->largestControlField = $largestControlField;
        return $this;
    }

    // Getter de XmRecharged
    public function getXmRecharged()
    {
        return $this->xMRecharged;
    }

    // Setter de XmRecharged
    /**
     * @return  self
     */ 
    public function setXmRecharged($xMRecharged)
    {
        $this->xMRecharged = $xMRecharged;
        return $this;
    }

    // Getter de PortalsCaptured
    public function getPortalsCaptured()
    {
        return $this->portalsCaptured;
    }

    // Setter de PortalsCaptured
    /**
     * @return  self
     */ 
    public function setPortalsCaptured($portalsCaptured)
    {
        $this->portalsCaptured = $portalsCaptured;
        return $this;
    }

    // Getter de UniquePortalsCaptured
    public function getUniquePortalsCaptured()
    {
        return $this->uniquePortalsCaptured;
    }

    // Setter de IUniquePortalsCapturedD
    /**
     * @return  self
     */ 
    public function setUniquePortalsCaptured($uniquePortalsCaptured)
    {
        $this->uniquePortalsCaptured = $uniquePortalsCaptured;
        return $this;
    }

    // Getter de ModsDeployed
    public function getModsDeployed()
    {
        return $this->modsDeployed;
    }

    // Setter de ModsDeployed
    /**
     * @return  self
     */ 
    public function setModsDeployed($modsDeployed)
    {
        $this->modsDeployed = $modsDeployed;
        return $this;
    }

    // Getter de Hacks
    public function getHacks()
    {
        return $this->hacks;
    }

    // Setter de Hacks
    /**
     * @return  self
     */ 
    public function setHacks($hacks)
    {
        $this->hacks = $hacks;
        return $this;
    }

    // Getter de DroneHacks
    public function getDroneHacks()
    {
        return $this->droneHacks;
    }

    // Setter de DroneHacks
    /**
     * @return  self
     */ 
    public function setDroneHacks($droneHacks)
    {
        $this->droneHacks = $droneHacks;
        return $this;
    }

    // Getter de GlyphHackPoints
    public function getGlyphHackPoints()
    {
        return $this->glyphHackPoints;
    }

    // Setter de GlyphHackPoints
    /**
     * @return  self
     */ 
    public function setGlyphHackPoints($glyphHackPoints)
    {
        $this->glyphHackPoints = $glyphHackPoints;
        return $this;
    }

    // Getter de CompletedHackStreaks
    public function getCompletedHackStreaks()
    {
        return $this->completedHackstreaks;
    }

    // Setter de CompletedHackStreaks
    /**
     * @return  self
     */ 
    public function setCompletedHackStreaks($completedHackstreaks)
    {
        $this->completedHackstreaks = $completedHackstreaks;
        return $this;
    }

    // Getter de LongestSojournerStreak
    public function getLongestSojournerStreak()
    {
        return $this->longestSojournerStreak;
    }

    // Setter de LongestSojournerStreak
    /**
     * @return  self
     */ 
    public function setLongestSojournerStreak($longestSojournerStreak)
    {
        $this->longestSojournerStreak = $longestSojournerStreak;
        return $this;
    }

    // Getter de ResonatorsDestroyed
    public function getResonatorsDestroyed()
    {
        return $this->resonatorsDestroyed;
    }

    // Setter de ResonatorsDestroyed
    /**
     * @return  self
     */ 
    public function setResonatorsDestroyed($resonatorsDestroyed)
    {
        $this->resonatorsDestroyed = $resonatorsDestroyed;
        return $this;
    }

    // Getter de PortalsNeutralized
    public function getPortalsNeutralized()
    {
        return $this->portalsNeutralized;
    }

    // Setter de PortalsNeutralized
    /**
     * @return  self
     */ 
    public function setPortalsNeutralized($portalsNeutralized)
    {
        $this->portalsNeutralized = $portalsNeutralized;
        return $this;
    }

    // Getter de EnemyLinksDestroyed
    public function getEnemyLinksDestroyed()
    {
        return $this->enemyLinksDestroyed;
    }

    // Setter de EnemyLinksDestroyed
    /**
     * @return  self
     */ 
    public function setEnemyLinksDestroyed($enemyLinksDestroyed)
    {
        $this->enemyLinksDestroyed = $enemyLinksDestroyed;
        return $this;
    }

    // Getter de EnemyFieldsDestroyed
    public function getEnemyFieldsDestroyed()
    {
        return $this->enemyFieldsDestroyed;
    }

    // Setter de EnemyFieldsDestroyed
    /**
     * @return  self
     */ 
    public function setEnemyFieldsDestroyed($enemyFieldsDestroyed)
    {
        $this->enemyFieldsDestroyed = $enemyFieldsDestroyed;
        return $this;
    }

    // Getter de BattleBeaconCombatant
    public function getBattleBeaconCombatant()
    {
        return $this->battleBeaconCombatant;
    }

    // Setter de BattleBeaconCombatant
    /**
     * @return  self
     */ 
    public function setBattleBeaconCombatant($battleBeaconCombatant)
    {
        $this->battleBeaconCombatant = $battleBeaconCombatant;
        return $this;
    }

    // Getter de DronesReturned
    public function getDronesReturned()
    {
        return $this->dronesReturned;
    }

    // Setter de DronesReturned
    /**
     * @return  self
     */ 
    public function setDronesReturned($dronesReturned)
    {
        $this->dronesReturned = $dronesReturned;
        return $this;
    }

    // Getter de MaxTimePortalHeld
    public function getMaxTimePortalHeld()
    {
        return $this->maxTimePortalHeld;
    }

    // Setter de MaxTimePortalHeld
    /**
     * @return  self
     */ 
    public function setMaxTimePortalHeld($maxTimePortalHeld)
    {
        $this->maxTimePortalHeld = $maxTimePortalHeld;
        return $this;
    }

    // Getter de MaxTimeLinkMaintained
    public function getMaxTimeLinkMaintained()
    {
        return $this->maxTimeLinkMaintained;
    }

    // Setter de MaxTimeLinkMaintained
    /**
     * @return  self
     */ 
    public function setMaxTimeLinkMaintained($maxTimeLinkMaintained)
    {
        $this->maxTimeLinkMaintained = $maxTimeLinkMaintained;
        return $this;
    }

    // Getter de MaxLinkLengthXDays
    public function getMaxLinkLengthXDays()
    {
        return $this->maxLinkLengthxDays;
    }

    // Setter de MaxLinkLengthXDays
    /**
     * @return  self
     */ 
    public function setMaxLinkLengthXDays($maxLinkLengthxDays)
    {
        $this->maxLinkLengthxDays = $maxLinkLengthxDays;
        return $this;
    }

    // Getter de MaxTimeFieldHeld
    public function getMaxTimeFieldHeld()
    {
        return $this->maxTimeFieldHeld;
    }

    // Setter de MaxTimeFieldHeld
    /**
     * @return  self
     */ 
    public function setMaxTimeFieldHeld($maxTimeFieldHeld)
    {
        $this->maxTimeFieldHeld = $maxTimeFieldHeld;
        return $this;
    }

    // Getter de LargestFieldMusXDays
    public function getLargestFieldMusXDays()
    {
        return $this->largestFieldMUsxDays ;
    }

    // Setter de LargestFieldMusXDays
    /**
     * @return  self
     */ 
    public function setLargestFieldMusXDays($largestFieldMUsxDays )
    {
        $this->largestFieldMUsxDays  = $largestFieldMUsxDays ;
        return $this;
    }

    // Getter de ForcedDroneRecalls
    public function getForcedDroneRecalls()
    {
        return $this->forcedDroneRecalls;
    }

    // Setter de ForcedDroneRecalls
    /**
     * @return  self
     */ 
    public function setForcedDroneRecalls($forcedDroneRecalls)
    {
        $this->forcedDroneRecalls = $forcedDroneRecalls;
        return $this;
    }

    // Getter de DistanceWalked
    public function getDistanceWalked()
    {
        return $this->distanceWalked;
    }

    // Setter de DistanceWalked
    /**
     * @return  self
     */ 
    public function setDistanceWalked($distanceWalked)
    {
        $this->distanceWalked = $distanceWalked;
        return $this;
    }

    // Getter de KineticCapsulesCompleted
    public function getKineticCapsulesCompleted()
    {
        return $this->kineticCapsulesCompleted;
    }

    // Setter de KineticCapsulesCompleted
    /**
     * @return  self
     */ 
    public function setKineticCapsulesCompleted($kineticCapsulesCompleted)
    {
        $this->kineticCapsulesCompleted = $kineticCapsulesCompleted;
        return $this;
    }

    // Getter de UniqueMissionsCompleted
    public function getUniqueMissionsCompleted()
    {
        return $this->uniqueMissionsCompleted;
    }

    // Setter de UniqueMissionsCompleted
    /**
     * @return  self
     */ 
    public function setUniqueMissionsCompleted($uniqueMissionsCompleted)
    {
        $this->uniqueMissionsCompleted = $uniqueMissionsCompleted;
        return $this;
    }

    // Getter de MissionDaysAttended
    public function getMissionDaysAttended()
    {
        return $this->missionDaysAttended;
    }

    // Setter de MissionDaysAttended
    /**
     * @return  self
     */ 
    public function setMissionDaysAttended($missionDaysAttended)
    {
        $this->missionDaysAttended = $missionDaysAttended;
        return $this;
    }

    // Getter de NL1331MeetupsAttended
    public function getNL1331MeetupsAttended()
    {
        return $this->nL1331MeetupsAttended ;
    }

    // Setter de NL1331MeetupsAttended
    /**
     * @return  self
     */ 
    public function setNL1331MeetupsAttended($nL1331MeetupsAttended )
    {
        $this->nL1331MeetupsAttended  = $nL1331MeetupsAttended ;
        return $this;
    }

    // Getter de FirstSaturdayEvents
    public function getFirstSaturdayEvents()
    {
        return $this->firstSaturdayEvents;
    }

    // Setter de FirstSaturdayEvents
    /**
     * @return  self
     */ 
    public function setFirstSaturdayEvents($firstSaturdayEvents)
    {
        $this->firstSaturdayEvents = $firstSaturdayEvents;
        return $this;
    }

    // Getter de AgentsRecruited
    public function getAgentsRecruited()
    {
        return $this->agentsRecruited;
    }

    // Setter de AgentsRecruited
    /**
     * @return  self
     */ 
    public function setAgentsRecruited($agentsRecruited)
    {
        $this->agentsRecruited = $agentsRecruited;
        return $this;
    }

    // Getter de Recursions
    public function getRecursions()
    {
        return $this->recursions;
    }

    // Setter de Recursions
    /**
     * @return  self
     */ 
    public function setRecursions($recursions)
    {
        $this->recursions = $recursions;
        return $this;
    }

    // Getter de MonthsSubscribed
    public function getMonthsSubscribed()
    {
        return $this->monthsSubscribed;
    }

    // Setter de MonthsSubscribed
    /**
     * @return  self
     */ 
    public function setMonthsSubscribed($monthsSubscribed)
    {
        $this->monthsSubscribed = $monthsSubscribed;
        return $this;
    }

    // Getter de LinksActive
    public function getLinksActive()
    {
        return $this->linksActive;
    }

    // Setter de LinksActive
    /**
     * @return  self
     */ 
    public function setLinksActive($linksActive)
    {
        $this->linksActive = $linksActive;
        return $this;
    }

    // Getter de PortalsOwned
    public function getPortalsOwned()
    {
        return $this->portalsOwned;
    }

    // Setter de PortalsOwned
    /**
     * @return  self
     */ 
    public function setPortalsOwned($portalsOwned)
    {
        $this->portalsOwned = $portalsOwned;
        return $this;
    }

    // Getter de ControlFieldsActive
    public function getControlFieldsActive()
    {
        return $this->controlFieldsActive;
    }

    // Setter de ControlFieldsActive
    /**
     * @return  self
     */ 
    public function setControlFieldsActive($controlFieldsActive)
    {
        $this->controlFieldsActive = $controlFieldsActive;
        return $this;
    }

    // Getter de MindUnitControl
    public function getMindUnitControl()
    {
        return $this->mindUnitControl;
    }

    // Setter de MindUnitControl
    /**
     * @return  self
     */ 
    public function setMindUnitControl($mindUnitControl)
    {
        $this->mindUnitControl = $mindUnitControl;
        return $this;
    }

    // Getter de CurrentHackstreak
    public function getCurrentHackstreak()
    {
        return $this->currentHackstreak;
    }

    // Setter de CurrentHackstreak
    /**
     * @return  self
     */ 
    public function setCurrentHackstreak($currentHackstreak)
    {
        $this->currentHackstreak = $currentHackstreak;
        return $this;
    }

    // Getter de CurrentSojournerStreak
    public function getCurrentSojournerStreak()
    {
        return $this->currentSojournerStreak;
    }

    // Setter de CurrentSojournerStreak
    /**
     * @return  self
     */ 
    public function setCurrentSojournerStreak($titulo)
    {
        $this->currentSojournerStreak = $currentSojournerStreak;
        return $this;
    }

}