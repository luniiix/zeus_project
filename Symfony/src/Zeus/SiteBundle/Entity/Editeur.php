<?php

/**
 * Class Editeur
 *
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
 * Editeur
 *
 * @category   Editeur
 * @package    Entity
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 *
 * @ORM\Table(name="editeur")
 * @ORM\Entity
 */
class Editeur
{
    /**
     * Id de l'editeur
     *
     * @var integer
     * @name $id
     * @access private
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Nom de l'editeur
     *
     * @name $nom
     * @access private
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "2",
     *      max = "45",
     *      minMessage = "Le nom d'un éditeur doit faire au minimum {{ limit }} caractères",
     *      maxMessage = "Le nom d'un éditeur ne peut faire plus de {{ limit }} caractères")
     */
    private $nom;

    // Rajout des Getter Et Setter

    /**
     * Fonction getId
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return integer Renvoie l'id de l'editeur
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Fonction setNom
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param string $nom Nom de l'editeur
     * @return Editeur Renvoie l'editeur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }
    /**
     * Fonction getNom
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return integer Renvoie le nom de l'editeur
     */
    public function getNom()
    {
        return $this->nom;
    }
}
