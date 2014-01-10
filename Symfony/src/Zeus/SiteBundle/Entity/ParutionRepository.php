<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ParutionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ParutionRepository extends EntityRepository
{
	
	public function find5Lasts(){
		return $this->getEntityManager()
			->createQuery('select * from parutions DESC LIMIT 5')
			->getResults;
	}
	
}
