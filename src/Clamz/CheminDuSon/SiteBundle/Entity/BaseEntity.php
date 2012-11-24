<?php
namespace Clamz\CheminDuSon\SiteBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

abstract class BaseEntity {
	
	/**
	 * @var datetime $created
	 *
	 * @Gedmo\Timestampable(on="create")
	 * @ORM\Column(type="datetime")
	 */
	protected $created;
	
	/**
	 * @var datetime $updated
	 *
	 * @Gedmo\Timestampable(on="update")
	 * @ORM\Column(type="datetime")
	 */
	protected $updated;
	
	public function getCreated()
	{
		return $this->created;
	}
	
	public function getUpdated()
	{
		return $this->updated;
	}
}
