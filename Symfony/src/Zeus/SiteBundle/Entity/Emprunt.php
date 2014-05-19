<?php

/**
 * Class Emprunt
 *
 *
 * @category Class
 * @author GUICHERD Kévin <kevinguicherd@gmail.com>
*/

/**
 * Déclaration du namespace
 */
namespace Zeus\SiteBundle\Entity;

/**
 * Import des class
 */
use Doctrine\ORM\Mapping as ORM;
use \Exemplaire;
use Zeus\UserBundle\Entity\Utilisateur;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Emprunt
 *
 * @category   Emprunt
 * @package    Entity
 * @author GUICHERD Kévin <kevinguicherd@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 * @ORM\Table(name="emprunt")
 * @ORM\Entity
 */
class Emprunt
{
    /**
     * Id de l'emprunt
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
     * Date de début de l'emprunt
     *
     * @var \DateTime
     * @name $datedebut
     * @access private
     *
     * @ORM\Column(name="date_debut", type="datetime", nullable=false)
     */
    private $datedebut;

    /**
     * Date de fin de l'emprunt
     *
     * @var \DateTime
     * @name $datefin
     * @access private
     *
     * @ORM\Column(name="date_fin", type="datetime", nullable=true)
     */
    private $datefin;

    /**
     * Exemplaire de l'emprunt
     *
     * @var \Exemplaire
     * @name $exemplaire
     * @access private
     *
     * @ORM\ManyToOne(targetEntity="Exemplaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_exemplaire", referencedColumnName="id")
     * })
     */
    private $exemplaire;

    /**
     * Utilisateur de l'emprunt
     *
     * @var \Utilisateur
     * @access private
     *
     * @ORM\ManyToOne(targetEntity="Zeus\UserBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_utilisateur", referencedColumnName="id")
     * })
     */
    private $utilisateur;

    // Rajout des Getter Et Setter

    /**
     * Fonction getId
     *
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return integer Renvoie l'id de l'emprunt
    */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Fonction getDatedebut
     *
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return dateTime Renvoie la date de debut de l'emprunt
    */
    public function getDatedebut()
    {
        return $this->datedebut;
    }
    /**
     * Fonction getDatefin
     *
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return dateTime Renvoie la date de fin de l'emprunt
    */
    public function getDatefin()
    {
        return $this->datefin;
    }
    /**
     * Fonction getExemplaire
     *
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return Exemplaire Renvoie l'exemplaire de l'emprunt
    */
    public function getExemplaire()
    {
        return $this->exemplaire;
    }
    /**
     * Fonction getUtilisateur
     *
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return Utilisateur Renvoie l'object Utilisateur
    */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
    /**
     * Fonction setId
     *
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $id Id de l'emprunt
    */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * Fonction setDatedebut
     *
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param DateTime $datedebut date de debut de l'emprunt
    */
    public function setDatedebut(\DateTime $datedebut)
    {
        $this->datedebut = $datedebut;
    }
    /**
     * Fonction setDatefin
     *
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param DateTime $datefin date de fin de l'emprunt
    */
    public function setDatefin(\DateTime $datefin)
    {
        $this->datefin = $datefin;
    }
    /**
     * Fonction setUtilisateur
     *
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param Utilisateur $utilisateur Utilisateur empruntant l'emprunt
    */
    public function setUtilisateur(\Zeus\UserBundle\Entity\Utilisateur $utilisateur)
    {
        echo $utilisateur;
        $this->utilisateur = $utilisateur;
    }
    /**
     * Fonction setExemplaire
     *
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param exemplaire $exemplaire Exemplaire de l'emprunt
    */
    public function setExemplaire(\Zeus\SiteBundle\Entity\Exemplaire $exemplaire)
    {
        $this->exemplaire = $exemplaire;
    }
}
