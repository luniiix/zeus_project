<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Auteur
 */
class Auteur
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $parution;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parution = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return Auteur
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
     * Set prenom
     *
     * @param string $prenom
     * @return Auteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Add parution
     *
     * @param \Zeus\SiteBundle\Entity\Parution $parution
     * @return Auteur
     */
    public function addParution(\Zeus\SiteBundle\Entity\Parution $parution)
    {
        $this->parution[] = $parution;
    
        return $this;
    }

    /**
     * Remove parution
     *
     * @param \Zeus\SiteBundle\Entity\Parution $parution
     */
    public function removeParution(\Zeus\SiteBundle\Entity\Parution $parution)
    {
        $this->parution->removeElement($parution);
    }

    /**
     * Get parution
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getParution()
    {
        return $this->parution;
    }
}
