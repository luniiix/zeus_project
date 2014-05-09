<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Image
 *
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
abstract class AbstractCategorie
{
	
	/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_classification", type="integer", nullable=false)
     * @Assert\Regex(
     *     pattern = "/^[0-9]+$/",
     *     message = "Le code classification d'une catégorie ou sous-catégorie doit être chiffre ou 
     *                un nombre entier")
     */
    protected $codeClassification;

    /**
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=25, nullable=false)
     * @Assert\Length(
     *      min = "2",
     *      max = "25",
     *      minMessage = "L'intitulé d'une catégorie ou sous-catégorie doit faire au moins {{ limit }} caractères",
     *      maxMessage = "L'intitulé d'une catégorie ou sous-catégorie ne peut faire plus de {{ limit }} caractères")
     */
    protected $intitule;
    
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
    
    public function getCodeClassification(){
        return $this->codeClassification;
    }
    
    public function setCodeClassification($codeClassification){
        $this->codeClassification = $codeClassification;
        return $this;
    }
    
    public function getIntitule(){
        return $this->intitule;
    }
    
    public function setIntitule($intitule){
        return $this->intitule = $intitule;
    }
    
    public function __toString() {
        return $this->codeClassification.' '.$this->intitule;
    }
    
 
}
