<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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

}
