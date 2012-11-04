<?php

namespace Clamz\CheminDuSon\BandBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clamz\CheminDuSon\BandBundle\Entity\Category
 *
 * @ORM\Table(name="cds_band_category")
 * @ORM\Entity(repositoryClass="Clamz\CheminDuSon\BandBundle\Entity\CategoryRepository")
 */
class Category
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
	 * @var array bands
	 * @ORM\OneToMany(targetEntity="Band", mappedBy="category")
	 */
    private $bands;
    
    /**
     * @var int $parentCategory
     * @ORM\ManyToOne(targetEntity="Category")
     * 
     */
    private $parentCategory;
    
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
     * @return Category
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
     * @return Category
     */
    public function addBand(\Clamz\cheminDuSon\BandBundle\Entity\Band $bands)
    {
        $this->bands[] = $bands;
    	$bands->setCategory($this);
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
        $bands->setCategory(null);
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

    /**
     * Set parentCategory
     *
     * @param Clamz\cheminDuSon\BandBundle\Entity\Category $parentCategory
     * @return Category
     */
    public function setParentCategory(\Clamz\cheminDuSon\BandBundle\Entity\Category $parentCategory)
    {
        $this->parentCategory = $parentCategory;
    
        return $this;
    }

    /**
     * Get parentCategory
     *
     * @return Clamz\cheminDuSon\BandBundle\Entity\Category 
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }
}