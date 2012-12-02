<?php
namespace Clamz\CheminDuSon\BandBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Clamz\CheminDuSon\BandBundle\Entity\Band;
use Clamz\CheminDuSon\BandBundle\Entity\Tag;

/**
 * @ORM\Entity
 * @ORM\Table("cds_band_tag_rel");
 */
class BandTag{
	
	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="Band")
	 */
	private $band;
	
	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="Tag")
	 */
	private $tag;

    /**
     * Set band
     *
     * @param Clamz\CheminDuSon\BandBundle\Entity\Band $band
     * @return BandTag
     */
    public function setBand(\Clamz\CheminDuSon\BandBundle\Entity\Band $band)
    {
        $this->band = $band;
    
        return $this;
    }

    /**
     * Get band
     *
     * @return Clamz\CheminDuSon\BandBundle\Entity\Band 
     */
    public function getBand()
    {
        return $this->band;
    }

    /**
     * Set tag
     *
     * @param Clamz\CheminDuSon\BandBundle\Entity\Tag $tag
     * @return BandTag
     */
    public function setTag(\Clamz\CheminDuSon\BandBundle\Entity\Tag $tag)
    {
        $this->tag = $tag;
    
        return $this;
    }

    /**
     * Get tag
     *
     * @return Clamz\CheminDuSon\BandBundle\Entity\Tag 
     */
    public function getTag()
    {
        return $this->tag;
    }
}