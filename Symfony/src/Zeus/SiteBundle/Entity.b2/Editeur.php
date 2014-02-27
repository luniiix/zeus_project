<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Editeur
 */
class Editeur
{
    /**
     * @var integer
     */
    private $idEditeur;

    /**
     * @var string
     */
    private $nomEditeur;

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
     * Get idEditeur
     *
     * @return integer 
     */
    public function getIdEditeur()
    {
        return $this->idEditeur;
    }

    /**
     * Set nomEditeur
     *
     * @param string $nomEditeur
     * @return Editeur
     */
    public function setNomEditeur($nomEditeur)
    {
        $this->nomEditeur = $nomEditeur;
    
        return $this;
    }

    /**
     * Get nomEditeur
     *
     * @return string 
     */
    public function getNomEditeur()
    {
        return $this->nomEditeur;
    }

    /**
     * Add idParution
     *
     * @param \Zeus\SiteBundle\Entity\Parution $idParution
     * @return Editeur
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
