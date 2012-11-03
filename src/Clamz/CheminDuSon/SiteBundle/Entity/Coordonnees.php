<?php

namespace Clamz\CheminDuSon\SiteBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Clamz\CheminDuSon\SiteBundle\Entity\Coordonnees
 *
 * @ORM\Entity(repositoryClass="Clamz\CheminDuSon\SiteBundle\Entity\CoordonneesRepository")
 * @ORM\Table(name="cds_coordonnees") 
 */
class Coordonnees
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $adresse1
     *
     * @ORM\Column(name="adresse1", type="string", length=255)
     */
    private $adresse1;

    /**
     * @var string $adresse2
     *
     * @ORM\Column(name="adresse2", type="string", length=255)
     */
    private $adresse2;

    /**
     * @var string $telephone
     *
     * @ORM\Column(name="telephone", type="string", length=20)     * 
     * @Assert\Regex("/^0[0-68]([-.\s]?\d{2}){4}$/")
     */
    private $telephone;

    /**
     * @var string $ville
     *
     * @ORM\Column(name="ville", type="string", length=100)
     */
    private $ville;

    /**
     * @var integer $departement
     *
     * @ORM\Column(name="departement", type="smallint")
     */
    private $departement;

    /**
     * @var string $region
     *
     * @ORM\Column(name="region", type="string", length=100)
     */
    private $region;

    /**
     * @var string $zipcode
     *
     * @ORM\Column(name="zipcode", type="string", length=30)
     */
    private $zipcode;

    /**
     * @var string $pays
     *
     * @ORM\Column(name="pays", type="string", length=100)
     */
    private $pays;

    /**
     * @var boolean $isPrivate
     *
     * @ORM\Column(name="isPrivate", type="boolean")
     */
    private $isPrivate;


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
     * Set adresse1
     *
     * @param string $adresse1
     * @return Coordonnees
     */
    public function setAdresse1($adresse1)
    {
        $this->adresse1 = $adresse1;
    
        return $this;
    }

    /**
     * Get adresse1
     *
     * @return string 
     */
    public function getAdresse1()
    {
        return $this->adresse1;
    }

    /**
     * Set adresse2
     *
     * @param string $adresse2
     * @return Coordonnees
     */
    public function setAdresse2($adresse2)
    {
        $this->adresse2 = $adresse2;
    
        return $this;
    }

    /**
     * Get adresse2
     *
     * @return string 
     */
    public function getAdresse2()
    {
        return $this->adresse2;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Coordonnees
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    
        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Coordonnees
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set departement
     *
     * @param integer $departement
     * @return Coordonnees
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;
    
        return $this;
    }

    /**
     * Get departement
     *
     * @return integer 
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Coordonnees
     */
    public function setRegion($region)
    {
        $this->region = $region;
    
        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     * @return Coordonnees
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    
        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Coordonnees
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    
        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set isPrivate
     *
     * @param boolean $isPrivate
     * @return Coordonnees
     */
    public function setIsPrivate($isPrivate)
    {
        $this->isPrivate = $isPrivate;
    
        return $this;
    }

    /**
     * Get isPrivate
     *
     * @return boolean 
     */
    public function getIsPrivate()
    {
        return $this->isPrivate;
    }
}