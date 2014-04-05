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
abstract class AbstractImage
{
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=6)
     */
    protected $extension;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    protected $alt;
    
    protected $file;
    
    protected $tempFilename;

   
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
     * Set extention
     *
     * @param string $extension
     * @return Image
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extention
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }
    
    public function setFile(UploadedFile $file)
    {
    	$this->file = $file;
    
    	// On vérifie si on avait déjà un fichier pour cette entité
    	if ($this->extension !== null) {
    		// On sauvegarde l'extension du fichier pour le supprimer plus tard
    		$this->tempFilename = $this->extension;
    
    		// On réinitialise les valeurs des attributs url et alt
    		$this->extension = null;
    		$this->alt = null;
    	}
    }
    
    public function getFile()
    {
    	return $this->file;
    }
    
   /**
   * @ORM\PrePersist()
   * @ORM\PreUpdate()
   */
    public function preUpload()
    {
    	// Si jamais il n'y a pas de fichier (champ facultatif)
    	if ($this->file === null) {
    		return;
    	}
    
    	// Le nom du fichier est son id, on doit juste stocker également son extension
    	$this->extension = $this->file->guessExtension();
    
    	// Et on génère l'attribut alt de la balise <img>, à la valeur du nom du fichier sur le PC de l'internaute
    	$this->alt = $this->file->getClientOriginalName();
    	
    }
    
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
    	// Si jamais il n'y a pas de fichier (champ facultatif)
	    if (null === $this->file) {
	      return;
	    }
	
	    // Si on avait un ancien fichier, on le supprime
	    if (null !== $this->tempFilename) {
	    	$oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFilename;
	      	if (file_exists($oldFile)) {
	        	unlink($oldFile);
	      	}
	    }
	
	    // On déplace le fichier envoyé dans le répertoire de notre choix
	    $this->file->move(
	      $this->getUploadRootDir(), // Le répertoire de destination
	      $this->id.'.'.$this->extension   // Le nom du fichier à créer, ici « id.extension »
	    );
    }
    
    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
    	// On sauvegarde temporairement le nom du fichier, car il dépend de l'id
    	$this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->extension;
    }
    
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
    	// En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
    	if (file_exists($this->tempFilename)) {
    		// On supprime le fichier
    		unlink($this->tempFilename);
    	}
    }
    
    abstract function getUploadDir();
    
    protected function getUploadRootDir()
    {
    	// On retourne le chemin relatif vers l'image pour notre code PHP
    	return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    
    public function getWebPath()
    {
    	return $this->getUploadDir().'/'.$this->getId().'.'.$this->getUrl();
    }
}
