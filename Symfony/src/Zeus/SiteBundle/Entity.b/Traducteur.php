<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Traducteur
 */
class Traducteur
{
    /**
     * @var integer
     */
    private $idTraducteur;

    /**
     * @var string
     */
    private $prenomTraducteur;

    /**
     * @var string
     */
    private $nomTraducteur;

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
     * Get idTraducteur
     *
     * @return integer 
     */
    public function getIdTraducteur()
    {
        return $this->idTraducteur;
    }

    /**
     * Set prenomTraducteur
     *
     * @param string $prenomTraducteur
     * @return Traducteur
     */
    public function setPrenomTraducteur($prenomTraducteur)
    {
        $this->prenomTraducteur = $prenomTraducteur;
    
        return $this;
    }

    /**
     * Get prenomTraducteur
     *
     * @return string 
     */
    public function getPrenomTraducteur()
    {
        return $this->prenomTraducteur;
    }

    /**
     * Set nomTraducteur
     *
     * @param string $nomTraducteur
     * @return Traducteur
     */
    public function setNomTraducteur($nomTraducteur)
    {
        $this->nomTraducteur = $nomTraducteur;
    
        return $this;
    }

    /**
     * Get nomTraducteur
     *
     * @return string 
     */
    public function getNomTraducteur()
    {
        return $this->nomTraducteur;
    }

    /**
     * Add idParution
     *
     * @param \Zeus\SiteBundle\Entity\Parution $idParution
     * @return Traducteur
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
