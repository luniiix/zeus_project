<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 * @ORM\Table(name="groupe")
 * @ORM\Entity
 */
class Groupe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom_groupe", type="string", length=20, nullable=false)
     */
    private $nom;
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
    	return $this->id;
    }
    /**
     * Get nomGroupe
     *
     * @return string
     */
    public function getNom()
    {
    	return $this->nom;
    }
    
    /**
     * Set id
     *
     * @return integer
     */
    public function setId($id)
    {
    	$this->id = $id;
    }
    /**
     * Set nomGroupe
     *
     * @return string
     */
    public function setNom($nom)
    {
    	$this->nom = $nom;
    }

}
