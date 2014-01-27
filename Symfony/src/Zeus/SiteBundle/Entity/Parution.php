<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use \DateTime;

/**
 * Parution
 *
 * @ORM\Table(name="parution")
 * @ORM\Entity(repositoryClass="Zeus\SiteBundle\Entity\ParutionRepository")
 */
class Parution
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime")
     */
    private $dateAjout;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

     /**
   	  * @ORM\ManyToMany(targetEntity="Zeus\SiteBundle\Entity\Auteur", cascade={"persist"})
      */
    private $auteurs;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text", nullable=true)
     */
    private $resume;

     /**
  	  * @ORM\OneToOne(targetEntity="Zeus\SiteBundle\Entity\Image", cascade={"persist"})
      */
    private $image;

     /**
  	  * @ORM\ManyToOne(targetEntity="Zeus\SiteBundle\Entity\TypeParution", cascade={"persist"})
      */
    private $type;

    /** 
     * @var boolean
     * 
     * @ORM\Column(name="is_actif", type="boolean")
     */
    private $isActif;

    
    public function __construct()
    {
    	$this->dateAjout = new DateTime();
    	$this->isActif = true;
    	$this->auteurs = new ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     * @return Parution
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime 
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Parution
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

   /**
   	* Add auteurs
	*
    * @param Zeus\SiteBundle\Entity\Auteur $auteur
    */
	public function addAuteur(Auteur $auteur) 
  	{
   	 	$this->auteurs[] = $auteur;
  	}

  	/**
   	 * Remove auteurs
   	 *
   	 * @param Zeus\SiteBundle\Entity\Auteur $auteur
  	 */
 	public function removeAuteur(Auteur $auteur) 
 	{
   	 	$this->auteurs->removeElement($auteur);
  	}

  	/**
   	 * Get auteurs
   	 *
   	 * @param Zeus\SiteBundle\Entity\Auteur $auteur
   	 */
  	public function getAuteurs()
  	{
  		return $this->auteurs;
  	}

    /**
     * Set resume
     *
     * @param string $resume
     * @return Parution
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string 
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set image
     *
     * @param Image $image
     * @return Parution
     */
    public function setImage(Image $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set type
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
     * Get type
     *
     * @return TypeParution 
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
    *  Set isActif
    *
    * @param boolean $actif
    * @return Parution
    */
    public function setIsActif($isActif)
    {
    	$this->isActif = $isActif;
    
    	return $this;
    }
    
    /**
     * Get isActif
     *
     * @return string
     */
    public function getIsActif()
    {
    	return $this->isActif;
    }
}
