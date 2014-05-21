<?php
/**
 * Class SousCategorieRepository
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
 * Class SousCategorieRepository
 *
 * @category   Repository
 * @package    Entity\Repository
 * @author     Amandine Faidide <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class SousCategorieRepository extends EntityRepository
{
    /**
     * Fonction findAllByCategorie
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param      Categorie $categorie Categorie ou l'on doit chercher les sous-categorie
     * @return     sousCategorie Renvoie la liste des sous-Categorie pour la categorie donné.
    */
    public function findAllByCategorie($categorie)
    {
        return $this->createQueryBuilder('sc')
                  ->where('sc.categorie = :idCategorie')
                  ->setParameter('idCategorie', $categorie->getId())
                  ->orderBy('sc.codeClassification', 'ASC')
                  ->getQuery()
                  ->getResult();
    }
}
