<?php
namespace Clamz\CheminDuSon\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Clamz\CheminDuSon\UserBundle\Entity\UserRepository")
 * @ORM\Table(name="cds_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Clamz\CheminDuSon\SiteBundle\Entity\Coordonnees")
     */
    protected $coordonneesPrincipales;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

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
     * Set coordonneesPrincipales
     *
     * @param Clamz\CheminDuSon\SiteBundle\Entity\Coordonnees $coordonneesPrincipales
     * @return User
     */
    public function setCoordonneesPrincipales(\Clamz\CheminDuSon\SiteBundle\Entity\Coordonnees $coordonneesPrincipales = null)
    {
        $this->coordonneesPrincipales = $coordonneesPrincipales;
    
        return $this;
    }

    /**
     * Get coordonneesPrincipales
     *
     * @return Clamz\CheminDuSon\SiteBundle\Entity\Coordonnees 
     */
    public function getCoordonneesPrincipales()
    {
        return $this->coordonneesPrincipales;
    }
    
    public function getExpiresAt(){
    	return $this->expiresAt;
    }
    
    public function setExpiresAt(\DateTime $date){
    	$this->expiresAt = $date;
    }
}