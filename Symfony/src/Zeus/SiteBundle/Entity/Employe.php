<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employe
 *
 */
class Employe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmploye;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nomEmploye;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenomEmploye;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=20, nullable=false)
     */
    private $mailEmploye;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer", nullable=false)
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
     * @ORM\Column(name="bureau", type="integer", nullable=false)
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


}
