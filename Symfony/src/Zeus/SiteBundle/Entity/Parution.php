<?php

/**
 * Class ImageParution
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
use Zeus\SiteBundle\Entity\Auteur;
use Zeus\SiteBundle\Entity\SousCategorie;

/**
 * Parution
 *
 * @category   Image
 * @package    Entity
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 *
 * @ORM\Table(name="parution")
 * @ORM\Entity
 */
class Parution
{
    /**
     * Id de la parution
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
     * Date d'ajout de la parution
     *
     * @name $dateAjout
     * @access private
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime", nullable=false)
     */
    private $dateAjout;

    /**
     * Titre de la parution
     *
     * @name $titre
     * @access private
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=125, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "2",
     *      max = "125",
     *      minMessage = "Le titre d'une parution doit faire au minimum {{ limit }} caractères",
     *      maxMessage = "Le titre d'une parution ne peut faire plus de {{ limit }} caractères")
     */
    private $titre;

    /**
     * Resumé de la parution
     *
     * @name $resume
     * @access private
     * @var string
     *
     * @ORM\Column(name="resume", type="text", nullable=true)
     * @Assert\NotBlank()
     */
    private $resume;

    /**
     * Auteurs de la parution
     *
     * @name $auteurs
     * @access private
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Auteur")
     * @ORM\JoinTable(name="parution_auteur", joinColumns={
     *     @ORM\JoinColumn(name="ref_parution", referencedColumnName="id")
     *   }
     * )
     */
    private $auteurs;

    /**
     * Catégorie de la parution
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

    /**
     * Sous-Catégorie de la parution
     *
     * @name $sousCategorie
     * @access private
     * @var \SousCategorie
     *
     * @ORM\ManyToOne(targetEntity="SousCategorie")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="ref_sous_categorie", referencedColumnName="id")
     * })
     */
    private $sousCategorie;

    /**
     * Traducteurs de la parution
     *
     * @name $traducteurs
     * @access private
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Traducteur")
     * @ORM\JoinTable(name="parution_traducteur",joinColumns={
     *     @ORM\JoinColumn(name="ref_parution", referencedColumnName="id")
     *   }
     * )
     */
    private $traducteurs;

    /**
     * Type de la parution
     *
     * @name $type
     * @access private
     * @var \TypeParution
     *
     * @ORM\ManyToOne(targetEntity="TypeParution")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_type_parution", referencedColumnName="id", nullable=true)
     * })
     */
    private $type;

    /**
     * Image de la parution
     *
     * @name $imageParution
     * @access private
     * @var \ImageParution
     *
     * @ORM\ManyToOne(targetEntity="ImageParution", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_image_parution", referencedColumnName="id")
     * })
     */
    private $imageParution;

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
        $this->auteurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->traducteurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateAjout = new \DateTime;
    }

    /**
     * Fonction getId
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return integer L'id de la parution
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Fonction setDateAjout
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param \DateTime $dateAjout La date d'ajout
     * @return Parution
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
        return $this;
    }

    /**
     * Fonction getDateAjout
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return \DateTime La date d'ajout
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Fonction setTitre
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param string $titre Titre de la parution
     * @return Parution
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * Fonction getTitre
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return string Le titre de la parution
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Fonction addAuteur
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param Zeus\SiteBundle\Entity\Auteur $auteur Ajoute l'auteur a la liste des auteurs de cette parution
     */
    public function addAuteur(Auteur $auteur)
    {
        $this->auteurs[] = $auteur;
    }

    /**
     * Fonction removeAuteur
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param Zeus\SiteBundle\Entity\Auteur $auteur l'auteur a supprimé de la parution
     */
    public function removeAuteur(Auteur $auteur)
    {
        $this->auteurs->removeElement($auteur);
    }

    /**
     * Fonction getAuteurs
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param Zeus\SiteBundle\Entity\Auteur $auteur la liste des auteurs
     */
    public function getAuteurs()
    {
        return $this->auteurs;
    }

    /**
     * Fonction addAuteur
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param Zeus\SiteBundle\Entity\Traducteur $traducteur Ajoute un traducteur a la liste des traducteurs
     */
    public function addTraducteur(Traducteur $traducteur)
    {
        $this->traducteurs[] = $traducteur;
    }

    /**
     * Fonction removeTraducteur
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param Zeus\SiteBundle\Entity\Traducteur $traducteur Le traducteur a supprimé
     */
    public function removeTraducteur(Traducteur $traducteur)
    {
        $this->traducteurs->removeElement($traducteur);
    }

    /**
     * Fonction removeTraducteur
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return Traducteur Liste des traducteurs
     */
    public function getTraducteurs()
    {
        return $this->traducteurs;
    }

    /**
     * Fonction setResume
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param string $resume Insere le resume de la parution
     * @return Parution Renvoie la parution
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
        return $this;
    }

    /**
     * Fonction setResume
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return string Retourne le résumé de la parution
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Fonction setImageParution
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param ImageParution $imageParution
     * @return Parution
     */
    public function setImageParution(ImageParution $imageParution)
    {
        $this->imageParution = $imageParution;
        return $this;
    }

    /**
     * Fonction getImageParution
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return ImageParution
     */
    public function getImageParution()
    {
        return $this->imageParution;
    }

    /**
     * Fonction setType
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param TypeParution $type
     * @return Parution
     */
    public function setType(TypeParution $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Fonction getType
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return TypeParution
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Fonction setTraducteur
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param boolean $traducteur traducteur de la parution
     * @return Parution
     */
    public function setTraducteur($traducteur)
    {
        $this->traducteur = $traducteur;
        return $this;
    }

    /**
     * Fonction getTraducteur
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return string
     */
    public function getTraducteur()
    {
        return $this->traducteur;
    }
    /**
     * Fonction setSousCategorie
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param SousCategorie $sousCategorie La Sous Categorie
     *
     * @return SousCategorie
     */
    public function setSousCategorie($sousCategorie)
    {
        $this->sousCategorie = $sousCategorie;
        return $this;
    }
    /**
     * Fonction getSousCategorie
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return SousCategorie
     */
    public function getSousCategorie()
    {
        return $this->sousCategorie;
    }
    /**
     * Fonction getCategorie
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
    /**
     * Fonction setCategorie
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param Categorie $categorie La catégorie a enregistré
     *
     * @return Categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }
}
