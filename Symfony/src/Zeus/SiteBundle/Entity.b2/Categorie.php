<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 */
class Categorie
{
    /**
     * @var integer
     */
    private $idCategorie;

    /**
     * @var integer
     */
    private $codeClassification;

    /**
     * @var string
     */
    private $intitule;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idParution;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idParution = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idCategorie
     *
     * @return integer 
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * Set codeClassification
     *
     * @param integer $codeClassification
     * @return Categorie
     */
    public function setCodeClassification($codeClassification)
    {
        $this->codeClassification = $codeClassification;
    
        return $this;
    }

    /**
     * Get codeClassification
     *
     * @return integer 
     */
    public function getCodeClassification()
    {
        return $this->codeClassification;
    }

    /**
     * Set intitule
     *
     * @param string $intitule
     * @return Categorie
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    
        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Add idParution
     *
     * @param \Zeus\SiteBundle\Entity\Parution $idParution
     * @return Categorie
     */
    public function addIdParution(\Zeus\SiteBundle\Entity\Parution $idParution)
    {
        $this->idParution[] = $idParution;
    
        return $this;
    }

    /**
     * Remove idParution
     *
     * @param \Zeus\SiteBundle\Entity\Parution $idParution
     */
    public function removeIdParution(\Zeus\SiteBundle\Entity\Parution $idParution)
    {
        $this->idParution->removeElement($idParution);
    }

    /**
     * Get idParution
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdParution()
    {
        return $this->idParution;
    }
}
