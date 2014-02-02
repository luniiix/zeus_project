<?php

namespace src\Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zeus\SiteBundle\Entity\Image;

/**
 * ImageParution
 * 
 * @ORM\Table(name="image_parution")
 * @ORM\Entity
 */
class ImageParution extends Image{

	public function getUploadDir()
	{
		// On retourne le chemin relatif vers l'image pour un navigateur
		return 'uploads/img_parution';
    }

}

