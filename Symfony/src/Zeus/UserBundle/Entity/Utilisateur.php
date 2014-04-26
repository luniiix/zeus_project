<?php
// src/Zeus/UserBundle/Entity/User.php

namespace Zeus\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 */
class Utilisateur extends BaseUser
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=false)
     */
    private $nom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=25, nullable=false)
     */
    private $prenom;
    
    /**
     * @var \Zeus\SiteBundle\Entity\Service
     *
     * @ORM\ManyToOne(targetEntity="\Zeus\SiteBundle\Entity\Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_service", referencedColumnName="id")
     * })
     */
    private $service;

    public function __construct()
    {
        parent::__construct();
        
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
     * @return Utilisateur
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
     * @return Utilisateur
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
     * Set service
     *
     * @param \Zeus\SiteBundle\Entity\Service $service
     * @return Utilisateur
     */
    public function setService(\Zeus\SiteBundle\Entity\Service $service = null)
    {
        $this->service = $service;
    
        return $this;
    }

    /**
     * Get service
     *
     * @return \Zeus\SiteBundle\Entity\Service 
     */
    public function getService()
    {
        return $this->service;
    }
}