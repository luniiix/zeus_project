<?php

/**
 * Class Exemplaire
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
 * Exemplaire
 *
 * @category   Exemplaire
 * @package    Entity
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 *
 * @ORM\Table(name="exemplaire")
 * @ORM\Entity(repositoryClass="Zeus\SiteBundle\Entity\ExemplaireRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Exemplaire
{
    /**
     * Id de l'Exemplaire
     *
     * @name $id
     * @access private
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Date d'ajout de l'Exemplaire
     *
     * @name $dateAjout
     * @access private
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime")
     */
    private $dateAjout;

    /**
     * Reference de l'Exemplaire
     *
     * @name $codeReference
     * @access private
     * @var string
     *
     * @ORM\Column(name="code_reference", type="text", nullable=false)
     */
    private $codeReference;

    /**
     * Parution de l'Exemplaire
     *
     * @name $parution
     * @access private
     * @var \Parution
     *
     * @ORM\ManyToOne(targetEntity="Parution")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_parution", referencedColumnName="id")
     * })
     */
    private $parution;

    /**
     * Edition de l'Exemplaire
     *
     * @name $edition
     * @access private
     * @var \Edition
     *
     * @ORM\ManyToOne(targetEntity="Edition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_edition", referencedColumnName="id")
     * })
     */
    private $edition;

    /**
     * Permet de savoir si l'Exemplaire est encore disponible ou s'il a été enlevé de la
     * Bibliothèque.
     *
     * @name $isDispo
     * @access private
     * @var boolean
     *
     * @ORM\Column(name="is_dispo", type="boolean")
     */
    private $isDispo;

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
    }

    /**
     * Fonction getId
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return integer id de l'exemplaire
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Fonction setDateAjout
     *
     * Initialise la dateAjout a la date du jour
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @ORM\PrePersist
     */
    public function setDateAjout()
    {
        if ($this->dateAjout == null) {
            $this->dateAjout = new \DateTime();
        }
    }

    /**
     * Fonction getDateAjout
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return \DateTime Retourne la date d'ajout
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Fonction setCodeReference
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param string $codeReference Code référence pour l'exemplaire
     * @return Exemplaire Renvoie l'exemplaire
     */
    public function setCodeReference($codeReference)
    {
        $this->codeReference = $codeReference;
        return $this;
    }
    /**
     * Fonction setCodeReference
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string Le Code référence pour l'exemplaire
     */
    public function getCodeReference()
    {
        return $this->codeReference;
    }

    /**
     * Fonction setEdition
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param \Edition $edition Objet edition concernant l'exemplaire
     * @return Exemplaire Renvoie l'exemplaire
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;
        return $this;
    }

    /**
     * Fonction getEdition
     *
     * Récupère l'edition
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return \Edition  Renvoie l'edition
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Fonction setIsDispo
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param boolean $isDispo La valeur a remplacer.
     * @return Exemplaire L'objet exemplaire
     */
    public function setIsDispo($isDispo)
    {
        $this->isDispo = $isDispo;
        return $this;
    }

    /**
     * Fonction getIsDispo
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return boolean La valeur isDispo
     */
    public function getIsDispo()
    {
        return $this->isDispo;
    }
    /**
     * Fonction setParution
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param Parution $parution La parution à inserer.
     * @return Exemplaire L'objet exemplaire
     */
    public function setParution($parution)
    {
        $this->parution = $parution;
        return $this;
    }
    /**
     * Fonction setParution
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return Parution L'objet Parution
     */
    public function getParution()
    {
        return $this->parution;
    }
}
