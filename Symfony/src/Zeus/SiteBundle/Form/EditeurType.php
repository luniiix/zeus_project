<?php

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Zeus\SiteBundle\Form\EventListener\AddSubmitFormSubscriber;
use Zeus\SiteBundle\Form\EditeurType;

class EditeurType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('nom', 'text')
        ;
        
        $builder->addEventSubscriber(new AddSubmitFormSubscriber());
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Zeus\SiteBundle\Entity\Editeur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeus_sitebundle_editeur';
    }
}
