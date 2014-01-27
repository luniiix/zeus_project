<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zeus\UserBundle\Entity\User;

/**
 * Emprunt
 *
 * @ORM\Table(name="emprunt")
 * @ORM\Entity(repositoryClass="Zeus\SiteBundle\Entity\EmpruntRepository")
 */
class Emprunt
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="datetime")
     */
    private $datedebut;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="datetime", nullable=true)
     */
    private $datefin;
    
    /**
     * @ORM\OneToOne(targetEntity="Zeus\UserBundle\Entity\User", cascade={"persist"})
     */
    private $employe;

     /**
  	  * @ORM\OneToOne(targetEntity="Zeus\SiteBundle\Entity\Parution", cascade={"persist"})
      */
    private $parution;

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
     * Set employe
     *
     * @param User $employe
     * @return Emprunt
     */
    public function setEmploye(User $employe)
    {
        $this->employe = $employe;

        return $this;
    }

    /**
     * Get employe
     *
     * @return User 
     */
    public function getEmploye()
    {
        return $this->employe;
    }

    /**
     * Set parution
     *
     * @param Parution $parution
     * @return Emprunt
     */
    public function setParution(Parution $parution)
    {
        $this->parution = $parution;

        return $this;
    }

    /**
     * Get parution
     *
     * @return Parution 
     */
    public function getParution()
    {
        return $this->parution;
    }

}
