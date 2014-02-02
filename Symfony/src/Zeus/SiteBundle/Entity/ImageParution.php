<?php

namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zeus\SiteBundle\Entity\Image;

/**
 * ImageParution
 *
 * @ORM\Table(name="image_parution")
 * @ORM\Entity(repositoryClass="Zeus\SiteBundle\Entity\ImageParutionRepository")
 * @ORM\HasLifecycleCallbacks
 */
class ImageParution extends Image
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
	
	/* 
	 * @see \Zeus\SiteBundle\Entity\Image::getUploadDir()
	 */
	public function getUploadDir() 
	{
		return 'uploads/img_parution';
	}

}
