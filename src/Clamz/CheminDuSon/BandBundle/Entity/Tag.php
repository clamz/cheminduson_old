<?php

namespace Clamz\CheminDuSon\BandBundle\Entity;

use Clamz\CheminDuSon\SiteBundle\Entity\BaseEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clamz\CheminDuSon\BandBundle\Entity\Tag
 *
 * @ORM\Table(name="cds_band_tag")
 * @ORM\Entity(repositoryClass="Clamz\CheminDuSon\BandBundle\Entity\TagRepository")
 */
class Tag extends BaseEntity
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
     * @return Tag
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
}