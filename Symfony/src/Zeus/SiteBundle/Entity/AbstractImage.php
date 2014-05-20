<?php
/**
 * Class AbstractImage
 *
 *
 * @category Class
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
*/

/**
 * Déclaration du namespace
 */
namespace Zeus\SiteBundle\Entity;

/**
 * Import des class
 */
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Image
 *
 * @category   Categorie
 * @package    Entity\Abstract
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
abstract class AbstractImage
{

    /**
     * Id
     *
     * @var integer
     * @name $id
     * @access private
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Extension
     *
     * @var string
     * @name $extension
     * @access private
     *
     * @ORM\Column(name="extension", type="string", length=6)
     */
    protected $extension;

    /**
     * Alt
     *
     * @var string
     * @name $alt
     * @access private
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    protected $alt;

    /**
     * File
     *
     * @var file
     * @name $file
     * @access private
     *
     * @Assert\Image(
     *     mimeTypes = {"image/jpeg", "image/png"}
     *     maxWidth = 700,
     *     maxHeight = 700,
     *     mimeTypesMessage = "L'image doit être de type JPEG ou PNG.",
     *     maxWidthMessage = "La largeur de l'image ne doit pas dépasser {{ max_width }} px.",
     *     maxHeightMessage = "La hauteur de l'image ne doit pas dépasser {{ max_width }} px."
     */
    protected $file;
    /**
     * tempFilename
     *
     * @var $tempFilename
     * @name $tempFilename
     * @access private
     *
     */
    protected $tempFilename;


    /**
     * Fonction getId
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return integer l'id de l'image
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Fonction setExtension
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param string $extension extension du fichier
     * @return Image
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
        return $this;
    }

    /**
     * Fonction getExtension
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string retourne l'extension
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Fonction setAlt
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
        return $this;
    }

    /**
     * Fonction getAlt
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
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
     * @param UploadedFile $file Fichier à sauvegarder
     * @return string
     */
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
    /**
     * Fonction setFile
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param UploadedFile $file Fichier à sauvegarder
     * @return UploadedFile Fichier à sauvegarder
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
        $this->extension = $this->file->guessExtension();

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
        $this->tempFilename = $this->getUploadRootDir() . '/' . $this->id . '.' . $this->extension;
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
     *
     */
    abstract function getUploadDir();
    /**
     * Fonction getUploadDir
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string Lien vers le repertoire des images
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
     * @return string Lien vers le repertoire des images
     */
    public function getWebPath()
    {
        return $this->getUploadDir() . '/' . $this->getId() . '.' .$this->getExtension();
    }
}
