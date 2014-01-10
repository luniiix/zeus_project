<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity
 */
class Tag
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tag", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idTag;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_tag", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $libelleTag;

    /**
     * @var \Parution
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Parution")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_parution", referencedColumnName="id_parution")
     * })
     */
    private $idParution;



    /**
     * Set idTag
     *
     * @param integer $idTag
     * @return Tag
     */
    public function setIdTag($idTag)
    {
        $this->idTag = $idTag;
    
        return $this;
    }

    /**
     * Get idTag
     *
     * @return integer 
     */
    public function getIdTag()
    {
        return $this->idTag;
    }

    /**
     * Set libelleTag
     *
     * @param string $libelleTag
     * @return Tag
     */
    public function setLibelleTag($libelleTag)
    {
        $this->libelleTag = $libelleTag;
    
        return $this;
    }

    /**
     * Get libelleTag
     *
     * @return string 
     */
    public function getLibelleTag()
    {
        return $this->libelleTag;
    }

    /**
     * Set idParution
     *
     * @param \Zeus\SiteBundle\Entity\Parution $idParution
     * @return Tag
     */
    public function setIdParution(\Zeus\SiteBundle\Entity\Parution $idParution)
    {
        $this->idParution = $idParution;
    
        return $this;
    }

    /**
     * Get idParution
     *
     * @return \Zeus\SiteBundle\Entity\Parution 
     */
    public function getIdParution()
    {
        return $this->idParution;
    }
}