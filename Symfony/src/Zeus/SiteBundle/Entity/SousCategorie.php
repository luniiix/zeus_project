<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SousCategorie
 *
 * @ORM\Table(name="sous_categorie")
 * @ORM\Entity(repositoryClass="Zeus\SiteBundle\Entity\SousCategorieRepository")
 */
class SousCategorie extends AbstractCategorie
{
    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ref_categorie", referencedColumnName="id")
     * })
     */
    private $categorie;

    /**
     * Set categorie
     *
     * @param \Categorie $categorie
     * @return SousCategorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    
        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
