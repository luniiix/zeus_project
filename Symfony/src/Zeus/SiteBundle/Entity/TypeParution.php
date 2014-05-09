<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TypeParution
 *
 * @ORM\Table(name="type_parution")
 * @ORM\Entity
 */
class TypeParution
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
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
     * @Assert\Length(
     *      min = "2",
     *      max = "50",
     *      minMessage = "Le libellé d'une type de parution doit faire au minimum {{ limit }} caractères",
     *      maxMessage = "Le libellé d'une type de parution faire plus de {{ limit }} caractères")
     */
    private $libelle;
	
    /**
     * @return the $id
     */
    public function getId() {
            return $this->id;
    }

    /**
     * @return the $libelle
     */
    public function getLibelle() {
            return $this->libelle;
    }

    /**
     * @param number $id
     */
    public function setId($id) {
            $this->id = $id;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle($libelle) {
            $this->libelle = $libelle;
    }

}
