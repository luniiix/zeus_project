<?php

/**
 * Formulaire EmpruntAjoutType
 *
 *
 * @category Class
 * @author GUICHERD Kévin <kevinguicherd@gmail.com>
*/

/**
 * Déclaration du namespace
 */
namespace Zeus\SiteBundle\Form;

/**
 * Import de la class Symfony\Component\Form\FormBuilderInterface
 */
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class EmpruntAjoutType
 *
 *
 * @category   EmpruntAjoutType
 * @package    Form
 * @author GUICHERD Kévin <kevinguicherd@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class EmpruntAjoutType extends EmpruntType
{
    /**
     * Fonction buildForm
     *
     *
     * @category   buildForm
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param FormBuilderInterface $builder Variable contenant la base du formulaire
     * @param array $options Variable contenant les options du formulaire
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
        	->add('ajouter', 'submit')
        ;
    }

    /**
     * Fonction buildForm
     *
     *
     * @category   buildForm
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string renvoie le formulaire permettant l'emprunt.
    */
    public function getName()
    {
        return 'zeus_sitebundle_empruntajout';
    }
}
