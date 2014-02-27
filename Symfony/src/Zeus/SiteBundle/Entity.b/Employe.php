<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employe
 */
class Employe
{
    /**
     * @var integer
     */
    private $idEmploye;

    /**
     * @var string
     */
    private $nomEmploye;

    /**
     * @var string
     */
    private $prenomEmploye;

    /**
     * @var string
     */
    private $mailEmploye;

    /**
     * @var integer
     */
    private $telephoneEmploye;

    /**
     * @var string
     */
    private $psswd;

    /**
     * @var integer
     */
    private $bureauEmploye;

    /**
     * @var \Zeus\SiteBundle\Entity\Service
     */
    private $idService;


    /**
     * Get idEmploye
     *
     * @return integer 
     */
    public function getIdEmploye()
    {
        return $this->idEmploye;
    }

    /**
     * Set nomEmploye
     *
     * @param string $nomEmploye
     * @return Employe
     */
    public function setNomEmploye($nomEmploye)
    {
        $this->nomEmploye = $nomEmploye;
    
        return $this;
    }

    /**
     * Get nomEmploye
     *
     * @return string 
     */
    public function getNomEmploye()
    {
        return $this->nomEmploye;
    }

    /**
     * Set prenomEmploye
     *
     * @param string $prenomEmploye
     * @return Employe
     */
    public function setPrenomEmploye($prenomEmploye)
    {
        $this->prenomEmploye = $prenomEmploye;
    
        return $this;
    }

    /**
     * Get prenomEmploye
     *
     * @return string 
     */
    public function getPrenomEmploye()
    {
        return $this->prenomEmploye;
    }

    /**
     * Set mailEmploye
     *
     * @param string $mailEmploye
     * @return Employe
     */
    public function setMailEmploye($mailEmploye)
    {
        $this->mailEmploye = $mailEmploye;
    
        return $this;
    }

    /**
     * Get mailEmploye
     *
     * @return string 
     */
    public function getMailEmploye()
    {
        return $this->mailEmploye;
    }

    /**
     * Set telephoneEmploye
     *
     * @param integer $telephoneEmploye
     * @return Employe
     */
    public function setTelephoneEmploye($telephoneEmploye)
    {
        $this->telephoneEmploye = $telephoneEmploye;
    
        return $this;
    }

    /**
     * Get telephoneEmploye
     *
     * @return integer 
     */
    public function getTelephoneEmploye()
    {
        return $this->telephoneEmploye;
    }

    /**
     * Set psswd
     *
     * @param string $psswd
     * @return Employe
     */
    public function setPsswd($psswd)
    {
        $this->psswd = $psswd;
    
        return $this;
    }

    /**
     * Get psswd
     *
     * @return string 
     */
    public function getPsswd()
    {
        return $this->psswd;
    }

    /**
     * Set bureauEmploye
     *
     * @param integer $bureauEmploye
     * @return Employe
     */
    public function setBureauEmploye($bureauEmploye)
    {
        $this->bureauEmploye = $bureauEmploye;
    
        return $this;
    }

    /**
     * Get bureauEmploye
     *
     * @return integer 
     */
    public function getBureauEmploye()
    {
        return $this->bureauEmploye;
    }

    /**
     * Set idService
     *
     * @param \Zeus\SiteBundle\Entity\Service $idService
     * @return Employe
     */
    public function setIdService(\Zeus\SiteBundle\Entity\Service $idService = null)
    {
        $this->idService = $idService;
    
        return $this;
    }

    /**
     * Get idService
     *
     * @return \Zeus\SiteBundle\Entity\Service 
     */
    public function getIdService()
    {
        return $this->idService;
    }
}
