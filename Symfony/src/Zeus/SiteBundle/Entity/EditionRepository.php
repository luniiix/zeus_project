<?php
/**
 * Class EditionRepository
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

/**
 * Class EditionRepository
 *
 * @category   Repository
 * @package    Entity\Repository
 * @author Amandine Faidide <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class EditionRepository extends EntityRepository
{
	/**
     * Fonction findAllByParution
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param parution $parution La parution
     * @return Edition Renvoie une liste d'objet edition pour cette parution
    */
    public function findAllByParution($parution)
    {
        return $this->createQueryBuilder('e')
                  ->where('e.parution = :idParution')
                  ->setParameter('idParution', $parution->getId())
				  ->orderBy('e.numero', 'ASC')
                  ->getQuery()
                  ->getResult();
    }
}
