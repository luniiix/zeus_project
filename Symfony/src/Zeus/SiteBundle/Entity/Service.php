<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity
 */
class Service
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_service", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idService;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_service", type="string", length=20, nullable=false)
     */
    private $nomService;



    /**
     * Get idService
     *
     * @return integer 
     */
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * Set nomService
     *
     * @param string $nomService
     * @return Service
     */
    public function setNomService($nomService)
    {
        $this->nomService = $nomService;
    
        return $this;
    }

    /**
     * Get nomService
     *
     * @return string 
     */
    public function getNomService()
    {
        return $this->nomService;
    }
}