<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zeus\SiteBundle\Entity\Auteur;
use Zeus\SiteBundle\Entity\SousCategorie;

/**
 * Parution
 *
 * @ORM\Table(name="parution")
 * @ORM\Entity
 */
class Parution
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout", type="datetime", nullable=false)
     */
    private $dateAjout;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text", nullable=true)
     */
    private $resume;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Auteur", inversedBy="parutions")
     * @ORM\JoinTable(name="parution_auteur",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ref_parution", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ref_auteur", referencedColumnName="id")
     *   }
     * )
     */
    private $auteurs;

    /**
     * @var \SousCategorie
     *
     * @ORM\ManyToOne(targetEntity="SousCategorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_sous_categorie", referencedColumnName="id")
     * })
     */
    private $sousCategorie;
    

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Traducteur", inversedBy="parutions")
     * @ORM\JoinTable(name="parution_traducteur",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ref_parution", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ref_traducteur", referencedColumnName="id")
     *   }
     * )
     */
    private $traducteur;

    /**
     * @var \TypeParution
     *
     * @ORM\ManyToOne(targetEntity="TypeParution")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_type_parution", referencedColumnName="id")
     * })
     */
    private $type;

    /**
     * @var \ImageParution
     *
     * @ORM\ManyToOne(targetEntity="ImageParution", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_image_parution", referencedColumnName="id")
     * })
     */
    private $imageParution;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->auteurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->traducteurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateAjout = new \DateTime;
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
     * Add traducteur
     *
     * @param Zeus\SiteBundle\Entity\Traducteur $traducteur
     */
    public function addTraducteur(Traducteur $traducteur)
    {
    	$this->traducteurs[] = $traducteur;
    }
    
    /**
     * Remove traducteur
     *
     * @param Zeus\SiteBundle\Entity\Traducteur $traducteur
     */
    public function removeTraducteur(Traducteur $traducteur)
    {
    	$this->traducteurs->removeElement($traducteur);
    }
    
    /**
     * Get traducteurs
     *
     */
    public function getATraducteurs()
    {
    	return $this->traducteurs;
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
     * Set imageParution
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
     * Get imageParution
     *
     * @return ImageParution
     */
    public function getImageParution()
    {
    	return $this->imageParution;
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
     *  Set traducteur
     *
     * @param boolean $actif
     * @return Parution
     */
    public function setTraducteur($traducteur)
    {
    	$this->traducteur = $traducteur;
    
    	return $this;
    }
    
    /**
     * Get traducteur
     *
     * @return string
     */
    public function getTraducteur()
    {
    	return $this->traducteur;
    }
	
	public function setSousCategorie($sousCategorie){
		$this->sousCategorie = $sousCategorie;
		return $this;
	}
	
	public function getSousCategorie(){
		return $this->sousCategorie;
	}
}
