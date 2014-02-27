<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 */
class Service
{
    /**
     * @var integer
     */
    private $idService;

    /**
     * @var string
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
