<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parution
 *
 * @ORM\Table(name="parution")
 * @ORM\Entity
 */
class Parution
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_parution", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idParution;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_parution", type="string", length=20, nullable=false)
     */
    private $nomParution;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_parution", type="integer", nullable=false)
     */
    private $typeParution;

    /**
     * @var string
     *
     * @ORM\Column(name="resume_parution", type="text", nullable=false)
     */
    private $resumeParution;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_parution", type="date", nullable=false)
     */
    private $dateParution;

    /**
     * @var string
     *
     * @ORM\Column(name="url_frontpage", type="string", length=50, nullable=true)
     */
    private $urlFrontpage;

    /**
     * @var string
     *
     * @ORM\Column(name="url_backpage", type="string", length=50, nullable=true)
     */
    private $urlBackpage;

    /**
     * @var string
     *
     * @ORM\Column(name="url_thumb", type="string", length=50, nullable=true)
     */
    private $urlThumb;
    
    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=150, nullable=true)
     */
    private $categorie;

    /**
     * @var \Auteur
     *
     * @ORM\ManyToOne(targetEntity="Auteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_auteur", referencedColumnName="id_auteur")
     * })
     */
    private $auteur;



    /**
     * Get idParution
     *
     * @return integer 
     */
    public function getIdParution()
    {
        return $this->idParution;
    }

    /**
     * Set nomParution
     *
     * @param string $nomParution
     * @return Parution
     */
    public function setNomParution($nomParution)
    {
        $this->nomParution = $nomParution;
    
        return $this;
    }

    /**
     * Get nomParution
     *
     * @return string 
     */
    public function getNomParution()
    {
        return $this->nomParution;
    }

    /**
     * Set typeParution
     *
     * @param integer $typeParution
     * @return Parution
     */
    public function setTypeParution($typeParution)
    {
        $this->typeParution = $typeParution;
    
        return $this;
    }

    /**
     * Get typeParution
     *
     * @return integer 
     */
    public function getTypeParution()
    {
        return $this->typeParution;
    }

    /**
     * Set resumeParution
     *
     * @param string $resumeParution
     * @return Parution
     */
    public function setResumeParution($resumeParution)
    {
        $this->resumeParution = $resumeParution;
    
        return $this;
    }

    /**
     * Get resumeParution
     *
     * @return string 
     */
    public function getResumeParution()
    {
        return $this->resumeParution;
    }

    /**
     * Set dateParution
     *
     * @param \DateTime $dateParution
     * @return Parution
     */
    public function setDateParution($dateParution)
    {
        $this->dateParution = $dateParution;
    
        return $this;
    }

    /**
     * Get dateParution
     *
     * @return \DateTime 
     */
    public function getDateParution()
    {
        return $this->dateParution;
    }

    /**
     * Set urlFrontpage
     *
     * @param string $urlFrontpage
     * @return Parution
     */
    public function setUrlFrontpage($urlFrontpage)
    {
        $this->urlFrontpage = $urlFrontpage;
    
        return $this;
    }

    /**
     * Get urlFrontpage
     *
     * @return string 
     */
    public function getUrlFrontpage()
    {
        return $this->urlFrontpage;
    }

    /**
     * Set urlBackpage
     *
     * @param string $urlBackpage
     * @return Parution
     */
    public function setUrlBackpage($urlBackpage)
    {
        $this->urlBackpage = $urlBackpage;
    
        return $this;
    }

    /**
     * Get urlBackpage
     *
     * @return string 
     */
    public function getUrlBackpage()
    {
        return $this->urlBackpage;
    }

    /**
     * Set urlThumb
     *
     * @param string $urlThumb
     * @return Parution
     */
    public function setUrlThumb($urlThumb)
    {
        $this->urlThumb = $urlThumb;
    
        return $this;
    }

    /**
     * Get urlThumb
     *
     * @return string 
     */
    public function getUrlThumb()
    {
        return $this->urlThumb;
    }
    
    /**
     * Set categorie
     *
     * @param string $categorie
     * @return Parution
     */
    public function setCategorie($urlThumb)
    {
    	$this->categorie = $categorie;
    
    	return $this;
    }
    
    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
    	return $this->categorie;
    }

    /**
     * Set idAuteur
     *
     * @param \Zeus\SiteBundle\Entity\Auteur $idAuteur
     * @return Parution
     */
    public function setAuteur(\Zeus\SiteBundle\Entity\Auteur $idAuteur = null)
    {
        $this->auteur = $auteur;
    
        return $this;
    }

    /**
     * Get idAuteur
     *
     * @return \Zeus\SiteBundle\Entity\Auteur 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }
}