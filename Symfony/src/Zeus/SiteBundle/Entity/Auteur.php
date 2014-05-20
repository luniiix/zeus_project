<?php
/**
 * Class Auteur
 *
 *
 * @category   Class
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
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
 * Auteur
 *
 * @category   Auteur
 * @package    Entity
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 * @ORM\Table(name="auteur")
 * @ORM\Entity
 */
class Auteur
{
    /**
     * Id de l'Auteur
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
     * Nom de l'auteur
     *
     * @var string
     * @name $nom
     * @access private
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "2",
     *      max = "25",
     *      minMessage = "Le nom d'un auteur doit faire au minimum {{ limit }} caractères",
     *      maxMessage = "Le nom d'un auteur ne peut faire plus de {{ limit }} caractères")
     */
    private $nom;

    /**
     * Prénom de l'auteur
     *
     * @var string
     * @name $prenom
     * @access private
     *
     * @ORM\Column(name="prenom", type="string", length=25, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "2",
     *      max = "25",
     *      minMessage = "Le prénom d'un auteur doit faire au minimum {{ limit }} caractères",
     *      maxMessage = "Le prénom d'un auteur ne peut faire plus de {{ limit }} caractères")
     */
    private $prenom;

    // Rajout des Getter Et Setter

    /**
     * Fonction getId
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return integer Renvoie l'id de l'auteur
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Fonction getNom
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string Renvoie le nom de l'auteur
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * Fonction getPrenom
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string Renvoie le prénom de l'auteur
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    /**
     * Fonction getPrenom
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param string $nom Le nom de l'auteur
     * @return Auteur Renvoie l'auteur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }
    /**
     * Fonction setPrenom
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param string $prenom Donne le prénom de l'auteur
     * @return Auteur Renvoie l'auteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }
    /**
     * Fonction __toString
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string Renvoie le nom et le prénom
     */
    public function __toString()
    {
        return $this->nom . " " . $this->prenom;
    }
}
