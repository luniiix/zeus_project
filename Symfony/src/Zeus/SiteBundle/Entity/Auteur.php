<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Auteur
 *
 * @ORM\Table(name="auteur")
 * @ORM\Entity
 */
class Auteur
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
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenom;
	
    /**
     * ORM\@ManyToMany(targetEntity="Auteur", mappedBy="auteurs")
     */
    private $parutions;
    
    /**
	 * @return the $id
	 */
	public function getId() 
	{
		return $this->id;
	}

	/**
	 * @return the $nom
	 */
	public function getNom() 
	{
		return $this->nom;
	}

	/**
	 * @return the $prenom
	 */
	public function getPrenom() 
	{
		return $this->prenom;
	}

	/**
	 * @param string $nom
	 */
	public function setNom($nom) 
	{
		$this->nom = $nom;
		return $this;
	}

	/**
	 * @param string $prenom
	 */
	public function setPrenom($prenom) 
	{
		$this->prenom = $prenom;
		return $this;
	}
	
	public function __toString()
	{
		return $this->nom." ".$this->prenom;
	}

}
