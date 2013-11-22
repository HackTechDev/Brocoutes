<?php

namespace Brocoutes\BrocanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Brocoutes\BrocanteBundle\Utils\Brocante as Brocante;

/**
 * Manifestation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Brocoutes\BrocanteBundle\Entity\ManifestationRepository")
 */
class Manifestation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;


    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=255)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=255)
     */
    private $longitude;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Manifestation
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return Manifestation
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    
        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }








    /**
     * Set latitude
     *
     * @param string $latitude
     * @return Manifestation
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    
        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return Manifestation
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    
        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
























    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Manifestation
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }








    public function getNomSlug()
    {
        return Brocante::slugify($this->getNom());
    }
 
    public function getLieuSlug()
    {
        return Brocante::slugify($this->getLieu());
    }
}
