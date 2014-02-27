<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="prenom", type="string", length=100, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
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
    
}
