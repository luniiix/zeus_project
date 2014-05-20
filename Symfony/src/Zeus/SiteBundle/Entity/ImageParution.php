<?php

/**
 * Class ImageParution
 *
 * @category Class
 * @author   FAIDIDE Amandine <amandinefaidide@gmail.com>
*/

/**
 * Déclaration du namespace
 */
namespace Zeus\SiteBundle\Entity;

/**
 * Import des class
 */
use Doctrine\ORM\Mapping as ORM;
use Zeus\SiteBundle\Entity\AbstractImage;

/**
 * ImageParution
 *
 * @category   Image
 * @package    Entity\Abstract\ImageParution
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 *
 * @ORM\Table(name="image_parution")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class ImageParution extends AbstractImage
{
    /**
     * Fonction getUploadDir
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return string Retourne le reportoire
     */
    public function getUploadDir()
    {
        return 'uploads/img_parution';
    }
}
