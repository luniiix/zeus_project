<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exemplaire
 *
 * @ORM\Table(name="exemplaire")
 * @ORM\Entity(repositoryClass="Zeus\SiteBundle\Entity\ExemplaireRepository")
 */
class Exemplaire
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
     * @ORM\Column(name="dateAjout", type="datetime")
     */
    private $dateAjout;
    
    /**
     * @var string
     *
     * @ORM\Column(name="code_reference", type="text", nullable=false)
     */
    private $codeReference;
    
    /**
     * @var \Edition
     *
     * @ORM\ManyToOne(targetEntity="Edition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_edition", referencedColumnName="id")
     * })
     */
    private $edition;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_dispo", type="boolean")
     */
    private $isDispo;

	public function __construct(){
		$this->codeReference = ""; // a changer avec un prépersiste 	
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
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     * @return Exemplaire
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
    
        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime 
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }
    
	/**
     * Set codeReference
     *
     * @param text $codeReference
     * @return Exemplaire
     */
    public function setCodeReference($codeReference)
    {
        $this->codeReference = $codeReference;
    
        return $this;
    }

    /**
     * Get codeReference
     *
     * @return text 
     */
    public function getCodeReference()
    {
        return $this->codeReference;
    }

    /**
     * Set edition
     *
     * @param \Edition $edition
     * @return Exemplaire
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;
    
        return $this;
    }

    /**
     * Get edition
     *
     * @return \Edition 
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Set isDispo
     *
     * @param boolean $isDispo
     * @return Exemplaire
     */
    public function setIsDispo($isDispo)
    {
        $this->isDispo = $isDispo;
    
        return $this;
    }

    /**
     * Get isDispo
     *
     * @return boolean 
     */
    public function getIsDispo()
    {
        return $this->isDispo;
    }
}
