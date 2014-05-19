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
 * Import des differentes class
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Zeus\SiteBundle\Form\EventListener\AddSubmitFormSubscriber;

/**
 * Class EmpruntType
 *
 *
 * @category   EmpruntType
 * @package    Form
 * @author GUICHERD Kévin <kevinguicherd@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class EmpruntType extends AbstractType
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
        $builder
            ->add('datedebut', 'date', array(
                'label' => 'date de début',
                'input' => 'datetime',
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
            ))
            ->add('datefin', 'date', array(
                'label' => 'date de fin',
                'input' => 'datetime',
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
            ))
        ;
        $builder->addEventSubscriber(new AddSubmitFormSubscriber());
    }

    /**
     *
    /**
     * Fonction setDefaultOptions
     *
     *
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param OptionsResolverInterface $resolver
    */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Zeus\SiteBundle\Entity\Emprunt'
        ));
    }


    /**
     * Fonction getName
     *
     *
     * @category   getName
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string renvoie le formulaire permettant l'affichage des emprunts.
    */
    public function getName()
    {
        return 'zeus_sitebundle_emprunt';
    }
}
