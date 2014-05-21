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
 * @ORM\Table(name="traducteur")
 * @ORM\Entity
 */
class Traducteur
{
    /**
     * Id du traducteur
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
     * Prenom du traducteur
     *
     * @name $prenom
     * @access private
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=25, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "2",
     *      max = "25",
     *      minMessage = "Le prénom d'un traducteur doit faire au minimum {{ limit }} caractères",
     *      maxMessage = "Le prénom d'un traducteur ne peut faire plus de {{ limit }} caractères")
     */
    private $prenom;

    /**
     * Nom du traducteur
     *
     * @name $nom
     * @access private
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "2",
     *      max = "25",
     *      minMessage = "Le nom d'un traducteur doit faire au minimum {{ limit }} caractères",
     *      maxMessage = "Le nom d'un traducteur ne peut faire plus de {{ limit }} caractères")
     */
    private $nom;

    // Rajout des Getter Et Setter

    /**
     * Fonction __construct
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function __construct()
    {
        $this->parutions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Fonction getId
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return integer retourne l'id du traducteur
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
     * @param string $nom Le nom du traducteur
     * @return Traducteur retourne l'objet traducteur
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
     * @return string retourne le nom du traducteur
    */
    public function getNom()
    {
            return $this->nom;
    }
    /**
     * Fonction setPrenom
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param string $prenom Le prénom du traducteur
     * @return Traducteur retourne l'objet traducteur
    */
    public function setPrenom($prenom)
    {
            $this->prenom = $prenom;
            return $this;
    }
    /**
     * Fonction getPrenom
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return     string retourne le prenom du traducteur
    */
    public function getPrenom()
    {
        return $this->prenom;
    }
    /**
     * Fonction __toString
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return     string retourne le nom et prénom du traducteur
    */
    public function __toString()
    {
        return $this->nom . " " . $this->prenom;
    }
}
