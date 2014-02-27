<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emprunt
 */
class Emprunt
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $datedebut;

    /**
     * @var \DateTime
     */
    private $datefin;

    /**
     * @var \Zeus\SiteBundle\Entity\Parution
     */
    private $parution;

    /**
     * @var \Zeus\SiteBundle\Entity\Utilisateur
     */
    private $employe;


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
     * Set datedebut
     *
     * @param \DateTime $datedebut
     * @return Emprunt
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    
        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime 
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     * @return Emprunt
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    
        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime 
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set parution
     *
     * @param \Zeus\SiteBundle\Entity\Parution $parution
     * @return Emprunt
     */
    public function setParution(\Zeus\SiteBundle\Entity\Parution $parution = null)
    {
        $this->parution = $parution;
    
        return $this;
    }

    /**
     * Get parution
     *
     * @return \Zeus\SiteBundle\Entity\Parution 
     */
    public function getParution()
    {
        return $this->parution;
    }

    /**
     * Set employe
     *
     * @param \Zeus\SiteBundle\Entity\Utilisateur $employe
     * @return Emprunt
     */
    public function setEmploye(\Zeus\SiteBundle\Entity\Utilisateur $employe = null)
    {
        $this->employe = $employe;
    
        return $this;
    }

    /**
     * Get employe
     *
     * @return \Zeus\SiteBundle\Entity\Utilisateur 
     */
    public function getEmploye()
    {
        return $this->employe;
    }
}
