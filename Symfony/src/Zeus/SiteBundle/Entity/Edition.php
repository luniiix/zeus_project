<?php

/**
 * Class Edition
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
 * Edition
 *
 * @category   Edition
 * @package    Entity
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 *
 * @ORM\Table(name="edition")
 * @ORM\Entity(repositoryClass="Zeus\SiteBundle\Entity\EditionRepository")
 */
class Edition
{
    /**
     * Id de l'edition
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
     * Objet Parution de l'edition
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
     * Objet Editeur de l'edition
     *
     * @name $editeur
     * @access private
     * @var \Editeur
     *
     * @ORM\ManyToOne(targetEntity="Editeur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_editeur", referencedColumnName="id")
     * })
     */
    private $editeur;

    /**
     * Objet Editeur de l'edition
     *
     * @name $editeur
     * @access private
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer")
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern = "/^[0-9]+$/",
     *     message = "Le numéro d'une édtition doit être un chiffre ou un nombre entier")
     */
    private $numero;

    /**
     * Date de l'edition
     *
     * @name $date
     * @access private
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     * @Assert\NotBlank()
     * @Assert\Date(
     *      message = "La date d'une édition doit être de la forme : jj-mm-aaaa")
     */
    private $date;


    // Rajout des Getter Et Setter

    /**
     * Fonction getId
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return integer Renvoie l'id de l'edition
    */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Fonction getId
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param \Parution $parution Parution a ajouter a l'edition
     * @return Edition Retourne l'objet edition
     */
    public function setParution($parution)
    {
        $this->parution = $parution;
        return $this;
    }

    /**
     * Fonction getParution
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return \Parution Retourne la parution de l'edition
     */
    public function getParution()
    {
        return $this->parution;
    }

    /**
     * Fonction setEditeur
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param \Editeur $editeur Editeur de l'edition
     * @return Edition Renvoie l'objet edition
     */
    public function setEditeur($editeur)
    {
        $this->editeur = $editeur;
        return $this;
    }

    /**
     * Fonction getEditeur
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return \Editeur Renvoie l'objet editeur de l'edition
     */
    public function getEditeur()
    {
        return $this->editeur;
    }

    /**
     * Fonction setNumero
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $numero Numero de l'edition
     * @return Edition Renvoie l'objet edition
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    /**
     * Fonction getNumero
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return integer Numero de l'edition
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Fonction setDate
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param \Date $date Date de l'edition
     * @return Edition Renvoie l'objet edition
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Fonction setDate
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return \Date Date de l'edition
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Fonction __toString
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string Renvoie la chaine de caractere titre + nom + Numero
     */
    public function __toString()
    {
        $chaine = $this->parution->getTitre() . ' - Edition : ' . $this->editeur->getNom();
        if ($this->numero !== null) {
            $chaine .= ' N° '.$this->numero;
        }
        return $chaine;
    }
}
