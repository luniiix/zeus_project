<?php
/**
 * Class ParutionRepository
 *
 * @category Class
 * @author Amandine Faidide <amandinefaidide@gmail.com>
*/

/**
 * Déclaration du namespace
 */
namespace Zeus\SiteBundle\Entity;

/**
 * Import des differentes class
 */
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;

/**
 * Class ParutionRepository
 *
 * @category   Repository
 * @package    Entity\Repository
 * @author Amandine Faidide <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class ParutionRepository extends EntityRepository
{
	/**
     * Fonction aaLasts
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return Parution Renvoie la liste des parutions
    */
	public function aaLasts()
        {	
           $queryBuilder = $this->_em->createQueryBuilder()
                                     ->select('p.id')
                                     ->from($this->_entityName, 'p');
           $query = $queryBuilder->getQuery();
           $resultats = $query->getResult();

           return $resultats;
	}
}
