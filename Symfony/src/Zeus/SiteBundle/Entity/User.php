<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User;
/**
 * Employe
 *
 * @ORM\Table(name="employe")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_employe", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_employe", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_employe", type="string", length=20, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_employe", type="string", length=20, nullable=false)
     */
    private $mail;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone_employe", type="integer", nullable=false)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="psswd", type="string", length=32, nullable=false)
     */
    private $psswd;

    /**
     * @var integer
     *
     * @ORM\Column(name="bureau_employe", type="integer", nullable=false)
     */
    private $bureau;

    /**
     * @var \Service
     *
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_service", referencedColumnName="id_service")
     * })
     */
    private $idService;



    /**
     * Get idEmploye
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomEmploye
     *
     * @param string $nomEmploye
     * @return Employe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nomEmploye
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenomEmploye
     *
     * @param string $prenomEmploye
     * @return Employe
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenomEmploye
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set mailEmploye
     *
     * @param string $mailEmploye
     * @return Employe
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Get mailEmploye
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set telephoneEmploye
     *
     * @param integer $telephoneEmploye
     * @return Employe
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    
        return $this;
    }

    /**
     * Get telephoneEmploye
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
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
    public function setBureau($bureau)
    {
        $this->bureau = $bureau;
    
        return $this;
    }

    /**
     * Get bureauEmploye
     *
     * @return integer 
     */
    public function getBureau()
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