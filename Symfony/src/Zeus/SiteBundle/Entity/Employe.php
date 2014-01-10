<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employe
 *
 * @ORM\Table(name="employe")
 * @ORM\Entity
 */
class Employe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_employe", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmploye;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_employe", type="string", length=20, nullable=false)
     */
    private $nomEmploye;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_employe", type="string", length=20, nullable=false)
     */
    private $prenomEmploye;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_employe", type="string", length=20, nullable=false)
     */
    private $mailEmploye;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone_employe", type="integer", nullable=false)
     */
    private $telephoneEmploye;

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
    private $bureauEmploye;

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