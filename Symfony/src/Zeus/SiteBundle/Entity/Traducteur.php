<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Traducteur
 *
 * @ORM\Table(name="traducteur")
 * @ORM\Entity
 */
class Traducteur
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
     * @ORM\Column(name="prenom", type="string", length=25, nullable=false)
     * @Assert\Length(
     *      min = "2",
     *      max = "25",
     *      minMessage = "Le prénom d'un traducteur doit faire au minimum {{ limit }} caractères",
     *      maxMessage = "Le prénom d'un traducteur ne peut faire plus de {{ limit }} caractères")
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=25, nullable=false)
     * @Assert\Length(
     *      min = "2",
     *      max = "25",
     *      minMessage = "Le nom d'un traducteur doit faire au minimum {{ limit }} caractères",
     *      maxMessage = "Le nom d'un traducteur ne peut faire plus de {{ limit }} caractères")
     */
    private $nom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Parution", mappedBy="traducteurs")
     */
    private $parutions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parutions = new \Doctrine\Common\Collections\ArrayCollection();
    }
	
    public function getId(){
            return $this->id;
    }

    public function setNom($nom){
            $this->nom = $nom;
            return $this;
    }

    public function getNom(){
            return $this->nom;
    }

    public function setPrenom($prenom){
            $this->prenom = $prenom;
            return $this;
    }
    
    public function getPrenom(){
        return $this->prenom;
    }
    
    public function __toString() {
        return $this->nom." ".$this->prenom;
    }
}
