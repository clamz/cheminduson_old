<?php

namespace Clamz\CheminDuSon\BandBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TagRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TagRepository extends EntityRepository
{
	public function getTags(){
		$query = $this->createQueryBuilder('t')
			->setMaxResults(10)->getQuery();
		return $query->getResult();
	}
}
