<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parution
 */
class Parution
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateAjout;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $resume;

    /**
     * @var boolean
     */
    private $isActif;

    /**
     * @var string
     */
    private $codeReference;

    /**
     * @var \Zeus\SiteBundle\Entity\TypeParution
     */
    private $type;

    /**
     * @var \Zeus\SiteBundle\Entity\ImageParution
     */
    private $imageParution;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $auteur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $categorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $editeur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $traducteur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->auteur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categorie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->editeur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->traducteur = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set isActif
     *
     * @param boolean $isActif
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
     * @return boolean 
     */
    public function getIsActif()
    {
        return $this->isActif;
    }

    /**
     * Set codeReference
     *
     * @param string $codeReference
     * @return Parution
     */
    public function setCodeReference($codeReference)
    {
        $this->codeReference = $codeReference;
    
        return $this;
    }

    /**
     * Get codeReference
     *
     * @return string 
     */
    public function getCodeReference()
    {
        return $this->codeReference;
    }

    /**
     * Set type
     *
     * @param \Zeus\SiteBundle\Entity\TypeParution $type
     * @return Parution
     */
    public function setType(\Zeus\SiteBundle\Entity\TypeParution $type = null)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \Zeus\SiteBundle\Entity\TypeParution 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set imageParution
     *
     * @param \Zeus\SiteBundle\Entity\ImageParution $imageParution
     * @return Parution
     */
    public function setImageParution(\Zeus\SiteBundle\Entity\ImageParution $imageParution = null)
    {
        $this->imageParution = $imageParution;
    
        return $this;
    }

    /**
     * Get imageParution
     *
     * @return \Zeus\SiteBundle\Entity\ImageParution 
     */
    public function getImageParution()
    {
        return $this->imageParution;
    }

    /**
     * Add auteur
     *
     * @param \Zeus\SiteBundle\Entity\Auteur $auteur
     * @return Parution
     */
    public function addAuteur(\Zeus\SiteBundle\Entity\Auteur $auteur)
    {
        $this->auteur[] = $auteur;
    
        return $this;
    }

    /**
     * Remove auteur
     *
     * @param \Zeus\SiteBundle\Entity\Auteur $auteur
     */
    public function removeAuteur(\Zeus\SiteBundle\Entity\Auteur $auteur)
    {
        $this->auteur->removeElement($auteur);
    }

    /**
     * Get auteur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }
    
    
    /**
     * Remove editeur
     *
     * @param \Zeus\SiteBundle\Entity\Auteur $auteur
     */
    public function removeEditeur(\Zeus\SiteBundle\Entity\Editeur $editeur)
    {
        $this->editeur->removeElement($editeur);
    }

    /**
     * Get editeur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEditeur()
    {
        return $this->editeur;
    }

    
    
    /**
     * Remove editeur
     *
     * @param \Zeus\SiteBundle\Entity\Auteur $auteur
     */
    public function removeTraducteur(\Zeus\SiteBundle\Entity\Traducteur $traducteur)
    {
        $this->traducteur->removeElement($traducteur);
    }

    /**
     * Get editeur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategorie()
    {
        return $this->categories;
    }
    
    /**
     * Remove editeur
     *
     * @param \Zeus\SiteBundle\Entity\Auteur $auteur
     */
    public function removeCategorie(\Zeus\SiteBundle\Entity\Categorie $categorie)
    {
        $this->categories->removeElement($categorie);
    }

    /**
     * Get editeur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTraducteur()
    {
        return $this->traducteur;
    }
}
