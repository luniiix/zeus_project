<?php

/**
 * Class SousCategorie
 *
 * @category Class
 * @author   FAIDIDE Amandine <amandinefaidide@gmail.com>
*/

/**
 * Déclaration du namespace
 */
namespace Zeus\SiteBundle\Entity;

/**
 * Import des class
 */
use Doctrine\ORM\Mapping as ORM;

/**
 * SousCategorie
 *
 * @category   SousCategorie
 * @package    Entity
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 *
 * @ORM\Table(name="sous_categorie")
 * @ORM\Entity(repositoryClass="Zeus\SiteBundle\Entity\SousCategorieRepository")
 */
class SousCategorie extends AbstractCategorie
{
    /**
     * Objet catégorie
     *
     * @name $categorie
     * @access private
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_categorie", referencedColumnName="id")
     * })
     */
    private $categorie;

    // Rajout des Getter Et Setter

    /**
     * Fonction setCategorie
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param \Categorie $categorie set la catégorie
     * @return SousCategorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }

    /**
     * Fonction setCategorie
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return \Categorie Rennvoie la catégorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
