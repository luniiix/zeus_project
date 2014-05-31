<?php
/**
 * Class ExemplaireRepository
 *
 * @category Class
 * @author Amandine Faidide <amandinefaidide@gmail.com>
*/

/**
 * D�claration du namespace
 */
namespace Zeus\SiteBundle\Entity;

/**
 * Import des differentes class
 */
use Doctrine\ORM\EntityRepository;

/**
 * Class ExemplaireRepository
 *
 * @category   Repository
 * @package    Entity\Repository
 * @author     Amandine Faidide <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class ExemplaireRepository extends EntityRepository
{
    /**
     * Fonction findAllPagination
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return     QueryBuilder
    */
    public function findAllPagination()
    {
        return $this->createQueryBuilder('exemplaire')
                    ->orderBy('exemplaire.dateAjout', 'asc');
    }

    /**
     * Fonction getListeEdition
     *
     * Permet de récupérer la liste des editions pour une parution
     *
     * @author     GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $id_parution Id de la parution
     */
    public function getListeExemplaire($id_parution)
    {
        // Liste des edition emprunté ou non pour cette parution
        $sql = 'select ex.id, code_reference, ref_utilisateur, date_debut, date_fin, nom, prenom '
                . 'from exemplaire ex '
                . 'LEFT OUTER JOIN emprunt e '
                . 'ON ex.id = e.ref_exemplaire '
                . 'LEFT OUTER JOIN utilisateur u '
                . 'ON e.ref_utilisateur = u.id '
                . 'WHERE ref_parution = ' . $id_parution . ' '
                . 'AND ex.is_dispo = 1 '
                . 'AND (date_fin > CURDATE() OR date_fin IS NULL)'
        ;

        $conn = $this->getEntityManager()->getConnection();
        $exemplaire = $conn->fetchAll($sql);
        return $exemplaire;
    }
}
/*'SELECT distinct(ex.id), e.id, date_debut, date_fin, ref_rang, code_reference, ref_utilisateur
            FROM exemplaire ex
            Left outer JOIN emprunt e
            ON ex.id = e.ref_exemplaire
            WHERE ex.ref_parution = ' . $id_parution . '
            AND ex.is_dispo = 1
            GROUP BY ex.id
            HAVING max(e.date_fin)'*/