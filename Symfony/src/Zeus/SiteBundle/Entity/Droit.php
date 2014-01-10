<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Droit
 *
 * @ORM\Table(name="droit")
 * @ORM\Entity
 */
class Droit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_droit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idDroit;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_droit", type="string", length=20, nullable=false)
     */
    private $nomDroit;

    /**
     * @var \Groupe
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Groupe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_groupe", referencedColumnName="id_groupe")
     * })
     */
    private $idGroupe;



    /**
     * Set idDroit
     *
     * @param integer $idDroit
     * @return Droit
     */
    public function setIdDroit($idDroit)
    {
        $this->idDroit = $idDroit;
    
        return $this;
    }

    /**
     * Get idDroit
     *
     * @return integer 
     */
    public function getIdDroit()
    {
        return $this->idDroit;
    }

    /**
     * Set nomDroit
     *
     * @param string $nomDroit
     * @return Droit
     */
    public function setNomDroit($nomDroit)
    {
        $this->nomDroit = $nomDroit;
    
        return $this;
    }

    /**
     * Get nomDroit
     *
     * @return string 
     */
    public function getNomDroit()
    {
        return $this->nomDroit;
    }

    /**
     * Set idGroupe
     *
     * @param \Zeus\SiteBundle\Entity\Groupe $idGroupe
     * @return Droit
     */
    public function setIdGroupe(\Zeus\SiteBundle\Entity\Groupe $idGroupe)
    {
        $this->idGroupe = $idGroupe;
    
        return $this;
    }

    /**
     * Get idGroupe
     *
     * @return \Zeus\SiteBundle\Entity\Groupe 
     */
    public function getIdGroupe()
    {
        return $this->idGroupe;
    }
}