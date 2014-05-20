<?php

/**
 * Class Image
 *
 * @category Class
 * @author   FAIDIDE Amandine <amandinefaidide@gmail.com>
*/

/**
 * Déclaration du namespace
 */
namespace Zeus\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Image
 *
 * @category   Image
 * @package    Entity
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="Zeus\SiteBundle\Entity\ImageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Image
{
    /**
     * Id de l'Image
     *
     * @name $id
     * @access private
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Url de l'Image
     *
     * @name $id
     * @access private
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * Alt de l'Image
     *
     * @name $id
     * @access private
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;
    /**
     * Fichier de l'Image
     *
     * @name $file
     * @access private
     * @var string
     *
     */
    private $file;
    /**
     * chemin tempFilename de l'Image
     *
     * @name $tempFilename
     * @access private
     * @var string
     *
     */
    private $tempFilename;

    // Rajout des Getter Et Setter

    /**
     * Fonction getId
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return integer id de l'image
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Fonction setUrl
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param string $url chemin du fichier
     * @return Image
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Fonction getUrl
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return string Lien de l'image
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Fonction setAlt
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
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
     * Fonction setAlt
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Fonction setFile
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param UploadedFile $file Fichier a envoyer
     */
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;

        // On vérifie si on avait déjà un fichier pour cette entité
        if ($this->url !== null) {
            // On sauvegarde l'extension du fichier pour le supprimer plus tard
            $this->tempFilename = $this->url;

            // On réinitialise les valeurs des attributs url et alt
            $this->url = null;
            $this->alt = null;
        }
    }
    /**
     * Fonction getFile
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return UploadedFile $file Fichier a envoyer
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Fonction preUpload
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
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
        // Pour faire propre, on devrait renommer cet attribut en « extension », plutôt que « url »
        $this->url = $this->file->guessExtension();

        // Et on génère l'attribut alt de la balise <img>, à la valeur du nom du fichier sur le PC de l'internaute
        $this->alt = $this->file->getClientOriginalName();
    }

    /**
     * Fonction upload
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
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
            $oldFile = $this->getUploadRootDir() . '/' . $this->id . '.' . $this->tempFilename;
            if (file_exists($oldFile)) {
                    unlink($oldFile);
            }
        }

        // On déplace le fichier envoyé dans le répertoire de notre choix
        $this->file->move(
            $this->getUploadRootDir(), // Le répertoire de destination
            $this->id . '.' . $this->url   // Le nom du fichier à créer, ici « id.extension »
        );
    }
    /**
     * Fonction preRemoveUpload
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
    	// On sauvegarde temporairement le nom du fichier, car il dépend de l'id
        $this->tempFilename = $this->getUploadRootDir() . '/'.$this->id . '.' . $this->url;
    }

    /**
     * Fonction removeUpload
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
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
    
    /**
     * Fonction getUploadDir
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string Renvoie le repertoire d'upload
     */
    public function getUploadDir()
    {
    	// On retourne le chemin relatif vers l'image pour un navigateur
        return 'uploads/img_parution';
    }

    /**
     * Fonction getUploadRootDir
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string Renvoie le repertoire web
     */
    protected function getUploadRootDir()
    {
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    /**
     * Fonction getWebPath
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string Renvoie le chemin du fichier
     */
    public function getWebPath()
    {
        return $this->getUploadDir() . '/' . $this->getId() . '.' . $this->getUrl();
    }
}
