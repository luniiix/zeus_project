<?php

/**
 * Class AbstractCategorie
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
 * AbstractCategorie
 *
 * @category   Categorie
 * @package    Entity\Abstract
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
abstract class AbstractCategorie
{
    /**
     * Id
     *
     * @var integer
     * @name $id
     * @access private
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     *
     * codeClassification
     *
     * @name $codeClassification
     * @access private
     * @var integer
     *
     * @ORM\Column(name="code_classification", type="integer", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern = "/^[0-9]+$/",
     *     message = "Le code classification d'une catégorie ou sous-catégorie doit être chiffre ou
     *                un nombre entier")
     */
    protected $codeClassification;

    /**
     * intitule
     *
     * @name $intitule
     * @access private
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=25, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "2",
     *      max = "25",
     *      minMessage = "L'intitulé d'une catégorie ou sous-catégorie doit faire au moins {{ limit }} caractères",
     *      maxMessage = "L'intitulé d'une catégorie ou sous-catégorie ne peut faire plus de {{ limit }} caractères")
     */
    protected $intitule;

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
     * @return integer Renvoie l'id
    */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Fonction getCodeClassification
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return integer Renvoie le codeClassification
    */
    public function getCodeClassification()
    {
        return $this->codeClassification;
    }
    /**
     * Fonction setCodeClassification
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $codeClassification Enregistre le codeClassification
     * @return AbstractCategorie Renvoie l'object courant
    */
    public function setCodeClassification($codeClassification)
    {
        $this->codeClassification = $codeClassification;
        return $this;
    }
    /**
     * Fonction getIntitule
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string Renvoie l'Intitule
    */
    public function getIntitule()
    {
        return $this->intitule;
    }
    /**
     * Fonction setIntitule
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param string $intitule Enregistre l'Intitule
     * @return string Renvoie l'Intitule
    */
    public function setIntitule($intitule)
    {
        return $this->intitule = $intitule;
    }
    /**
     * Fonction __toString
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string Renvoie l'Intitule concatener avec l'intitulé
    */
    public function __toString()
    {
        return $this->codeClassification.' '.$this->intitule;
    }
}
