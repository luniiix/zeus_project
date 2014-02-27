<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Droit
 */
class Droit
{
    /**
     * @var integer
     */
    private $idDroit;

    /**
     * @var string
     */
    private $nomDroit;

    /**
     * @var \Zeus\SiteBundle\Entity\Groupe
     */
    private $idGroupe;


    /**
     * Set idDroit
     *
     * @param integer $idDroit
     * @return Droit
     */
    public function setIdDroit($idDroit)
    {
        $this->idDroit = $idDroit;
    
        return $this;
    }

    /**
     * Get idDroit
     *
     * @return integer 
     */
    public function getIdDroit()
    {
        return $this->idDroit;
    }

    /**
     * Set nomDroit
     *
     * @param string $nomDroit
     * @return Droit
     */
    public function setNomDroit($nomDroit)
    {
        $this->nomDroit = $nomDroit;
    
        return $this;
    }

    /**
     * Get nomDroit
     *
     * @return string 
     */
    public function getNomDroit()
    {
        return $this->nomDroit;
    }

    /**
     * Set idGroupe
     *
     * @param \Zeus\SiteBundle\Entity\Groupe $idGroupe
     * @return Droit
     */
    public function setIdGroupe(\Zeus\SiteBundle\Entity\Groupe $idGroupe = null)
    {
        $this->idGroupe = $idGroupe;
    
        return $this;
    }

    /**
     * Get idGroupe
     *
     * @return \Zeus\SiteBundle\Entity\Groupe 
     */
    public function getIdGroupe()
    {
        return $this->idGroupe;
    }
}
