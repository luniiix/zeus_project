<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Editeur
 *
 * @ORM\Table(name="editeur")
 * @ORM\Entity
 */
class Editeur
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
     * @ORM\Column(name="nom", type="string", length=200, nullable=false)
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
