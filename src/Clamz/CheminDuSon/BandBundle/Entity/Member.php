<?php

namespace Clamz\CheminDuSon\BandBundle\Entity;

use Clamz\CheminDuSon\SiteBundle\Entity\BaseEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clamz\CheminDuSon\BandBundle\Entity\BandMembers
 *
 * @ORM\Table(name="cds_band_member")
 * @ORM\Entity(repositoryClass="Clamz\CheminDuSon\BandBundle\Entity\BandMembersRepository")
 */
class Member extends BaseEntity
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string $firstname
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;


    
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
     * Set name
     *
     * @param string $name
     * @return BandMembers
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return BandMembers
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bands = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add bands
     *
     * @param Clamz\cheminDuSon\BandBundle\Entity\Band $bands
     * @return Member
     */
    public function addBand(\Clamz\cheminDuSon\BandBundle\Entity\Band $bands)
    {
        $this->bands[] = $bands;
    
        return $this;
    }

    /**
     * Remove bands
     *
     * @param Clamz\cheminDuSon\BandBundle\Entity\Band $bands
     */
    public function removeBand(\Clamz\cheminDuSon\BandBundle\Entity\Band $bands)
    {
        $this->bands->removeElement($bands);
    }

    /**
     * Get bands
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getBands()
    {
        return $this->bands;
    }
}