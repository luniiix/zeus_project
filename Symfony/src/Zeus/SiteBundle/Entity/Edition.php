<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Edition
 *
 * @ORM\Table(name="edition")
 * @ORM\Entity(repositoryClass="Zeus\SiteBundle\Entity\EditionRepository")
 */
class Edition
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Parution
     *
     * @ORM\ManyToOne(targetEntity="Parution")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_parution", referencedColumnName="id")
     * })
     */
    private $parution;

    /**
     * @var \Editeur
     *
     * @ORM\ManyToOne(targetEntity="Editeur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_editeur", referencedColumnName="id")
     * })
     */
    private $editeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer")
     * @Assert\Regex(
     *     pattern = "/^[0-9]+$/",
     *     message = "Le numéro d'une édtition doit être un chiffre ou un nombre entier")
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     * @Assert\Date(
     *      message = "La date d'une édition doit être de la forme : jj-mm-aaaa")
     */
    private $date;
    
   
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
     * Set parution
     *
     * @param \Parution $parution
     * @return Edition
     */
    public function setParution($parution)
    {
        $this->parution = $parution;
    
        return $this;
    }

    /**
     * Get parution
     *
     * @return \Parution 
     */
    public function getParution()
    {
        return $this->parution;
    }

    /**
     * Set editeur
     *
     * @param \Editeur $editeur
     * @return Edition
     */
    public function setEditeur($editeur)
    {
        $this->editeur = $editeur;
    
        return $this;
    }

    /**
     * Get editeur
     *
     * @return \Editeur 
     */
    public function getEditeur()
    {
        return $this->editeur;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return Edition
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set date
     *
     * @param \Date $date
     * @return Edition
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \Date 
     */
    public function getDate()
    {
        return $this->date;
    }
    
    public function __toString() {
        $chaine = $this->parution->getTitre().' - Edition : '.$this->editeur->getNom();
        if($this->numero !== null)
            $chaine .= ' N° '.$this->numero;
        return $chaine; 
    }
    
}
