<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=false)
     * @Assert\Length(
     *      min = "2",
     *      max = "25",
     *      minMessage = "Le nom d'un service doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Le nom d'un service ne peut faire plus de {{ limit }} caractères")
     */
    private $nom;
    
    public function getId()
    {
    	return $this->id;	
    }

    public function setNom($nom)
    {
    	$this->nom = $nom;
    	return $this;
    }
    
    public function getNom()
    {
    	return $this->nom;
    }

}
