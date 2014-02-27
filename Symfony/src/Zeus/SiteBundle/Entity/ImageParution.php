<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zeus\SiteBundle\Entity\AbstractImage;

/**
 * ImageParution
 *
 * @ORM\Table(name="image_parution")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class ImageParution extends AbstractImage
{   
    public function getUploadDir(){
    	return 'uploads/img_parution';
    }
    
}
