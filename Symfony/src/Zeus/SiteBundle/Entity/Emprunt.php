<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Exemplaire;
use Zeus\UserBundle\Entity\Utilisateur;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Emprunt
 *
 * @ORM\Table(name="emprunt")
 * @ORM\Entity
 */
class Emprunt
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime", nullable=true)
     */
    private $datefin;

    /**
     * @var \Exemplaire
     *
     * @ORM\ManyToOne(targetEntity="Exemplaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_exemplaire", referencedColumnName="id")
     * })
     */
    private $exemplaire;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Zeus\UserBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_utilisateur", referencedColumnName="id")
     * })
     */
    private $utilisateur;

    // Rajout des Getter Et Setter

    public function getId()
    {
        return $this->id;
    }

    public function getDatedebut()
    {
        return $this->datedebut;
    }

    public function getDatefin()
    {
        return $this->datefin;
    }

    public function getExemplaire()
    {
        return $this->exemplaire;
    }

    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDatedebut(\DateTime $datedebut)
    {
        $this->datedebut = $datedebut;
    }

    public function setDatefin(\DateTime $datefin)
    {
        $this->datefin = $datefin;
    }

    public function setUtilisateur(\Zeus\UserBundle\Entity\Utilisateur $utilisateur)
    {
        echo $utilisateur;
        $this->utilisateur = $utilisateur;
    }

    public function setExemplaire(\Zeus\SiteBundle\Entity\Exemplaire $exemplaire)
    {
        $this->exemplaire = $exemplaire;
    }
}
