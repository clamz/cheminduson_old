<?php

namespace Clamz\CheminDuSon\BandBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clamz\CheminDuSon\BandBundle\Entity\Band
 *
 * @ORM\Table(name="cds_band")
 * @ORM\Entity(repositoryClass="Clamz\CheminDuSon\BandBundle\Entity\BandRepository")
 */
class Band
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string $nationality
     *
     * @ORM\Column(name="nationality", type="string", length=100)
     */
    private $nationality;

    /**
     * @var string $image
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string $presentation
     *
     * @ORM\Column(name="presentation", type="text")
     */
    private $presentation;
    
    /**
     * @var int $category
     * @ORM\ManyToOne(targetEntity="Clamz\cheminDuSon\BandBundle\Entity\Category", inversedBy="bands")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * var int $tags
     * @ORM\ManyToMany(targetEntity="Clamz\cheminDuSon\BandBundle\Entity\Tag")
     * @ORM\JoinTable(name="cds_band_tag_rel")
     */
    private $tags;
    
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
    	$this->tags = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Band
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
     * Set nationality
     *
     * @param string $nationality
     * @return Band
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    
        return $this;
    }

    /**
     * Get nationality
     *
     * @return string 
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Band
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     * @return Band
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;
    
        return $this;
    }

    /**
     * Get presentation
     *
     * @return string 
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set category
     *
     * @param Clamz\cheminDuSon\BandBundle\Entity\Category $category
     * @return Band
     */
    public function setCategory(\Clamz\cheminDuSon\BandBundle\Entity\Category $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return Clamz\cheminDuSon\BandBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
    
    
    /**
     * Add tags
     *
     * @param Clamz\cheminDuSon\BandBundle\Entity\Tag $tags
     * @return Band
     */
    public function addTag(\Clamz\cheminDuSon\BandBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;
    
        return $this;
    }

    /**
     * Remove tags
     *
     * @param Clamz\cheminDuSon\BandBundle\Entity\Tag $tags
     */
    public function removeTag(\Clamz\cheminDuSon\BandBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }
}