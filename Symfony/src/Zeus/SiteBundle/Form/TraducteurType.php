<?php

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Zeus\SiteBundle\Form\EventListener\AddSubmitFormSubscriber; 

class TraducteurType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom')
            ->add('nom')
        ;
        
        $builder->addEventSubscriber(new AddSubmitFormSubscriber());
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Zeus\SiteBundle\Entity\Traducteur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeus_sitebundle_traducteur';
    }
}
