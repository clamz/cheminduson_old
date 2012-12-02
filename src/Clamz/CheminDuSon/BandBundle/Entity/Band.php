<?php

namespace Clamz\CheminDuSon\BandBundle\Entity;

use Clamz\CheminDuSon\SiteBundle\Entity\BaseEntity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Clamz\CheminDuSon\BandBundle\Entity\Band
 *
 * @ORM\Table(name="cds_band")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Clamz\CheminDuSon\BandBundle\Entity\BandRepository")
 */
class Band extends BaseEntity
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $path;
    
    /**
     * @var string $image
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     * @Assert\Image(maxSize = "6024k")
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
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="bands")
     */
    private $category;


    
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
    	$this->tags = new ArrayCollection();
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
    public function setImage(File $image = null)
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
     * @param Clamz\CheminDuSon\BandBundle\Entity\Category $category
     * @return Band
     */
    public function setCategory(\Clamz\CheminDuSon\BandBundle\Entity\Category $category = null)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return Clamz\CheminDuSon\BandBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add tags
     *
     * @param Clamz\CheminDuSon\BandBundle\Entity\Tag $tags
     * @return Band
     */
    public function addTag(\Clamz\CheminDuSon\BandBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;
    
        return $this;
    }

    /**
     * Remove tags
     *
     * @param Clamz\CheminDuSon\BandBundle\Entity\Tag $tags
     */
    public function removeTag(\Clamz\CheminDuSon\BandBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
    	if (isset($this->image) && null !== $this->image) {
    		// do whatever you want to generate a unique name
    		$this->setPath($this->image->getClientOriginalName());
    	}
    }
    
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
    	if (null === $this->image) {
    		return;
    	}
    
    	// if there is an error when moving the file, an exception will
    	// be automatically thrown by move(). This will properly prevent
    	// the entity from being persisted to the database on error
    	$this->image->move($this->getUploadRootDir(), $this->path);
    
    	unset($this->image);
    }
    
    protected function getUploadRootDir()
    {
    	// the absolute directory path where uploaded documents should be saved
    	return __DIR__.'/../../../../../web/'.$this->getUploadDir();
    }
    
    public function getWebPath()
    {
    	return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }
    
    protected function getUploadDir()
    {
    	// get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
    	return 'uploads/band/images';
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Band
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
}