<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 */
class Groupe
{
    /**
     * @var integer
     */
    private $idGroupe;

    /**
     * @var integer
     */
    private $idService;

    /**
     * @var string
     */
    private $nomGroupe;


    /**
     * Set idGroupe
     *
     * @param integer $idGroupe
     * @return Groupe
     */
    public function setIdGroupe($idGroupe)
    {
        $this->idGroupe = $idGroupe;
    
        return $this;
    }

    /**
     * Get idGroupe
     *
     * @return integer 
     */
    public function getIdGroupe()
    {
        return $this->idGroupe;
    }

    /**
     * Set idService
     *
     * @param integer $idService
     * @return Groupe
     */
    public function setIdService($idService)
    {
        $this->idService = $idService;
    
        return $this;
    }

    /**
     * Get idService
     *
     * @return integer 
     */
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * Set nomGroupe
     *
     * @param string $nomGroupe
     * @return Groupe
     */
    public function setNomGroupe($nomGroupe)
    {
        $this->nomGroupe = $nomGroupe;
    
        return $this;
    }

    /**
     * Get nomGroupe
     *
     * @return string 
     */
    public function getNomGroupe()
    {
        return $this->nomGroupe;
    }
}
