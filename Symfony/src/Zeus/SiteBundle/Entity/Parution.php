<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="id_parution", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_parution", type="datetime", nullable=false)
     */
    private $dateAjout;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_parution", type="string", length=100, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="resume_parution", type="text", nullable=true)
     */
    private $resume;
    
    /**
  	  * @ORM\ManyToOne(targetEntity="Zeus\SiteBundle\Entity\CategorieParution", cascade={"persist"})
      */
    private $categorie;
	
    /**
     * @ORM\ManyToMany(targetEntity="Zeus\SiteBundle\Entity\Auteur", cascade={"persist"})
   	 *
     */
    private $auteurs;
    
    /**
     * @ORM\OneToOne(targetEntity="Zeus\SiteBundle\Entity\Image", cascade={"persist"})
     */
    private $image;

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
     * Set nom
     *
     * @param string $nomParution
     * @return Parution
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
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
     * Set categorie
     *
     * @param string $categorie
     * @return Parution
     */
    public function setCategorie($categorie)
    {
    	$this->categorie = $categorie;
    
    	return $this;
    }
    
    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
    	return $this->categorie;
    }

    /**
   	* Add auteur
	*
    * @param Zeus\SiteBundle\Entity\Auteur $auteur
    */
	public function addAuteur(Auteur $auteur) 
  	{
   	 	$this->auteurs[] = $auteur;
  	}

  	/**
   	 * Remove auteur
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
}