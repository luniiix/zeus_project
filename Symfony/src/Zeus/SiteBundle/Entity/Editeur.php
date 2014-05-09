<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     * @Assert\Length(
     *      min = "2",
     *      max = "45",
     *      minMessage = "Le nom d'un éditeur doit faire au minimum {{ limit }} caractères",
     *      maxMessage = "Le nom d'un éditeur ne peut faire plus de {{ limit }} caractères")
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
