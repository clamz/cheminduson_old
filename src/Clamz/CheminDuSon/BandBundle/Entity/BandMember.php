<?php

namespace Clamz\CheminDuSon\BandBundle\Entity;

use Clamz\CheminDuSon\SiteBundle\Entity\BaseEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clamz\CheminDuSon\BandBundle\Entity\BandMember
 *
 * @ORM\Table(name="cds_band_member_rel")
 * @ORM\Entity
 */
class BandMember extends BaseEntity
{
  
    /**
     * @var integer $band
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Band")
     */
    private $band;
    
    /**
     * @var integer $band
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Member")
     */
    private $member;

   

    /**
     * Set band
     *
     * @param Clamz\CheminDuSon\BandBundle\Entity\Band $band
     * @return BandMember
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
     * Set member
     *
     * @param Clamz\CheminDuSon\BandBundle\Entity\Member $member
     * @return BandMember
     */
    public function setMember(\Clamz\CheminDuSon\BandBundle\Entity\Member $member)
    {
        $this->member = $member;
    
        return $this;
    }

    /**
     * Get member
     *
     * @return Clamz\CheminDuSon\BandBundle\Entity\Member 
     */
    public function getMember()
    {
        return $this->member;
    }
}