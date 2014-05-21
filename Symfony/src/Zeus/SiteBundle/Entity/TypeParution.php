<?php

/**
 * Class Traducteur
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
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Traducteur
 *
 * @category   Traducteur
 * @package    Entity
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 *
 * @ORM\Table(name="type_parution")
 * @ORM\Entity
 */
class TypeParution
{
    /**
     * Id du type de la parution
     *
     * @name $id
     * @access private
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Libelle du type de la parution
     *
     * @name $libelle
     * @access private
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
     * @Assert\NotBlank(message = "Le champs libellé et obligatoire.")
     * @Assert\Length(
     *      min = "2",
     *      max = "50",
     *      minMessage = "Le libellé d'un type de parution doit faire au minimum {{ limit }} caractères",
     *      maxMessage = "Le libellé d'un type de parution ne doit pas faire plus de {{ limit }} caractères")
     */
    private $libelle;

    // Rajout des Getter Et Setter

    /**
     * Fonction getId
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return integer Retourne l'id du type parution
    */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Fonction getLibelle
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return string $libelle
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Fonction setId
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * Fonction setLibelle
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }
}
