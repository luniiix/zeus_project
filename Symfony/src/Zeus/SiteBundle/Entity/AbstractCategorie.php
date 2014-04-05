<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
     */
    protected $codeClassification;

    /**
     * @var string
     *
     * @ORM\Column(name="intitule", type="string", length=500, nullable=false)
     */
    protected $intitule;
    
	/**
     * Constructor
     */
    public function __construct()
    {
        $this->parutions = new \Doctrine\Common\Collections\ArrayCollection();
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
    
 
}
