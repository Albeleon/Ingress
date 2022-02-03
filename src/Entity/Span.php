<?php
namespace App\Entity;
use App\Repository\SpanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

//Clase entidad del Time Span.
/**
 * @ORM\Entity(repositoryClass=SpanRepository::class)
 * @ORM\Table(name="span") 
 */
class Span
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_span")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\Column(type="string", name="time_span", unique="true", length="100") */
    private $time;

    /** @ORM\OneToMany(targetEntity="Upload", mappedBy="timeSpan") */
    private $uploads;


    // Se inicializan los ArrayCollection de las asociaciones de OneToMany que tenemos
    public function __construct(){
        $this->uploads = new ArrayCollection();
    }

    // Getter del ID
    public function getId()
    {
        return $this->id;
    }

    // Getter de la hora 
    public function getHora()
    {
        return $this->time;
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

}