<?php

namespace Clamz\CheminDuSon\BandBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BandRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BandRepository extends EntityRepository
{
	function createBand($band, $tags){
		var_dump($band);
		$em = $this->getEntityManager();
		$tagRepository = $em->getRepository('CdsBandBundle:Tag');
		$em->persist($band);
		$em->flush($band);
		foreach ($tags as $tag){
			if($tag!==""){
				$tagEntity = $tagRepository->findOneByName($tag);
				if($tagEntity===null){
					$tagEntity = new Tag();
					$tagEntity->setName($tag);
					$em->persist($tagEntity);
					$em->flush($tagEntity);
				}
				$bandTagEntity = new BandTag();
				
				$bandTagEntity->setTag($tagEntity);
				$bandTagEntity->setBand($band);
				$em->persist($bandTagEntity);
				$em->flush($bandTagEntity);
			}
			
		}
		
		
	}
	
	function findNewBands(){
		
		$query = $this->createQueryBuilder('b')
			->orderBy('b.created','DESC')
			->setMaxResults("30")->getQuery();
		return $query->getResult();
	}
}
